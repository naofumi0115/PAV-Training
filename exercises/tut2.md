# Build a web server and using the Cookie and Session

## Precondition
1. You have to finish previous section [1. HTML, CSS and JavaScript](./../docs/html-cs-js/readme.md). Because in this exercise, you have to reuse that layout.


> Please try by yourself first before you reference the source code.
> Reference previouse exercise results [here](../src/html-css-js/exercises-2)

# Build web server.
As you know, the session was store at the server side. So to know how session works, we have to build a server.

In this case, I'm using PHP server to because you are studing PHP too.

## Install PHP environment for development
To easier for setting up, you can install [XAMPP](https://www.apachefriends.org/download.html). It's containing `A`pache, `M`ariaDB and `P`HP just 1 click.

> You can find another `combo` like [AMPP](http://ampps.com/downloads), [MAMP](https://www.mamp.info/en/downloads/), LAMP, etc

## Build a login page and use the session to keep the login information.

1. Create a directory to host our web application.

```sh
cd /Applications/MAMP/htdocs
mkdir pav-training

# Create and copied the content of files from previous exercises to below files
touch index.html
touch index.js
touch index.css

```

> __Note__: I'm using MAPP, basically, MAPP, XAMPP,... have the looks similar, so you can use which one you like.


2. Config virtual host

Virtual host like a Domain Name that you use to access to your website.
For example, instead of enter `localhost/pav-training` to entrance the web, you can enter `pav-training.local` (look similar google.com, right?) or `*.abc` (suffix is anything which you like) 

```sh
vi /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf
```


```c
# httpd-vhosts.conf

<VirtualHost *:80>
    ServerAdmin service@pav-training.com
    DocumentRoot "/Applications/MAMP/htdocs/pav-training"
    ServerName pav-training.local
    ErrorLog "logs/pav-training.com.log"
    CustomLog "logs/pav-training.com.log" common
</VirtualHost>

```

- Set virtual domain name for you website
```sh
sudo vi /etc/hosts

# Add below content to the host file

127.0.0.1   pav-training.local
```

Now, save all your config and restart the Apache server, restart by MAMP Application or run below command
```sh
# stop
/Applications/MAMP/bin/stopMysql.sh
/Applications/MAMP/bin/stopApache.sh

# start 
/Applications/MAMP/bin/startMysql.sh
/Applications/MAMP/bin/startApache.sh
```

Now, open browser and try: `http://pav-training.local`
Your previouse web page was now render from server (server render)

