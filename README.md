# ERP - myshop

## Description

This project is a web application developed using HTML, PHP, CSS, and MySQL. It runs on a local host and serves as a basic web-based application to interact with a MySQL database.

## Prerequisites

Before running the project, ensure that you have the following installed on your local machine:

1. Apache Web Server with PHP support
2. MySQL Database

## Installation

To set up and run the project on your local machine, follow these steps:

1. Download the project files.
2. Place the project folder inside the web server's root directory (usually "htdocs" for Apache).
3. Import the provided database SQL file (e.g., `database.sql`) into your MySQL database. This will create the required tables and data for the application.
4. Configure the database connection in the PHP files. Look for a file, often named `connect.php`, which contains the database connection details like hostname, username, password, and database name. Modify these details to match your local MySQL configuration.

## Usage

1. Start your Apache web server and MySQL database.
2. Open your web browser and enter the following URL: `http://localhost/ERP/myShop/index.php` (Replace "ERP/myshop" with the actual folder name where you placed the project files).
3. The home page of the web application should now load, and you can navigate through the various features of the application.
