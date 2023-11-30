
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve



You can now access the server at http://127.0.0.1:8000


    
**Make sure you running the queue work before running the command** 

    php artisan queue:work

**To import data from the "Files" folder (or another path), use the following command:** 

    php artisan import:json


***Note*** : Update the path in the .env file under the variable FILES if needed.


 

The api can be accessed at [http://127.0.0.1:8000/api/v1](http://127.0.0.1:8000/api/v1).

## API Endpoints

Note: Update the path in the `.env` file under the variable `FILES` if needed.

## API Endpoints

### Get Users

#### Index
Get all users with addresses information and number of orders. Supports filters:

- `name`: Filter by name (e.g., `Evelyn`)
- `email`: Filter by email (e.g., `evelynsantiago@endipine.com`)
- `address`: Filter by any part of the address (type/street/city/state/zip)

Example:http://127.0.0.1:8000/api/v1/users?name=Evelyn&email=evelynsantiago@endipine.com&address=Lacon

#### Show
Show user information with addresses and order details.
Example:http://127.0.0.1:8000/api/v1/users/:user_id


### Get Orders

#### Index
Get all orders and filter by:

- `item_name`: Search by item name
- `date_from`: From order date (format: yyyy-mm-dd)
- `date_to`: To order date (format: yyyy-mm-dd)
- `price_from`: From order total price
- `price_to`: To order total price

Example: http://127.0.0.1:8000/api/v1/orders?item_name=Widget&date_from=2022-11-01&date_to=2022-11-10&price_from=10&price_to=100

----------


## Folders

- `App\Services\UserService` - Contains  the Store User Service
- `App\Services\OrderService` - Contains  the Store User Order
- `App\Services\AddressService` - Contains  the Store User Addresses
- `App\Services\UploadFilesService` - Contains  the  service to handel files path

- `App\Filters\User` - Contains the User filters keys
- `App\Filters\Order` - Contains the Order filters keys



## Environment variables

- `FILESPath` - Environment variables can be set in .env file to chnage the files path

