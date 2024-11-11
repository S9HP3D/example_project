### Установка и запуск

git clone https://github.com/S9HP3D/example_project.git

composer install

docker-compose up -d

sudo chmod 777 -R ./

docker-compose exec -it app bash

php artisan migrate 


Микросервис позволяет создавать, читать, обновлять и удалять записи гостей в базе данных. Сущность "Гость" имеет следующие атрибуты:

    идентификатор (id)
    first_name -> string 
    last_name -> string 
    email -> string ->unique()
    phone -> string ->unique()
    country -> string ->nullable()

Если страна не указана, она определяется по номеру телефона. При сборки модели Guest


API
CRUD операции

    GET /guests - получить список всех гостей
    GET /guests/{id} - получить гостя по идентификатору
    POST /guests - создать нового гостя
    PUT /guests/{id} - обновить гостя
    DELETE /guests/{id} - удалить гостя

Параметры запроса

Примеры запросов

   GET /guests

	{
    "data": [
        {
            "id": 34,
            "first_name": "1654",
            "last_name": "dsfs253",
            "email": "a365a4d@gmail.com",
            "phone": "+221 54 663 3643",
            "country": "SN"
        },
        {
            "id": 35,
            "first_name": "1654павп",
            "last_name": "dsfs253чсм",
            "email": "a3656456a4d@gmail.com",
            "phone": "+221 54 664 3643",
            "country": "SN"
        }
    ]
}


  POST /guests

	{
        "first_name": "testg34",
        "last_name": "dsfs2",
        "email": "e1md@gmail.com",
        "phone": "+218 24 343 3663"
	}

Ответ от сервера

	{
		"id": 37,
    	"first_name": "testg34",
    	"last_name": "dsfs2",
    	"email": "e1md@gmail.com",
    	"phone": "+218 24 343 3663",
    	"country": "LY"
	}

Заголовки ответа

    X-Debug-Time: время выполнения запроса в миллисекундах
    X-Debug-Memory: количество используемой памяти в килобайтах


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

