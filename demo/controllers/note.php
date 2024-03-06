<?php

$config = require('config.php');

$db = new Database($config['database']);

$heading = 'Note';

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();

// dd($notes);
require "views/note.view.php"; //gives the file in qoutes access to the contents of this current file
