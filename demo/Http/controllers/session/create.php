<?php

view('session/create.view.php', [
    'errors' => $_SESSION['__flash']['errors'] ?? []
]);
