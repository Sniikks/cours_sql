-- BDD "crud"
CREATE DATABASE IF NOT EXISTS crud CHARACTER SET utf8 COLLATE utf8_general_ci;

USE crud;

-- Table "livre"
CREATE TABLE IF NOT EXISTS livre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    ISBN VARCHAR(50) NOT NULL,
    resume TEXT
) CHARACTER SET utf8 COLLATE utf8_general_ci;
