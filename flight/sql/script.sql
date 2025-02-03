CREATE DATABASE Agence_immobilier;
USE Agence_immobilier;

-- Table pour les utilisateurs
CREATE TABLE Clients (
    idClient INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nom VARCHAR(100) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    tel VARCHAR(15)
);

-- Table pour l'administrateur
CREATE TABLE Admins (
    idAdmi INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL
);

-- Table pour les habitations
CREATE TABLE Habitats (
    idHabitat INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    nbChambre INT NOT NULL,
    loyer_par_jour DECIMAL(10, 2) NOT NULL,
    localisation VARCHAR(100),
    description TEXT
);

-- Table pour les réservations
CREATE TABLE Reservations (
    idReservation INT AUTO_INCREMENT PRIMARY KEY,
    idClient INT NOT NULL,
    idHabitat INT NOT NULL,
    date_deb DATE NOT NULL,
    date_fin DATE NOT NULL,
    prixTotal DECIMAL(10, 2),
    FOREIGN KEY (idClient) REFERENCES Clients(idClient),
    FOREIGN KEY (idHabitat) REFERENCES Habitats(idHabitat)
);

CREATE TABLE Photos(
    idPhoto INT AUTO_INCREMENT PRIMARY KEY,
    idHabitat int,
    url TEXT
);


