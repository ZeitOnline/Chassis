# ZEIT ONLINE Blog Development (based on [Chassis](http://docs.chassis.io/))

We use a fork of the chassis development tools for local development of wordpress.

## Pre-Install
You should already have installed [Virtual Box](https://www.virtualbox.org/wiki/Downloads) and [Vagrant](http://www.vagrantup.com/downloads.html), that usually are used in other development environments for ZEIT ONLINE. If you use a linux based system, you will also need to install Avahi, with

```
sudo apt-get install avahi-dnsconfd
```

## Installation
Clone this repository

```
git clone --recursive git@github.com:ZeitOnline/Chassis.git <your-project>
```

If you forget `--recursive` to initialize the submodules, just run

```
cd <your-project>
git submodule update --init
```

now.

> Note: Replace `<your-project>` with the directory name you checked out chassis into.

We use the branch `blog.zeit.de` as the default branch to keep our changes (like this readme) apart from the development of Chassis. You'll find all configuration files there, so *if you are not directly checked out into this branch*, check it out now:

```
git checkout blog.zeit.de
```

## Configuration

For using the preinstalled configuration, make copies of the following files:

- `config.local-sample.yaml`, save as `config.local.yaml`
- `local-config-sample.php`, save as `local-config.php`

You may add your own configuration items, use [this documentation](http://docs.chassis.io/en/latest/config/) for help.

## Clone wordpress-stuff
For developing themes and plugins for blog.zeit.de clone the wordpress-stuff repository into the root of your chassis project

```
git clone git@github.com:ZeitOnline/wordpress-stuff.git
```

## Start development

Now you are ready to start the development with:

```
vagrant up
```

For further information or configuration follow the chassis [quickstart instructions](http://docs.chassis.io/en/latest/quickstart/).

Find your blog site here: [http://vagrant.local](http://vagrant.local).

## Blog Setup
For configuration of your local blog site, you need to login at [http://vagrant.local/wp-admin/](http://vagrant.local/wp-admin/). The standard credentials are:

```
Username: admin
Password: password
```

First network active the following plugins by visiting the [netword plugin page](http://vagrant.local/wp-admin/network/plugins.php):

- wordpress importer
- ZEIT ONLINE Auth for SSO
- ZEIT ONLINE Big Share Buttons
- ZON Blog Authors Widget
- ZON Blog Options
- ZON Rahmen API - Framebuilder

You'll need to setup some blogs for development puposes. As there are three different blog types (with three themes/subthemes), you'll need at least three blogs. [Add new blogs here](http://vagrant.local/wp-admin/network/site-new.php).

You'll can export Wordpress XML from blog.zeit.de for use as examples blogs.  
Use the wordpress importer plugin to import these in different subblogs.

## Updating fork

### 0. Add remote from original repository in your forked repository: 

    cd <your-project>
    git remote add upstream git@github.com:Chassis/Chassis.git
    git fetch upstream

### 1. Checkout the master branch:

    git checkout master

### 2. Updating your fork from original repo to keep up with their changes:

    git pull upstream master

### 3. Rebase master into blog.zeit.de branch

    git checkout blog.zeit.de
    git rebase master
