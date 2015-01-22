# -*- mode: ruby -*-
# # vi: set ft=ruby :

require 'yaml'

currentDirectory = File.dirname(File.expand_path(__FILE__))

yaml = YAML.load_file("#{currentDirectory}/Vagrantfile.yml")

if !yaml['virtual_machine']['provider']['virtualbox'].empty?
    ENV['VAGRANT_DEFAULT_PROVIDER'] = 'virtualbox'
end

Vagrant.configure("2") do |config|

    config.vm.box = "#{yaml['virtual_machine']['box']['name']}"
    config.vm.box_url = "#{yaml['virtual_machine']['box']['uri']}"

    if !yaml['virtual_machine']['provider']['virtualbox'].empty?
        config.vm.provider :virtualbox do |virtualbox|
            yaml['virtual_machine']['provider']['virtualbox'].each do |key, value|
                virtualbox.customize ["modifyvm", :id, "--#{key}", "#{value}"]
            end
        end
    end

    # Network yaml
    if yaml['virtual_machine']['network']['private_network'].to_s != ''
        config.vm.network "private_network", ip: "#{yaml['virtual_machine']['network']['private_network']}"
    end

    if yaml['virtual_machine']['network']['hostname'].to_s != ''
        config.vm.hostname = "#{yaml['virtual_machine']['network']['hostname']}"
    end

    if yaml['virtual_machine']['network'].has_key?("forwarded_ports")
        yaml['virtual_machine']['network']['forwarded_ports'].each do |identifier, port|
            if port['guest'] != '' && port['host'] != ''
                config.vm.network :forwarded_port, guest: port['guest'].to_i, host: port['host'].to_i
            end
        end
    end

    # Shared directories
    yaml['virtual_machine']['shared_directories'].each do |share|
        config.vm.synced_folder "#{share['source']}", "#{share['target']}", type: "nfs"
    end

    # Docker containers
    if yaml['virtual_machine']['provision'].has_key?("docker")
    
        # We are reprovisioning, if containers already exist - kill them with fire
        yaml['virtual_machine']['provision']['docker'].each do |name, options|
            config.vm.provision :shell, :inline => "docker inspect #{name} &>/dev/null; if [ $? -eq 0 ]; then docker rm -f #{name}; fi"
        end
        
        config.vm.provision "docker" do |docker|
            yaml['virtual_machine']['provision']['docker'].each do |name, options|
                # Are we pulling an image, or building one?
                if options.has_key?("image")
                    docker.pull_images "#{options['image']}"
                elsif options.has_key?("build")
                    docker.build_image "#{options['build']}",
                        args: "-t #{name}"
                    options['image'] = name
                end

                # Build run arguments
                arguments = ""

                if options.has_key?("ports")
                    options['ports'].each do |port|
                        if port.has_key?("listen")
                            arguments << "-p #{port['listen']}:#{port['host']}:#{port['guest']} "
                        elsif
                            arguments << "-p #{port['host']}:#{port['guest']} "
                        end
                    end
                end

                if options.has_key?("volumes")
                    options['volumes'].each do |volume|
                        arguments << "-v #{volume['host']}:#{volume['guest']} "
                    end
                end

                if options.has_key?("environment")
                    options['environment'].each do |variable|
                        arguments << "-e #{variable['key']}=#{variable['value']} "
                    end
                end

                if options.has_key?("links")
                    options['links'].each do |link|
                        arguments << "--link #{link}:#{link} "
                    end
                end

                docker.run "#{name}", image: "#{options['image']}",
                    auto_assign_name: true,
                    args: "#{arguments}",
                    cmd: "#{options['command']}"
            end
        end
    end
end
