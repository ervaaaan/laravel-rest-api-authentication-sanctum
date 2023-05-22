## Laravel 10 REST API authentication using Sanctum.

This is a README guide that provides an overview and instructions for implementing user authentication in a Laravel application using Sanctum. Sanctum is Laravel's lightweight API authentication package that allows you to authenticate users and secure API endpoints.
Features

    - User registration: Users can create an account by providing their email address and password.
    - User login: Registered users can log in using their credentials.
    - Token-based authentication: Sanctum uses API tokens to authenticate API requests.
    - Token management: Sanctum handles token creation, validation, and revocation.
    - CORS support: Cross-Origin Resource Sharing (CORS) headers are automatically added to API responses.

### Prerequisites

Before getting started with Laravel authentication using Sanctum, ensure that you have the following prerequisites:

    1. Laravel installed on your development environment.
    2. Composer, the PHP package manager, installed on your system.
    3. Docker installed on your system (local environment).

## How to run this backend server

To use this Laravel 10 REST API, follow these steps:

1. Clone the repository or download the source code.
2. Open a terminal and navigate to the project directory.
3. Copy .env.example to .env
3. Run the following command to install required packages.

```bash
composer install
composer require laravel/sail --dev
```
4. Create and run Docker containers
```bash
./vendor/bin/sail up -d
```
5. Migrate database
```bash
./vendor/bin/sail artisan migrate
```
### API endpoints
```bash
http://localhost:8002/api/login
http://localhost:8002/api/register
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
