DROP DATABASE IF EXISTS PokePoke;

CREATE DATABASE PokePoke DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP USER IF EXISTS 'admin'@'localhost';

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password';

GRANT ALL ON PokePoke.* TO 'admin'@'localhost';

USE PokePoke;

CREATE TABLE CardList (
    id INT PRIMARY KEY AUTO_INCREMENT,
    number INT NOT NULL,
    name VARCHAR ( 50 ) NOT NULL,
    image VARCHAR ( 255 ),
    rare INT NOT NULL,
    pack VARCHAR ( 255 )
    );

CREATE TABLE pack (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR ( 50 ) NOT NULL,
    image VARCHAR ( 255 )
);

CREATE TABLE Card_Pack (
    id INT PRIMARY KEY AUTO_INCREMENT,
    card_id INT,
    pack_id INT,
    FOREIGN KEY ( card_id ) REFERENCES CardList ( id ),
    FOREIGN KEY ( pack_id ) REFERENCES pack ( id )
    );

INSERT INTO CardList (
    VALUES ( NULL, , 1 );
)



id	number	name	image	rare	pack	