# Demo Design of an expense manager
The goal is to analyse requirements from this [design](https://www.figma.com/file/foEQ8dkElWPxJ2uD1pwJC5/Development-Task?node-id=179:3) and come up with REST API.

# Installation
 1. git clone
 2. composer install
 3. edit .env to work with your database
 4. php artisan migrate --seed
 5. php artisan run serve
 6. [download](https://drive.google.com/drive/folders/12vJrDe0pENh9mL5BqG0Y6V_g5BRtENYo?usp=sharing) postman API collection for this project
 

# Features

 - [x] Users can CRUD an expense.
 - [x] Users can create an Expense category. 
 - [x] Users can create expense records under an expense category. 
 - [x] Users can see a list of expense categories with all expenses on that category.
 - [x] Users can see the top expenses with total amount and percentage of it from the whole expense

  
# Improvement scope

 1. Dockerize the entire project for easy formation of LAMP stack.
 2. CI/CD pipeline for quick deployments.
 3. Add unit test for at least not all important functions.
 4. Some best practice to follow on application level ( usage of actions, custom kernel commands, helpers)
