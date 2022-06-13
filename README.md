# Sushiarigato API

Backend Restful API for mobile frontend sushiarigato.
Framework Using Lumen v.7.x
## Requirements
- Docker
- PHP 8.0 or above
- Mysql 8
- Composer

## Installation
- Clone this repository
```
git clone https://github.com/UBSI-Developers/sushiarigato-api
```

- Copy `.env.example` and rename to `.env`

- Install composer requirement
```
composer install
composer require -w tymon/jwt-auth --ignore-platform-reqs
```

- Make database
```
sushiarigato
```

- Migrate all table and seed data dumy 
```
php artisan migrate
php artisan db:seed
```

- Generate JWT Secret
```
php artisan jwt:secret
```

- Done, fork it :)

## Run services
- Linux/MacOs :
```
make run
```
- Windows :
```
php -S localhost:8080 -t public
```
## Run as public
1. Install ngrok
```
```
2. Run http
```
ngrok http 8000
```

## Feature

For Postman Collcection in folder `postman` and file name `Sushi Arigati.postman_collection.json`
Feature of collection :
- Auth
    - Login
    - Register
    - Refresh
    - Logout
- User
    - User Detail
- Category
    - Category Lists
- Product
    - Product Lists
    - Product Detail
    - Create Product
    - Update Product
    - Delete Product
- Cart
    - Cart Lists
    - Create Cart Item
    - Update Cart Item
    - Delete Cart Item

## Documentation
Please access this link for documentation

Link : [Sushiarigato API Documentation](https://documenter.getpostman.com/view/8197840/UyxjFRYc "Susiarigato-API DOC")"# sushiarigato-api" 
