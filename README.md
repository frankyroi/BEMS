# BEMS
This is a simple laravel employee management app. 




## How to install and run on your local system
1. git clone https://github.com/frankyroi/bems.git
2. cd BEMS/
3. composer install
4. cp .env.example .env
5. php artisan key:generate
7. Add your database config in the .env file
8. php artisan migrate
9. php artisan serve (if the server opens up, http://127.0.0.1:8000,  then we are good to go)

10. Navigate to http://127.0.0.1:8000

## Operations
- Create details of new employee 
- Display all registered employee details 
- Update employee data 
- Archive (not delete) past employee details 
- Save/create logs of every activity carried out on the system
- Display logs of every activity carried out on the system
