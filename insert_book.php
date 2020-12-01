<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // B200261C Ling Liang Chung
    // TODO 1: Create short variable names.
    $isbn   = '';
    $author = '';
    $title  = '';
    $price  = '';
    // TODO 2: Check and filter data coming from the user.
    if (isset($_POST['isbn']) && !empty($_POST['isbn']) &&
        isset($_POST['author']) && !empty($_POST['author']) &&
        isset($_POST['title']) && !empty($_POST['title']) &&
        isset($_POST['price']) && !empty($_POST['price']))
    {
        $isbn   = $_POST['isbn'];
        $author = $_POST['author'];
        $title  = $_POST['title'];
        $price  = $_POST['price'];

        // TODO 3: Setup a connection to the appropriate database.
        $conn = new mysqli('localhost', 'root', '', 'book');
        if($conn->connect_error) die("FATAL ERROR");
        
        // TODO 4: Query the database.
        $query = "INSERT INTO catalogs VALUES ('$isbn', '$author', '$title', '$price')";
        $result = $conn->query($query);

        // TODO 5: Display the feedback back to user.
        if(!$result) die("Database Access failed");

        echo <<<_END
        New Book Created
        <hr>
        <pre>
        ISBN    $isbn
        Author  $author
        Title   $title
        Price   RM $price
        </pre>
        _END;
        // TODO 6: Disconnecting from the database.
        $conn->close();
    }

    ?>
</body>
</html>