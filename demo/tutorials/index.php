<?php
$books = [
    [
        'name' => 'Atomic Habits',
        'author' => 'James Clear',
        'releaseYear' => 2012,
        'purchaseUrl' => 'www.example.com'
    ],
    [
        'name' => 'Slight Edge',
        'author' => 'Jeff Olsen',
        'releaseYear' => 2013,
        'purchaseUrl' => 'www.example.com'
    ],
    [
        'name' => 'Outwitting the Devil',
        'author' => 'Napolean Hill',
        'releaseYear' => 2014,
        'purchaseUrl' => 'www.example.com'
    ],
    [
        'name' => 'Think and Grow Rich',
        'author' => 'Napolean Hill',
        'releaseYear' => 2014,
        'purchaseUrl' => 'www.example.com'
    ]
];

// This function below takes in a list of books and a function used to to filter the books. It returns a list of the filtered books.
function filter($items, $fn)
{
    $filteredItems = []; //initializing an empty list

    foreach ($items as $item) { // for each book in the list, check to see if the function returns true. If it does, add the book to the list
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

//here we set a variable equal to the result of calling the filter function using $books and a function that checks if the release date is greater than or equal to 2000.
$filteredBooks = filter(
    $books,
    function ($book) {
        return $book['releaseYear'] >= 1950 && $book['releaseYear'] <= 2013;
    }
);
// below is the same function, but instead it uses php's built it function that completes the same logic.
$filteredBooks2 = array_filter(
    $books,
    function ($book) {
        return $book['releaseYear'] >= 2014;
    }
);

require "index.view.php";//gives the file in qoutes access to the contents of this current file
