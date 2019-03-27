<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

    require "../config.php";
    require "common.php";

    if (isset($_GET["id"])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET["id"];
            
            $sql = "DELETE FROM works WHERE id = :id";

            $statement = $connection->prepare($sql);
            
            $statement->bindValue(':id', $id);
            
            $statement->execute();

            $success = "Movie successfully deleted";

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    };

    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM works";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>


<?php include "templates/header.php"?>

<div class="container">
    <div class="row">

        <h2>Delete a Movie</h2>

        <?php if ($success) echo $success; ?>

        <?php foreach($result as $row) { ?>

        <p>
            ID:
            <?php echo $row ['id']; ?><br>Movie Title:
            <?php echo $row ['title']; ?><br>Year Released:
            <?php echo $row ['year']; ?><br>Genre:
            <?php echo $row ['genre']; ?><br>Rating:
            <?php echo $row {'rating'}; ?><br>
            <a href='delete.php?id=<?php echo $row['id'];?>'>Delete</a>
        </p>

        <hr>

        <?php
     };

?>

        <form method="post">

            <input type="submit" name="submit" value="View all">

        </form>

        <?php include "templates/footer.php"?>
