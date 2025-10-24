-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_ecole;
USE gestion_ecole;

-- Table Etudiant
CREATE TABLE IF NOT EXISTS Etudiant (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(20) UNIQUE NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    sexe ENUM('M', 'F') NOT NULL,
    filiere VARCHAR(100) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Prof
CREATE TABLE IF NOT EXISTS Prof (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(20) UNIQUE NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    langues VARCHAR(200) NOT NULL,
    specialite VARCHAR(100) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertion de données dans la table Etudiant
INSERT INTO Etudiant (code, nom, prenom, email, sexe, filiere) VALUES
('ETU001', 'Alami', 'Karim', 'karim.alami@email.com', 'M', 'Génie Informatique'),
('ETU002', 'Benali', 'Fatima', 'fatima.benali@email.com', 'F', 'Génie Civil'),
('ETU003', 'Souiri', 'Mehdi', 'mehdi.souiri@email.com', 'M', 'Gestion'),
('ETU004', 'Rahmani', 'Amina', 'amina.rahmani@email.com', 'F', 'Génie Informatique'),
('ETU005', 'Khalil', 'Youssef', 'youssef.khalil@email.com', 'M', 'Marketing');

-- Insertion de données dans la table Prof
INSERT INTO Prof (code, nom, prenom, email, langues, specialite) VALUES
('PROF001', 'Ghailani', 'Mohamed', 'm.ghailani@email.com', 'Français, Arabe, Anglais', 'Informatique'),
('PROF002', 'Lahlou', 'Samira', 's.lahlou@email.com', 'Français, Arabe', 'Mathématiques'),
('PROF003', 'El Amrani', 'Hassan', 'h.elamrani@email.com', 'Arabe, Anglais', 'Physique'),
('PROF004', 'Bennani', 'Nadia', 'n.bennani@email.com', 'Français, Anglais', 'Gestion'),
('PROF005', 'Cherkaoui', 'Ahmed', 'a.cherkaoui@email.com', 'Arabe, Français', 'Développement Web');