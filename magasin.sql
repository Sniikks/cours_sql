/*Créer une base de donnée qui ce nomme magasin et qui posséde trois table

client avec 6 colonne
id int
prenom string
nom string
email string
ville string
password string
 */


/* Créer les tables suivantes:

Table SERVICE:
ServiceId (int, clé primaire, auto-incrémentation)
ServiceCode (varchar)
ServiceLibelle (varchar)

Table EMPLOYE:
Profil (varchar)

Table DIRECTEUR:
PrimeBilan (varchar)

Table COLLABORATEUR:
Matricule (varchar)
NIR (varchar)
Nom (varchar)
Prenom (varchar)
DateEmbauche (date)
Salaire (decimal)

Table PERSONNE:
Personneid (int, clé primaire, auto-incrémentation)
PersonneCode (varchar)
AdresseCourriel (varchar)

Table TIERS:
NoSiret (varchar)
RAisonSociale (varchar)

Table ADRESSE:
AdresseId (int, clé primaire, auto-incrémentation)
AdresseLigne2 (varchar)
AdresseLigne3 (varchar)
AdresseLigne4 (varchar)
AdresseCodePostal (varchar)
 */

 -- Création de la base de données
CREATE DATABASE IF NOT EXISTS magasin;

-- Utilisation de la base de données
USE magasin;

-- Création de la table "client"
CREATE TABLE IF NOT EXISTS client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    email VARCHAR(255),
    ville VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO client (prenom, nom, email, ville, password) VALUES 
('Bernard', 'Lermitte', 'lermitte@null', 'null', 'bernardo'), 
('Clautide', 'Lafond', 'clauclau@null', 'null', 'clau1234');

-- Création de la table "commande"
CREATE TABLE IF NOT EXISTS commande (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    client_id INT(11) NOT NULL,
    date_achat DATETIME NOT NULL,
    reference VARCHAR(255) NOT NULL,
    prix_total FLOAT NOT NULL,
    CONSTRAINT ClientExist FOREIGN KEY (client_id) REFERENCES client (id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

INSERT INTO commande (client_id, date_achat, reference, prix_total) VALUES
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100);

-- Création de la table "produit"
CREATE TABLE IF NOT EXISTS produit (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    quantite INT(11) NOT NULL,
    prix FLOAT NOT NULL
);

INSERT INTO produit (nom, quantite, prix) VALUES 
('Pomme', 10, 50),
('Casse Noisette', 100, 100),
('Noisette', 1000, 2);

-- Création de la table EMPLOYE
CREATE TABLE IF NOT EXISTS employe (
    EmployeId INT AUTO_INCREMENT PRIMARY KEY,
    Profil VARCHAR(255)
);

-- Création de la table DIRECTEUR
CREATE TABLE IF NOT EXISTS directeur (
    DirecteurId INT AUTO_INCREMENT PRIMARY KEY,
    PrimeBilan VARCHAR(255),
    EmployeId INT,
    FOREIGN KEY (EmployeId) REFERENCES employe (EmployeId)
);

-- Création de la table SERVICE
CREATE TABLE IF NOT EXISTS service (
    ServiceId INT AUTO_INCREMENT PRIMARY KEY,
    ServiceCode VARCHAR(255),
    ServiceLibelle VARCHAR(255)
);

-- Création de la table COLLABORATEUR
CREATE TABLE IF NOT EXISTS collaborateur (
    CollaborateurId INT AUTO_INCREMENT PRIMARY KEY,
    Matricule VARCHAR(255),
    NIR VARCHAR(255),
    Nom VARCHAR(255),
    Prenom VARCHAR(255),
    DateEmbauche DATE,
    Salaire DECIMAL(10, 2),
    EmployeId INT,
    FOREIGN KEY (EmployeId) REFERENCES employe (EmployeId)
);

-- Création de la table PERSONNE
CREATE TABLE IF NOT EXISTS personne (
    Personneid INT AUTO_INCREMENT PRIMARY KEY,
    PersonneCode VARCHAR(255),
    AdresseCourriel VARCHAR(255)
);

-- Création de la table TIERS
CREATE TABLE IF NOT EXISTS Tiers (
    TiersId INT AUTO_INCREMENT PRIMARY KEY,
    NoSiret VARCHAR(255),
    RaisonSociale VARCHAR(255)
);

-- Création de la table ADRESSE
CREATE TABLE IF NOT EXISTS adresse (
    AdresseId INT AUTO_INCREMENT PRIMARY KEY,
    AdresseLigne2 VARCHAR(255),
    AdresseLigne3 VARCHAR(255),
    AdresseLigne4 VARCHAR(255),
    AdresseCodePostal VARCHAR(255)
);
