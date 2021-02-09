@servers (['likhain-server' => '13.115.66.59'])

@task('gitpull', ['on' => ['likhain-server']])
  cd /var/repos/RecreationLikhainWorks/
  git pull origin master
@endtask

@task('DirectoryServer', ['on' => ['likhain-server']])
  sudo mkdir /var/repos
  sudo chown -R ec2-user.ec2-user /var/repos
  sudo chmod 2775 /var/repos 
@endtask

@task('CloneServer', ['on', ['likhain-server']])
  cd /var/repos
  git clone git@github.com:engraphia-philippine/RecreationLikhainWorks.git
  cd /var/repos/RecreationLikhainWorks
  sudo chmod 2775 /var/repos/RecreationLikhainWorks
  sudo chown -R ec2-user.ec2-user RecreationLikhainWorks
  sudo chown -R nginx.nginx /storage
  sudo chown -R nginx.nginx /storage/logs/
@endtask

@task('SystemSetup', ['on', 'likhain-server'])
  cd /var/repos/RecreationLikhainWorks
  composer install
  sudo cp .env-production .env
  php artisan key:generate
  php artisan migrate
@endtask

@task('Fpm-nginx', ['on', 'likhain-server'])
  sudo service nginx restart
  sudo service php-fpm restart
@endtask