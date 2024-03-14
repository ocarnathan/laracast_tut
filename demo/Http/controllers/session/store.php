<?php
//log in the user if the credentials match.
use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email', 'No matching account found for that email address and password.');
}

// $session = new Session();
// $session->flash('errors', $form->errors());
/*
NOTE: You do not need to create an instance of a class to call static methods.
 Static methods belong to the class itself rather than to any specific instance 
 of the class.
*/
Session::flash('errors', $form->errors());


return redirect('/login');

// return view('session/create.view.php', [
//     'errors' => $form->errors()
// ]);
