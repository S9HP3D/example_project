### Установка и запуск

git clone https://github.com/S9HP3D/example_project.git

composer install

docker-compose up -d

docker-compose exec -it example_app bash

php artisan migrate 


### Структура 
Структура проекта

	app/
	Helpers/
        RegionCode
            Region- вспомогательный класс определения старны 
			
	Http/
        Api/
            BaseController.php
            GuestController.php - контроллер для работы с гостями

        Middleware/
            DebugMiddleware.php - X-Debug-Time и X-Debug-Memory

        Resources/
            GuestResource.php - ресурс для работы с гостями

    Models/
            Guest.php - Модель гостя

    Services/
            GuestService.php - сервис для работы с гостями



дополнительные библиотеки :

	laravel/sanctum: ^4.0
	giggsey/libphonenumber-for-php: ^8.13
