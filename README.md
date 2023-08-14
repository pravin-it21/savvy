
# Savvy
Savvy the shopping List using Larvel, Php and Tailwind

## Features:
1. Registeration Page. User should not be allowed to register if he/she tries to provide the already registered email ID.
2. Login Page with User Authentication.
3. The password should be encrypted and the password field shouldn't be displayed for Others.
4. Implementation of pagination for all the list view across the application.
5. While Registration There will be Option to be admin.
6. Admin can have the access to create list of Products and make them to Public.
7. Admin has manage Product Page to Edit,Delete their Created Products.
8. User can see the product only after Admin make that product visible as Public.
9. User Has a Added to Cart page To Buy Their Products.

## Prerequisites
1. Install Laragon web server
2. Any Editor (Preferably VS Code or Sublime Text)
3. Any web browser with latest version

## Languages and Technologies used
1. Laravel Framework
2. HTML5/TAILWIND CSS
3. Php (to create dynamically updating content)
4. Laragon (A web server)
5. Php
6. MySQL (An RDBMS that uses SQL)




### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env


## Steps to run the project in your machine
1. Download and install Larogon in your machine
2. Clone or download the repository
3. Extract all the files
4. Start the Laragon
5. Open your web browser and type 'Savvy.test'

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Seeding The Database
To add the dummy listings with a single user, run the following
```
php artisan db:seed
```

### File Uploading
When uploading listing files, they go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.
```
php artisan storage:link
```

### Running The App
Upload the files to your document root, Valet folder or run 
```
php artisan serve
```

  
