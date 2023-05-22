# GestPat - Virtual Patient Manager

GestPat is a virtual patient manager that allows dentists to easily handle their patients' information. It provides features for creating, updating, deleting, and listing patients.

## Features

- Patient registration with personal information such as name, date of birth, etc.
- Updating the information of an existing patient.
- Deleting a patient from the database.
- Listing all registered patients, with the ability to filter and sort the results.

## Prerequisites

Before installing and running the GestPat application, make sure you have the following:

- PHP 8.1 or higher
- Composer (for dependency installation)
- Web server (e.g., Apache, Nginx)
- Database management system (DBMS) such as MySQL, PostgreSQL

## Installation

1. Clone this code repository to your local machine:

   ```bash
   git clone https://github.com/VicoKev/gestpat.git
   
2. Navigate to the project directory:

    ```bash
    cd gestpat
    
3. Install dependencies using Composer:
       
     ```bash
     composer install
     
4. Copy the .env.example file and rename it to .env. Modify the database configuration settings in this file according to your environment.

5. Generate a new application key:

      ```bash
      php artisan key:generate
      
6. Run the migrations to create the database tables:

      ```bash
      php artisan migrate
      
7. Start the development server:

      ```bash
      php artisan serve
      
The application will be accessible at: http://localhost:8000

## Contributing

Contributions are welcome! If you would like to improve or add new features to GestPat, please follow these steps:

1. Fork this code repository.
2. Create a new branch for your modifications:

      ```bash
      git checkout -b feature/new-feature

3. Make your changes and commit them:

      ```bash
      git commit -m 'Added new feature'

4. Push your changes to your GitHub repository

      ```bash
      git push origin feature/new-feature
      
5. Open a pull request on this repository.


