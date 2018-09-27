## K. P. M. A. L. Karunarathne

# Webpad
Webpad is a free online notepad in your web browser. With Webpad you can create notes (ideas, to-do list, links, or any other plain text) that you would like to write just in a web browser online.

# Installation

## Prerequisites
* XAMPP/WAMP or any other LAMPP stack    
*or*  
1. Apache2
2. PHP 5.0+
3. MySQL/MariaDB
4. phpMyAdmin 

## How to Install
Follow these steps to get a copy of Webpad running on your local web server
1. Download all the files as an archive
1. Create a folder called *webpad* inside your htdocs folder and extract the contents of *src/* into it
2. Create a database called *webpad* and import the given SQL dump file from *sql/webpad.sql* from phpmyadmin
3. Create a user account in phpmyadmin and give access to the database
4. Edit *connect.php* with your database details
5. Open up a browser and type in */localhost/webpad*
6. That's it!

# Demo
A live demo of Webpad is hosted on: 

# Screenshots


# Contribution
If you want to contribute to this project, go ahead! Fork it and give it a try.  
Any optimizations, improvements or new features are welcome! 

## Todo
* More secure login/registration system
* Protect from SQL injection
* Handling notes with some kind of a markup standard and allow users to edit notes with a WYSIWYG editor.
* Pagination in note browser and sidebar
* Ability to reset passwords for users
* Adminisrator panel

