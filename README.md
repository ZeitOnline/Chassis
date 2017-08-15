# ZEIT ONLINE Blog Development (based on [Chassis](http://docs.chassis.io/))

We use a fork of the chassis development tools for local development of wordpress.

## Pre-Install
You should already have installed [Virtual Box](https://www.virtualbox.org/wiki/Downloads) and [Vagrant](http://www.vagrantup.com/downloads.html), that usually are used in other development environments for ZEIT ONLINE. If you use a linux based system, you will also need to install Avahi, with

```
$ sudo apt-get install avahi-dnsconfd
```

## Installation
Clone this repository

```
$ git clone --recursive git@github.com:ZeitOnline/Chassis.git <your-project>
```

If you forget `--recursive` to initialize the submodules, just run

```
$ cd <your-project>
$ git submodule update --init
```

now.

We use the branch `blog.zeit.de` as the default branch to keep our changes (like this readme) apart from the development of Chassis. You'll find all configuration files there, so if you are not directly checked out into this branch, check it out now:

```
$ git checkout blog.zeit.de
```

## Configuration

For using the preinstalled configuration, make copies of the following files:

- `config.local-sample.yaml`, save as `config.local.yaml`
- `local-config-sample.php`, save as `local-config.php`

You may add your own configuration items, use [this documentation](http://docs.chassis.io/en/latest/config/) for help.

## Start development

Now you are ready to start the development with:

```
$ vagrant up
```

For further information or configuration follow the chassis [quickstart instructions](http://docs.chassis.io/en/latest/quickstart/).

Find your blog site here: [http://vagrant.local](http://vagrant.local).

## Blog Setup

First you'll need to setup some blogs for development puposes. You'll find Wordpress XML for different blogs in

```
<you-project>/examples/
```

Use the wordpress importer plugin to import these in different subblogs.
