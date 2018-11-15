# CakePhp 3 CRUD

# Setup

1. clone docker repository:

```bash
$ git clone https://github.com/p2sousa/docker-php-nginx.git
$ cp env.dist .env
$ vim .env
GITHUB_OAUTH=
MYSQL_ROOT_PASSWORD=YOU_PASSWORD
MYSQL_DATABASE=YOU_DATABASE
MYSQL_USER=YOU_USER
MYSQL_PASSWORD=YOU_MYSQL_PASSWORD
```

2. clone this repository in folder application\

```bash
$ cd application
$ git clone https://github.com/p2sousa/cakePhp3.git cake
```
3. configure CakePhp3

```bash
$ cd cake/config
$ cp app.default.php app.php
```

4. build and up docker

```bash
$ cd ../../../
$ docker-compose build
$ docker-compose up -d
$ docker exec application composer update
```
5. In your local OS, add a domain entry for cake.localhost in your /etc/hosts

```bash
$: sudo vim /etc/hosts

127.0.0.1	localhost   cake.localhost
```