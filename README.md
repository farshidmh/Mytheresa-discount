# MyTheresa Backend Developer Assignment

Welcome to the showcase of my skills as a backend developer. This project was designed as a task for the backend developer position at MyTheresa and showcases my proficiency in API development and architectural design decisions.

## Project Outline

This project represents a simple, yet powerful, RESTful API application. It's a simulation of an e-commerce platform, where you can create a product, classify it under a category, and apply a discount to it.

Please take a moment to check the detailed design document here: [Design Document](https://docs.google.com/document/d/1o0TexEYFuF9hOs7iJNWLP8bma428t5MCyAaCBVu--LI/edit?usp=sharing)


## Future Enhancements

While I aimed to cover all necessary aspects, due to time constraints, a few extras are still on the list for future implementation:

- Expanding the test suite (only a core set has been added at this time)
- Ability to delete a category, product, and discount
- Implementation of an expiration date for discounts

## Architectural and Design Choices

- **Laravel**: Leveraging Laravel, a premier PHP framework renowned for its straightforward usability, robust support for RESTful API development, and dynamic community, has allowed this project to thrive. Laravel's selection as the project's backbone reflects our commitment to efficient and effective development practices.
- **Docker**: Recognizing the significance of seamless setup and deployment, the application is containerized using Docker. This not only ensures compatibility with diverse cloud platforms like AWS and GCP, but also underscores our proficiency in modern development environments and commitment to agility and scalability.
- **PHPUnit**: In pursuit of high-quality, reliable software, PHPUnit, a well-regarded testing tool for PHP applications, was adopted. PHPUnit's simplicity and comprehensive documentation make it ideal for establishing a robust and thorough testing environment.
- **Postman**: With an eye on thorough API testing and comprehensive documentation, we leveraged Postman's intuitive interface and extensive capabilities. This decision reflects our meticulous approach to testing and knowledge sharing.
- **Caching**: Performance optimization was achieved by implementing caching for categories and discounts using Laravel's built-in caching mechanism. This shows our adeptness in enhancing application performance, and readiness to transition to more robust solutions like Redis as needed.
- **Clean Code Practices**: Our adherence to clean code practices throughout the development process ensures readability, maintainability, and testability of our code. This commitment reflects our professionalism and consideration for future developers and maintenance work.
- **Utilizing PHP 8.1**: By harnessing the latest features, improvements, and optimizations offered by PHP 8.1, we demonstrate our continuous efforts to stay at the forefront of technology advancements.
- **Repository Pattern**: By using the Repository Pattern for all database queries, we achieved an abstracted database layer which makes the application easier to maintain and test, proving our skill in implementing well-established design patterns.
- **Automated Migrations and Seeders in Docker Setup**: Automation of migrations and seeders in the Docker setup ensures the accurate setup of our database whenever the Docker container is launched. This highlights our focus on accuracy, repeatability, and streamlined development and deployment processes.



## Run the Project

**Note:** During the first run, the application sets up and seeds the database. No extra steps are needed to run migrations or seeders.

### Run the project

```bash
docker-compose up -d
```

### Endpoints

http://localhost:8080/api/v1/

### Postman

Post man collection can be found here:

https://www.postman.com/farshidmh/workspace/mytheresa-discount/collection/11924729-e403475b-f0f7-445c-b790-6a2e58f496c6?action=share&creator=11924729

API documentation can be found here:

https://documenter.getpostman.com/view/11924729/2s93zCa1Q7

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

Thank you for your interest and looking forward to the opportunity of discussing my qualifications further.
