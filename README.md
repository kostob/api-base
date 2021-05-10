# Api-base

Base project structure for a JWT based API with JSON login

## How to set up
* Generate a secret for JWT generation and validation with `openssl rand -base64 32`.
Insert the output in the `.env` file for `SECRET_KEY`.
* Adjust the database config in the `.env` file to match your database connection. Examples are included there.
* Run `composer update` to install all dependencies
* Run the `bin/console doctrine:migrations:migrate` to insert the user table into your database
* Insert your first user to the database with your prefered tool

## How to use
Login can be reached over `/api/login`.

Login format has to be 

```json
{
    "username": "<username>",
    "password": "<password>"
}
```
Returned will be JSON. It will contain the token wir an error.

The returned JWT has to be added to the X-AUTH-TOKEN header for each request which is protected.

Protected area is localed under `/api/admin`. There is an example controller action will is protected and can only be accessed witha valid JWT. The route will be `/api/admin/example`.
