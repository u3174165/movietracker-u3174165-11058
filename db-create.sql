CREATE DATABASE movies_project1;

use movies_project1;

CREATE TABLE works (
    id INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    year VARCHAR(50) NOT NULL,
    director VARCHAR(30),
    genre VARCHAR(30),
    length VARCHAR(30),
    rating VARCHAR(30)
);

drop table users;
CREATE TABLE users (
    id INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(256) NOT NULL
);