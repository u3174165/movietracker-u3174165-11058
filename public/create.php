<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


if (isset($_POST['submit'])) {

require "../config.php";

try {
$connection = new PDO($dsn, $username, $password, $options);

$new_movie = array(
"title" => $_POST['title'],
"year" => $_POST['year'],
"genre" => $_POST['genre'],
"rating" => $_POST['rating'],
);

$sql = "INSERT INTO `works` (title, year, genre, rating) VALUES (:title, :year, :genre, :rating)";

$statement = $connection->prepare($sql);
$statement->execute($new_movie);

} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
}
?>

<?php include "templates/header.php"; ?>

<div class="container">
    <div class="row">

        <h2>Add a movie</h2>

        <?php if (isset($_POST['submit']) && $statement) { ?>
        <p>Movie successfully added</p>
        <?php } ?>

        <form method="post">
            <label for="title">Movie Title</label>
            <input type="text" name="title" id="title">

            <label for="year">Year Released</label>
            <input type="text" name="year" id="year">

            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre">

            <label for="rating">Rating</label>
            <input type="text" name="rating" id="text">

            <br>

            <input type="submit" name="submit" value="Submit">

        </form>



        <?php include "templates/footer.php"?>
