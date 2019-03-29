#!/usr/local/bin/ruby -Ku

AWSTATS_COMMAND = '/home/ipippi/sites/ipippi.jp/html/AWStats/awstats.pl'
LOG_DIR = '/home/ipippi/logs/ipippi.jp'
require 'date'

def logfile_path (date)
  return LOG_DIR + '/' + date.strftime('%Y/%m/access_%Y%m%d') + '.log'
end

Dir.chdir(File.dirname(AWSTATS_COMMAND))
[1, 0].each do |day|
  date = Date.today - day
  path = logfile_path(date)
  if File.exist?(path)
    command = []
    command.push(AWSTATS_COMMAND)
    command.push('-config=awstats.conf')
    command.push('-logfile=' + path)
    command.push('-update')
    system(command.join(' '))
  end
end

