<?php

    $host = "u3174165.epizy.com";
    $username = "epiz_23664270";
    $password = " YhidauJFiqzkz ";
    $dbname = "epiz_23664270_movie_tracker_app";
    $dsn = "mysql:host=$host;dbname=$dbname";
    $options = array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => PDO::FETCH_ASSOC
    );
        
        
        
        try{ 
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
            }
        
        ?>
