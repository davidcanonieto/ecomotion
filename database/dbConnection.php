<?php
    require 'config.ini.php';

    // function newDBConnection() {
    //     $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

    //     if (!$connection) {
    //         die("Connection failed: " . $connection->error );
    //     }

    //     return $connection;
    // }

//     class DatabaseModelBase
// {
//     protected $connection;

//     public function __construct(Connection $connection)
//     {
//         $this->connection = $connection;
//     }

//     protected function prepare($query)
//     {
//         $connection = $this->connection;
//         $statement = $connection->prepare($query);
//         if (!$statement) {
//             throw new DatabaseException(
//                 sprintf('(%s) %s', $connection->error, $connection->errno)
//             );
//         }
//         return $statement;
//     }
// }


?>
