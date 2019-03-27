 -- CREATE DATABASE movies_project1;

use movies_project1;
drop table users;
CREATE TABLE users (
    id INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(256) NOT NULL
);