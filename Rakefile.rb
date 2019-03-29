ROOT_DIR = File.expand_path(__dir__)

desc 'インストール'
task install: [
  'var:init',
]

namespace :var do
  desc 'varディレクトリを初期化'
  task init: [:chmod]

  task :chmod do
    ['OpenPNE/var/*', 'OpenPNE/var/img_cache/*'].each do |dir|
      puts "chmod 777 #{File.join(ROOT_DIR, dir)}"
      FileUtils.chmod(0o777, Dir.glob(File.join(ROOT_DIR, dir)))
    end
  end
end
