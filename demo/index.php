<?php

require "functions.php";
require "Database.php";
require "Response.php";
require "router.php";

$config = require('config.php');

$db = new Database($config['database']);

// $id = $_GET['id'];

// // Never inline user input into a query string.
// // That makes the database vunerable to sql injection
// $query = "select * from posts where id = ?";

// dd($query);

// $posts = $db->query($query, [$id])->fetchAll();

// dd($posts);
