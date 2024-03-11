<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form input
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 25)) {
    $errors['password'] = 'Please provide a password between 7 characters and 25';
}

if (!empty($errors)) {

    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
// check if the user exists in the database

$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


// If so, reject the account creation. Redirect to login page.
if ($user) {
    header('location: /');
    exit();
} else { // If no, create new account, login, redirect.

    $db->query('INSERT into users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    // add the user to the session.
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
