# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "file:///C:/php7dev.box"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.hostname = "serveurwww"
  config.vm.synced_folder "./www", "/var/www/html", :mount_options => ["dmode=777", "fmode=666"]

end