<?php

$config = require('config.php');

$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->find();

// In PHP, the => operator is used in associative arrays to associate keys 
// with values. It is typically used in array declarations and function arguments 
// when you need to specify key-value pairs.

authorize($note['user_id'] === $currentUserId);

// dd($notes);
require "views/notes/show.view.php"; //gives the file in qoutes access to the contents of this current file
