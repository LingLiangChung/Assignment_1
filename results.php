<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // B200261C Ling Liang Chung
    // TODO 1: Create short variable names.
    $searchType = '';
    $searchTerm = '';

    // TODO 2: Check and filter data coming from the user.
    if (isset($_POST['searchType']) && isset($_POST['searchTerm'])){
        $searchType = $_POST['searchType'];
        $searchTerm = $_POST['searchTerm'];

        echo "Search with $searchType, keywork :- $searchTerm";
        
        // TODO 3: Setup a connection to the appropriate database.
        $conn = new mysqli('localhost', 'root', '', 'book');
        if($conn->connect_error) die("FATAL ERROR");
        
        // TODO 4: Query the database.
        $query = "SELECT * FROM catalogs WHERE $searchType LIKE '%$searchTerm%'";
        $result = $conn->query($query);
        if(!$result) die("Fatal Error");
        
        // TODO 5: Retrieve the results.
        $num_row = $result->num_rows;

        if($num_row > 0){
            for($i = 0; $i < $num_row; $i++){
                $row = $result->fetch_assoc();
                $isbn = $row['isbn'];
                $author = $row['author'];
                $title = $row['title'];
                $price = $row['price'];


        // TODO 6: Display the results back to user.
?>              
        <?php echo "
                <hr>
                <pre>
                ISBN    $isbn
                Author  $author
                Title   $title
                Price   RM $price
                </pre>";
            }
        }
    }

    // TODO 7: Disconnecting from the database.
    $conn->close();

    ?>
</body>
</html>