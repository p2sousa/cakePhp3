# CakePhp 3 CRUD

# Docker setup

1. Install Docker

2. Clone docker repository:

```bash
$ git clone https://github.com/p2sousa/docker-php-nginx.git
$ cd docker-php-nginx
$ cp env.dist .env
```

3. Clone this repository in folder application\

```bash
$ cd application
$ git clone https://github.com/p2sousa/cakePhp3.git cake
```
4. Go to the folder "docker-php-nginex” to Build Docker

```bash
$ cd ..
$ docker-compose build
$ docker-compose up -d
```

5. Check containers

```bash
$ docker-compose ps
        Name                       Command               State              Ports
--------------------------------------------------------------------------------------------
application   /tmp/entrypoint.sh            Up      9000/tcp                         
database      docker-entrypoint.sh mysqld   Up      0.0.0.0:3306->3306/tcp, 33060/tcp
nginx         nginx                         Up      443/tcp, 0.0.0.0:80->80/tcp    
```

6. In your local OS, add a domain entry for cake.localhost in your /etc/hosts

```bash
$ sudo vim /etc/hosts

127.0.0.1	localhost   cake.localhost
```

# Application setup

1. Back in the "docker-php-nginx”

2. Now configure cakePhp

```bash
$ cd application/cake/config/
$ cp app.default.php app.php
```

3. Enter the application container

```bash
$ docker exec -it application bash
```

4. Run composer update
 
```bash
$ composer update
```

5. Run Migrations and Seeds

```bash
$ bin/cake migrations migrate
$ bin/cake migrations seed
```

6. Done! now you can create your products

7. Access: http://cake.localhost to CakePhp Root (Documentation)

8. Access: http://cake.localhost/products to CRUD example