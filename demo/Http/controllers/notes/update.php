<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// In PHP, the => operator is used in associative arrays to associate keys 
// with values. It is typically used in array declarations and function arguments 
// when you need to specify key-value pairs.

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

$errors = [];

//validate the form {{{{{{THIS is duplicate code from show.php. How can we prevent this??}}}}}}
if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}
//if no validation errors, update the record in the notes database table.
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();
