ATLANN_USER=devuser

help:
	@echo '------------------------------------------------------------------'
	@echo '     **     ********** **           **     ****     ** ****     **'
	@echo '    ****   /////**/// /**          ****   /**/**   /**/**/**   /**'
	@echo '   **//**      /**    /**         **//**  /**//**  /**/**//**  /**'
	@echo '  **  //**     /**    /**        **  //** /** //** /**/** //** /**'
	@echo ' **********    /**    /**       **********/**  //**/**/**  //**/**'
	@echo '/**//////**    /**    /**      /**//////**/**   //****/**   //****'
	@echo '/**     /**    /**    /********/**     /**/**    //***/**    //***'
	@echo '//      //     //     //////// //      // //      /// //      ///  (V 0.0.1)'
	@echo '------------------------------------------------------------------'
	@echo "up"
	@echo "  Create and start Test's containers."
	@echo ""
	@echo "status"
	@echo "  Shows the status of the current Atlann's containers."
	@echo ""
	@echo "shell"
	@echo "  Starting a shell as \"devuser\" user in web container."
	@echo ""
	@echo "shell-as-root"
	@echo "  Starting a bash shell as \"root\" user in web container."
	@echo ""
	@echo "destroy"
	@echo "  Stop and remove containers, networks, images, and volumes."
	@echo ""
	@echo "restart"
	@echo "  Restarting all containers"
	@echo ""

up:
	COMPOSE_HTTP_TIMEOUT=300 docker-compose up -d
	@docker-compose exec --user=$(ATLANN_USER) web sh -c 'php artisan migrate && php artisan db:seed'
status:
	docker-compose ps
shell:
	docker-compose exec --user=$(ATLANN_USER) web bash
shell-as-root:
	docker-compose exec web bash
destroy:
	COMPOSE_HTTP_TIMEOUT=300 docker-compose down
restart:
	docker-compose restart
