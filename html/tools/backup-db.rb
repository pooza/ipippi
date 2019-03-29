#!/usr/local/bin/ruby -Ku
#===============================================================================
# データベースメンテナンススクリプト
# 2006/07/30 小石達也 <tkoishi@b-shock.co.jp>
#===============================================================================

require "mysql"
require "zlib"

DIR_BIN = "/usr/local/mysql/bin/"
DIR_DEST = "/home/p1037004/dump/"
DB_HOST = "localhost"
DB_USER = "p1037004"
DB_PASSWORD = "CyK4GZH5"
DAYS = 30
excludeDB = [
  "mysql",
  "test",
  "information_schema",
]

#== 関数 =======================================================================

# ログ表示
def putLog (level, description)
  puts "  " * level + Time::now.strftime("%Y/%m/%d %H:%M:%S ") + description
end

#== 処理開始 ===================================================================

dateBackup = Time::now - (60 * 60 * 24 * DAYS) # 保存期間
db = Mysql::new(DB_HOST, DB_USER, DB_PASSWORD)
#db.query("FLUSH TABLES")

db.query("SHOW DATABASES").each do |rowDB|
  nameDB = rowDB[0]

  # excludeDBに含まれているDBは、処理の対象から除外
  if excludeDB.member?(nameDB)
    next
  else
    db.query("USE `" + nameDB + '`')
    puts "Database: " + nameDB
  end

  # 壊れたテーブルがあれば修復
  db.query("SHOW TABLES").each do |rowTable|
    nameTable = rowTable[0]
    puts "  Table: " + nameDB + "." + nameTable

    rowResult = db.query("CHECK TABLE `" + nameTable + '`').fetch_row
    if rowResult[3] == "OK"
      putLog(2, "Check: OK")
    else
      putLog(2, "Check: NG")
      db.query("REPAIR TABLE `" + nameTable + '`')
      putLog(2, "Repair")
    end
  end

  # ダンプのファイル名を生成  
  begin
    dirDest = File::new(DIR_DEST + nameDB)
    nameDump = nameDB + "_" + Time::now.strftime("%Y-%m-%d") + ".sql"
    pathDump = dirDest.path + "/" + nameDump
  rescue
    # 保存先ディレクトリが存在しなければ作成
    Dir::mkdir(DIR_DEST + nameDB)
    retry
  end

  # ダンプ生成
  cmd = DIR_BIN + "mysqldump " \
    + "-h " + DB_HOST + " " \
    + "-u " + DB_USER + " " \
    + "-p" + DB_PASSWORD + " " \
    + nameDB + " " \
    + ">'" + pathDump + "'"
  system(cmd)
  fileSrc = File::new(pathDump)
  putLog(1, "mysqldump")

  # ダンプをgzip化し、パーミッション変更
  fileDst = File::new(fileSrc.path + ".gz", "w")
  gzDst = Zlib::GzipWriter.new(fileDst)
  fileSrc.each do |row|
    gzDst.write row
  end
  fileDst.chmod(0600)
  gzDst.close
  File::unlink(fileSrc.path)

  # 古いダンプを削除
  Dir::glob(dirDest.path + "/*").each do |f|
    fileCurrent = File::new(f)
    if fileCurrent.ctime < dateBackup
      File::unlink(fileCurrent.path)
      putLog(1, "delete " + fileCurrent.path)
    end
  end
end

# 終了
db.close
