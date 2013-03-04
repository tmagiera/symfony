set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]
set :use_composer, true
set :update_vendors, true

default_run_options[:pty] = true
ssh_options[:forward_agent] = true
#ssh_options[:auth_methods] = "publickey"
#ssh_options[:keys] = ["/home/tmagiera/Pobrane/tmagiera.pem"]

set   :application,   "Treneo"
set   :deploy_to,     "/var/www/treneo"
#set   :domain,        "ubuntu@ec2-54-228-75-68.eu-west-1.compute.amazonaws.com"
set   :domain,        "www-data@192.168.91.128"

set   :scm,           :git
set   :repository,    "https://tmagiera:haslo123@github.com/tmagiera/symfony.git"

role  :web,           domain
role  :app,           domain
role  :db,            domain, :primary => true

set   :use_sudo,      false
set   :keep_releases, 3

namespace :customs do
    desc "Symlinking parameters.yml to production parameteres"
    task :symlink, :roles => :app do
        run <<-CMD
        ln -nfs #{release_path}/app/config/parameters_prod.yml #{release_path}/app/config/parameters.yml
        CMD
    end
end

after "deploy:symlink","customs:symlink"
#after "deploy","customs:chown_to_www_data"