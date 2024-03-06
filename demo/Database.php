<?php
//Whenever you have a php file that only contains a class. General convention is that the file name be capitalized.
// Connect to MySQL database and execute a query.
class Database
{
    public $connection;
    //a construct method will auto trigger/execute when an instance is created.
    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';'); //example.com?host=localhost&post=3306

        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        // Create a new PDO (PHP Data Objects) instance for database connection.
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    //remember: a function of a class is a method.
    public function query($query, $params = [])
    {
        // Prepare a SQL query to select all columns from the 'posts' table.
        $statement = $this->connection->prepare($query);

        // Execute the prepared statement, fetching all results.
        $statement->execute($params);

        // Fetch all posts as an associative array using PDO::FETCH_ASSOC.
        return $statement;
    }
}

// $db = new Database($config);

// $posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

// // Iterate through each post and display the title in an unordered list.
// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
