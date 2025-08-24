# AILIST
A simple PHP webapp (runs on XAMPP + MySQL) for AI enthusiasts to build their own collection. It features 2 tabs: one for adding a new AI name, and another for viewing the full list of AIs collected so far. Clean interface, lightweight, and easy to set up with an SQL database.

Instructions

Install XAMPP and place the project folder in htdocs/ai_collector.

Start Apache & MySQL.

Open phpMyAdmin → create a database (e.g., ailist).

Import ailist.sql into this database.

Update config/db.php with your DB credentials:

$DB_HOST='localhost';
$DB_NAME='ailist';
$DB_USER='root';
$DB_PASS='';


Open http://localhost/ai_collector.

Use Tab 1 to input new AI names.

Use Tab 2 to view all AIs collected.
