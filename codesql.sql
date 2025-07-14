-- Supprimer l'ancienne base si elle existe
DROP DATABASE IF EXISTS emprunt;

-- Créer la base
CREATE DATABASE partage_objets;
USE partage_objets;

-- Table membre
CREATE TABLE emprunt_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre ENUM('H', 'F'),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(100),
    image_profil VARCHAR(255)
);

-- Table categorie_objet
CREATE TABLE emprunt_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

-- Table objet
CREATE TABLE emprunt_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES emprunt_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES emprunt_membre(id_membre)
    ALTER TABLE emprunt_objet
    ADD etat VARCHAR(100);

);

-- Table images_objet
CREATE TABLE emprunt_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES emprunt_objet(id_objet)
);

-- Table emprunt
CREATE TABLE emprunt_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES emprunt_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES emprunt_membre(id_membre)
);

-- Insertion des membres
INSERT INTO emprunt_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice', '1995-04-12', 'F', 'alice@example.com', 'Antananarivo', 'mdp123', 'alice.jpg'),
('Bob', '1990-06-22', 'H', 'bob@example.com', 'Fianarantsoa', 'bobpwd', 'bob.jpg'),
('Charlie', '1988-12-05', 'H', 'charlie@example.com', 'Toamasina', 'charliepass', 'charlie.jpg'),
('Dina', '2000-08-30', 'F', 'dina@example.com', 'Mahajanga', 'dinapass', 'dina.jpg');

-- Insertion des catégories
INSERT INTO emprunt_categorie_objet (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');

-- Objets de Alice (id_membre = 1)
INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux', 1, 1),
('Lime à ongles', 1, 1),
('Tournevis', 2, 1),
('Marteau', 2, 1),
('Clé à molette', 3, 1),
('Clé plate', 3, 1),
('Mixeur', 4, 1),
('Poêle', 4, 1),
('Brosse à cheveux', 1, 1),
('Épilateur', 1, 1);

-- Objets de Bob (id_membre = 2)
INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Perceuse', 2, 2),
('Scie sauteuse', 2, 2),
('Ponceuse', 2, 2),
('Tondeuse', 1, 2),
('Cafetière', 4, 2),
('Friteuse', 4, 2),
('Jack hydraulique', 3, 2),
('Cric', 3, 2),
('Multimètre', 3, 2),
('Fer à lisser', 1, 2);

-- Objets de Charlie (id_membre = 3)
INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Clé dynamométrique', 3, 3),
('Tournevis plat', 2, 3),
('Four', 4, 3),
('Batteur électrique', 4, 3),
('Trousse de maquillage', 1, 3),
('Shampoing', 1, 3),
('Ciseaux de coiffure', 1, 3),
('Scie circulaire', 2, 3),
('Pompe à vélo', 3, 3),
('Spatule', 4, 3);

-- Objets de Dina (id_membre = 4)
INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Lisseur', 1, 4),
('Marteau perforateur', 2, 4),
('Tournevis cruciforme', 2, 4),
('Planche à découper', 4, 4),
('Grille-pain', 4, 4),
('Moteur de voiture', 3, 4),
('Écrou', 3, 4),
('Crème hydratante', 1, 4),
('Trousse de manucure', 1, 4),
('Clé anglaise', 3, 4);

-- Images d'objet (facultatif)
INSERT INTO emprunt_images_objet (id_objet, nom_image) VALUES
(1, 'seche_cheveux.jpg'),
(2, 'lime.jpg'),
(11, 'perceuse.jpg'),
(21, 'cle_dynamometrique.jpg'),
(31, 'lisseur.jpg');

-- Emprunts (les objets ne sont pas empruntés par leur propriétaire)
INSERT INTO emprunt_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-05'),
(3, 3, '2025-07-02', '2025-07-06'),
(5, 4, '2025-07-03', '2025-07-07'),
(11, 1, '2025-07-04', '2025-07-08'),
(13, 4, '2025-07-05', '2025-07-09'),
(15, 3, '2025-07-06', '2025-07-10'),
(23, 2, '2025-07-07', '2025-07-11'),
(30, 1, '2025-07-08', '2025-07-12'),
(32, 1, '2025-07-09', '2025-07-13'),
(39, 2, '2025-07-10', '2025-07-14');
