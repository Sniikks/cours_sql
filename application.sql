CREATE DATABASE application;

USE application;

CREATE TABLE attachement (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(30) UNIQUE NOT NULL,
    created DATETIME DEFAULT current_timestamp,
    body TEXT NOT NULL
) ENGINE=InnoDB;

CREATE TABLE bug (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(30) UNIQUE NOT NULL,
    owner VARCHAR(255) NOT NULL,
    created DATETIME DEFAULT current_timestamp,
    updated DATETIME,
    resolved DATETIME,
    severity ENUM ('1','2','3','4','5'),
    status ENUM ('unsolved', 'resolved'),
    summary VARCHAR(255),
    description TEXT,
    CONSTRAINT AuthorExist FOREIGN KEY (author) REFERENCES attachement(author)
) ENGINE=InnoDB;

CREATE TABLE software (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    contact VARCHAR(255),
    version VARCHAR(255) NOT NULL,
    description TEXT,
    bug_id INT(11),
    CONSTRAINT BugExist_SoftWare FOREIGN KEY (bug_id) REFERENCES bug(id)
) ENGINE=InnoDB;

CREATE TABLE component (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    contact VARCHAR(255),
    description TEXT,
    software_id INT(11) NOT NULL,
    bug_id INT(11),
    CONSTRAINT SoftwareExist_Component FOREIGN KEY (software_id) REFERENCES software(id),
    CONSTRAINT BugExist_Component FOREIGN KEY (bug_id) REFERENCES bug(id)
) ENGINE=InnoDB;

CREATE TABLE package (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    version VARCHAR(255) NOT NULL,
    maintainer VARCHAR(255),
    description TEXT,
    software_id INT(11) NOT NULL,
    bug_id INT(11),
    CONSTRAINT SoftwareExist_Package FOREIGN KEY (software_id) REFERENCES software(id),
    CONSTRAINT BugExist_Package FOREIGN KEY (bug_id) REFERENCES bug(id)
) ENGINE=InnoDB;

CREATE TABLE symptom (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    keyword VARCHAR(255),
    description TEXT,
    bug_id INT(11) NOT NULL,
    CONSTRAINT BugExist_Symptom FOREIGN KEY (bug_id) REFERENCES bug(id)
) ENGINE=InnoDB;

CREATE TABLE plaftorm (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    bug_id INT(11) NOT NULL,
    CONSTRAINT BugExist_Platform FOREIGN KEY (bug_id) REFERENCES bug(id)
) ENGINE=InnoDB;



/*
-- Insérer des données fictives dans la table 'attachement'
INSERT INTO attachement (author, created, body) VALUES
('John Doe', '2023-01-01 10:00:00', 'Contenu du premier attachement'),
('Alice Smith', '2023-01-02 12:30:00', 'Contenu du deuxième attachement'),
('Bob Johnson', '2023-01-03 15:45:00', 'Contenu du troisième attachement');

-- Insérer des données fictives dans la table 'bug'
INSERT INTO bug (author, owner, created, updated, resolved, severity, status, summary, description) VALUES
('John Doe', 'Alice Smith', '2023-01-01 10:00:00', NULL, NULL, '3', 'unsolved', 'Bug critique', 'Description du bug critique'),
('Alice Smith', 'Bob Johnson', '2023-01-02 12:30:00', NULL, NULL, '2', 'unsolved', 'Problème d\'interface', 'Description du problème d\'interface'),
('Bob Johnson', 'John Doe', '2023-01-03 15:45:00', NULL, NULL, '4', 'resolved', 'Bug mineur', 'Description du bug mineur');

-- Insérer des données fictives dans la table 'software'
INSERT INTO software (name, contact, version, description, bug_id) VALUES
('Application A', 'support@appa.com', '1.0', 'Description de l\'Application A', 1),
('Application B', 'support@appb.com', '2.5', 'Description de l\'Application B', 2),
('Application C', 'support@appc.com', '3.2', 'Description de l\'Application C', 3);

-- Insérer des données fictives dans la table 'component'
INSERT INTO component (name, contact, description, software_id, bug_id) VALUES
('Composant 1', 'dev1@comp1.com', 'Description du Composant 1', 1, 1),
('Composant 2', 'dev2@comp2.com', 'Description du Composant 2', 2, 2),
('Composant 3', 'dev3@comp3.com', 'Description du Composant 3', 3, 3);

-- Insérer des données fictives dans la table 'package'
INSERT INTO package (name, version, maintainer, description, software_id, bug_id) VALUES
('Package 1', '1.0', 'Maint1', 'Description du Package 1', 1, 1),
('Package 2', '2.1', 'Maint2', 'Description du Package 2', 2, 2),
('Package 3', '3.5', 'Maint3', 'Description du Package 3', 3, 3);

-- Insérer des données fictives dans la table 'symptom'
INSERT INTO symptom (name, keyword, description, bug_id) VALUES
('Symptôme 1', 'keyword1', 'Description du Symptôme 1', 1),
('Symptôme 2', 'keyword2', 'Description du Symptôme 2', 2),
('Symptôme 3', 'keyword3', 'Description du Symptôme 3', 3);

-- Insérer des données fictives dans la table 'plaftorm'
INSERT INTO plaftorm (name, description, bug_id) VALUES
('Plateforme 1', 'Description de la Plateforme 1', 1),
('Plateforme 2', 'Description de la Plateforme 2', 2),
('Plateforme 3', 'Description de la Plateforme 3', 3);
*/
