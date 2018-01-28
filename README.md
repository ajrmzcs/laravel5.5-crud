# Laravel-CRUD-Demo
Basic CRUD with resource controller in Laravel 5.5.
## Description

Implement a basic create, read, update and delete on the user model prefilled with 200 sample records.

## Controllers

* UserController: Resource controller with request validations for store and update methods, with an unique condition for user's email.   

## Views

* Home: Home page with a paginated table and action buttons using Bootstrap 3.
* Form: Reusable form to create and edit records, with conditional method spoofing.
  

## Installation

* Clone this repository and setup a sample database in .env file
* Run:

```bash
composer install
npm install
php artisan migrate
php artisan db:seed
```
You can see this working in this live [demo](http://crud.antonioramirez.co "Crud Demo"), but take into consideration that user creation and update has been disabled.



