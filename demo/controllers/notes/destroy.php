<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// In PHP, the => operator is used in associative arrays to associate keys 
// with values. It is typically used in array declarations and function arguments 
// when you need to specify key-value pairs.

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
