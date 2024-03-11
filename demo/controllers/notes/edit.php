<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// In PHP, the => operator is used in associative arrays to associate keys 
// with values. It is typically used in array declarations and function arguments 
// when you need to specify key-value pairs.

authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
