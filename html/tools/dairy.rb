#!/usr/local/bin/ruby
# dairy.rb
# 2006/2/1 tkoishi@b-shock.co.jp

require "net/http"

#== 環境設定 ===================================================================

HOST = "ipippi.jp"
ROOT_PATH = "/tools/"
SCRIPTS = [
  "tool_rss_cache.php",
  #"backup.rb",
  #"tool_send_dairy_news.php",
  #"tool_send_schedule_mail.php",
]
AUTH_USER = "manager"
AUTH_PASSWD = "IpIppINo1"

#== 処理開始 ===================================================================

begin
  SCRIPTS.each do |script|
    req = Net::HTTP::Get.new(ROOT_PATH + script)
    req.basic_auth(AUTH_USER, AUTH_PASSWD)
    Net::HTTP.start(HOST).request(req)
    puts "http://" + HOST + ROOT_PATH + script
  end
rescue => err
  puts "Content-Type: text/plain\n\n"
  puts script + ": " + err.message
end
