# MyTheresa Backend Developer Assignment

This is the at home assignment for the MyTheresa backend developer position.

## Requirements
Design document can be found here: https://docs.google.com/document/d/1o0TexEYFuF9hOs7iJNWLP8bma428t5MCyAaCBVu--LI/edit?usp=sharing


## Brief description of the project
The project is a simple RESTFUL api application. It allows the user to create a category, product and apply discount to it.

## Nice to do later
- Add more tests (I ran out of time, only added a few)
- Delete category and product and discount
- create expiration date for discount


## How to run the project

_Note:_ Application will setup the database and seed it with some data on the first run. You don't need to run any migrations or seeders.

### Run the project

```bash
docker-compose up -d
```

### Endpoints


http://localhost:8080/api/v1/


### Postman
Post man collection can be found here: 

https://www.postman.com/farshidmh/workspace/mytheresa-discount/collection/11924729-e403475b-f0f7-445c-b790-6a2e58f496c6?action=share&creator=11924729


### Tests

You need to build the project first and then run the tests.

```bash
docker build . -t mytheresa-app
```
#### Run the container

```bash
docker run --rm -it --entrypoint bash mytheresa-app
```

#### Run The test

In the container

```bash
php artisan test
```

### Stop the project

```bash
docker-compose down
```

