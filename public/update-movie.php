<?php 

    require "../config.php";
    require "common.php";
    

    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            $work =[
              "id"       => $_POST['id'],
              "title"    => $_POST['title'],
              "year"     => $_POST['year'],
              "genre"    => $_POST['genre'],
              "rating"   => $_POST['rating'],
            ];
            
            $sql = "UPDATE `works` 
                    SET id = :id, 
                        title  = :title, 
                        year   = :year, 
                        genre  = :genre, 
                        rating = :rating 
                    WHERE id = :id";

            $statement = $connection->prepare($sql);
            
            $statement->execute($work);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    if (isset($_GET['id'])) {
        
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM works WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            
            $statement->bindValue(':id', $id);
            
            $statement->execute();
            
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        echo "No id - something went wrong";
    };
?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Movie successfully updated.</p>
<?php endif; ?>

<h2>Edit a Movie</h2>

<form method="post">
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo ($work['id']); ?>" >
    
    <label for="title">Movie Title</label>
    <input type="text" name="title" id="title" value="<?php echo $work['title']; ?>">

    <label for="year">Year Released</label>
    <input type="text" name="year" id="year" value="<?php echo $work['year']; ?>">

    <label for="genre">Genre</label>
    <input type="text" name="genre" id="genre" value="<?php echo $work['genre']; ?>">

    <label for="rating">Rating</label>
    <input type="text" name="rating" id="rating" value="<?php echo $work['rating']; ?>">

    <input type="submit" name="submit" value="Save">

</form>


<?php include "templates/footer.php"; ?>