<?php

const BASE_PATH = __DIR__ . '/../';

// var_dump(BASE_PATH);

require BASE_PATH . "functions.php";

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

require base_path("router.php");

// $config = require('config.php');

// $db = new Database($config['database']);

// $id = $_GET['id'];

// // Never inline user input into a query string.
// // That makes the database vunerable to sql injection
// $query = "select * from posts where id = ?";

// dd($query);

// $posts = $db->query($query, [$id])->fetchAll();

// dd($posts);
