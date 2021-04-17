<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About ATLANN TEST
This is test app for Atalann

## Requirement

- **[Docker](https://www.docker.com/)**
- **[Docker-compose](https://docs.docker.com/compose/)**
- **[npm](https://www.npmjs.com/)**

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Install

At first Install Docker && docker-compose; then in the root path run command 
`
make up 
`
this command pull docker containers after that it run:

`
php artisan migrate` &&
`php artisan db:seed` 

## Available Make Commands 

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
