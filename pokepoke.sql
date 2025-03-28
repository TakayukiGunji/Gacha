DROP DATABASE IF EXISTS PokePoke;

CREATE DATABASE PokePoke DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP USER IF EXISTS 'admin'@'localhost';

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password';

GRANT ALL ON PokePoke.* TO 'admin'@'localhost';

USE PokePoke;

CREATE TABLE card (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR ( 50 ) NOT NULL,
    image VARCHAR ( 255 ),
    rare INT NOT NULL,
    type VARCHAR ( 10 ),
    HP INT,
    evo VARCHAR ( 255 ),
    evo_source VARCHAR ( 255 ),
    property_name VARCHAR ( 255 ),
    property_ex VARCHAR ( 255 ),
    attack_1_cost VARCHAR ( 255 ),
    attack_1_name VARCHAR ( 255 ),
    attack_1_damage INT,
    attack_1_effect VARCHAR ( 255 ),
    attack_2_cost VARCHAR ( 255 ),
    attack_2_name VARCHAR ( 255 ),
    attack_2_damage INT,
    attack_2_effect VARCHAR ( 255 ),
    weakpoint VARCHAR ( 255 ),
    weakpoint_damage VARCHAR ( 255 ),
    escape VARCHAR ( 255 )
    );