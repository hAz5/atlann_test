<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About ATLANN TEST
This is test app for Atalann

## Requirement

- **[Docker](https://www.docker.com/)**
- **[Docker-compose](https://docs.docker.com/compose/)**
- **[npm](https://www.npmjs.com/)**

## Install
1- install docker And docker-compose

2- clone project: `git clone ...`

3- run command `make up`

4- run `make shell` then run `npm install && npm run dev`


\#maybe you will need run `docker network create test-atlann-network` in `make up` command for the first time. 

## Parameters
Routes:
Admin : `localhost:8085`

phpmyadmin: `localhost:8086`
 
Database: port: `3306` host: `db` database: `atlann_db_test` password: `notSecureChangeMe` user: `root`


## Available Makefile Commands 

	# up
	  Create and start Test's containers.
	
	# status
	  Shows the status of the current Atlann's containers.
	
	# shell
	  Starting a shell as \"devuser\" user in web container.

	# shell-as-root
	  Starting a bash shell as \"root\" user in web container.
	
	# destroy
	  Stop and remove containers, networks, images, and volumes.
	
	# restart
	  Restarting all containers
	  
	# test
	  executes tests
	  
## Execute tests

run the tests with command:

`make test`  	  
