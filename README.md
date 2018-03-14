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


## Setup local directories
It is adviced to setup a directory beside your dev env directory to share it with the virtual machine. The configuration files are prepared respectively:

    $> mkdir wordpress
    $> cd wordpress
    $> git clone --recursive git@github.com:ZeitOnline/Chassis.git zeit-chassis
    $> mkdir wp-content

If you chose to setup different directories, change the chassis config (`synced_folders`).

## Setup configuration files
The vagrant machine is configured with `config.yaml`, which is extended by your personal `config.local.yaml`. Copy the supplied `config.local-sample.yaml` and edit it if necessary.

    $> cp config.local-sample.yaml config.local.yaml
    $> vim config.local.yaml

The configuration of the wordpress follows the same way, extending `wp-config.php` with `local-config.php`. The copy and paste example for this file is `local-config-sample.php`.

    $> cp local-config-sample.php local-config.php
    $> vim local-config.php # if needed

## Start dev environment
    $> vagrant up

At first launch the vagrant environment is provisioned and the webserver is startet. The configured blog can now be reached at http://vagrant.local

## Install plugins and themes

The ZEIT ONLINE plugins can now be cloned from their github repository into `wordpress/wp-content/plugins` and for themes `wordpress/wp-content/themes`, for instance:

    $> cd wp-content/plugins
    $> git clone git@github.com:ZeitOnline/zon-blog-extensions.git

A list of the plugins and themes is found here: https://github.com/ZeitOnline/wordpress-stuff/blob/master/README.md

**Caveat:** actually the external plugins listed in `config.local.yaml` should be installed on the first `vagrant up` automatically, but in most cases this didn't work. You'll need to install them manually, for example:

    $> cd zeit-chassis
    $> vagrant ssh
    $> wp plugin install akismet code-snippets-extended comment-moderation-e-mail-to-post-author jetpack language-fallback more-privacy-options multisite-enhancements proper-network-activation unconfirmed wordpress-importer wp-example-content

**Need to know:** The use of the wordpress' command line interface `wp` is mandatory, as we want to exklude the most superadvisor tasks from the web backend, because there are too many users with the role superadvisor. You'll find [the wp-cli documentation here](https://developer.wordpress.org/cli/commands/). Also you should use `wp help [command]` if necessary.

## Logging in and configute blogs
You can log in here: http://vagrant.local/wp-admin

    Nutzername: admin
    Passwort: password

Blogs need to be instatiated manually, to fill them with example content, use the plugin `wp-example-content`.

**Avoid import of live data!**
If content from productive blogs should be importet locally, please use the `wordpress-importer` plugin and the wordpress xml format. Do not import user data (assign imported article to user admin) to prevent from dev leakage and to follow privacy protection rules. Delete xml files after use and never save export files on live servers. The same rules apply for database backups.

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



