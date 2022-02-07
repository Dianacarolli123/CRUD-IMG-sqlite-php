<?php
//Create a new SQLite3 Database
$db = new SQLite3('members.db') or die("Unable to open database!");

//Create a new table to our database 
$query = "CREATE TABLE IF NOT EXISTS 'members' (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nameImgP TEXT, location TEXT, nameP STRING, descriptionP STRING, costP INT)";
$db->exec($query);

?>
