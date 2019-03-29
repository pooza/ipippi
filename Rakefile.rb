#!/usr/bin/env rake

$KCODE = 'u'
require 'yaml'

namespace :svn do
  desc '全ファイルのsvn属性を設定'
  task :pset do
    system 'svn pset svn:ignore \'*\' OpenPNE/var/*'
    system 'svn pset svn:executable \'*\' html/tools/*'
    media_types.each do |extension, type|
      extension_arg = '-name \'*.' + extension + '\''
      if type == nil
        system 'find . ' + extension_arg + ' | xargs svn pdel svn:mime-type'
      else
        system 'find . ' + extension_arg + ' | xargs svn pset svn:mime-type ' + type
      end
      if (type == nil) || (/^text\// =~ type)
        system 'find . ' + extension_arg + ' | xargs svn pset svn:eol-style LF'
      end
      system 'find . ' + extension_arg + ' | xargs svn pdel svn:executable'
    end
  end

  def media_types
    return YAML.load_file('OpenPNE/config/mime.yaml')['types']
  end
end

