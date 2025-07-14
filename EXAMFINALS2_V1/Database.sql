CREATE TABLE Projet_F_Membres (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    date_naissance DATE,
    genre CHAR(1),
    email VARCHAR(100),
    Ville VARCHAR(50),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

CREATE TABLE Projet_F_Categorie_Objets (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(50)
);

CREATE TABLE Projet_F_Objets (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(50),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES Projet_F_Categorie_Objets(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES Projet_F_Membres(id_membre)
);

CREATE TABLE Projet_F_Image_Objets (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES Projet_F_Objets(id_objet)
);

CREATE TABLE Projet_F_Emprunts (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES Projet_F_Objets(id_objet),
    FOREIGN KEY (id_membre) REFERENCES Projet_F_Membres(id_membre)
);

INSERT INTO Projet_F_Membres (nom, date_naissance, genre, email, Ville, mdp, image_profil) VALUES 
('Dupont', '1990-06-24', 'F', 'dupont@gmail.com', 'Paris', 'Dupont123', 'image1.jpg'),
('Martin', '1985-03-15', 'M', 'martin@gmail.com', 'Lyon', 'Martin456', 'image2.jpg'),
('Durand', '1992-11-19', 'M', 'durand@gmail.com', 'Marseille', 'Durand789', 'image3.jpg'),
('Morel', '1988-01-22', 'F', 'morel@gmail.com', 'Toulouse', 'Morel101', 'image4.jpg');

INSERT INTO Projet_F_Categorie_Objets (nom_categorie) VALUES 
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');

INSERT INTO Projet_F_Objets (nom_objet, id_categorie, id_membre) VALUES 
('Rouge à lèvres', 1, 1),
('Mascara', 1, 1),
('Perceuse', 2, 1),
('Marteau', 2, 1),
('Clé à molette', 3, 1),
('Tournevis plat', 3, 1),
('Couteau de cuisine', 4, 1),
('Poêle', 4, 1),
('Blush', 1, 1),
('Scie', 2, 1),

('Fond de teint', 1, 2),
('Crayon yeux', 1, 2),
('Visseuse', 2, 2),
('Pince', 2, 2),
('Tournevis cruciforme', 3, 2),
('Pince multiprise', 3, 2),
('Casserole', 4, 2),
('Fouet', 4, 2),
('Vernis', 1, 2),
('Niveau', 2, 2),

('Brosse cheveux', 1, 3),
('Parfum', 1, 3),
('Mètre', 2, 3),
('Cutter', 2, 3),
('Cric', 3, 3),
('Pompe à vélo', 3, 3),
('Spatule', 4, 3),
('Planche à découper', 4, 3),
('Crème visage', 1, 3),
('Clé plate', 2, 3),

('Mixeur', 4, 4),
('Cuillère en bois', 4, 4),
('Passoire', 4, 4),
('Balance', 4, 4),
('Manomètre', 3, 4),
('Clé dynamométrique', 3, 4),
('Démonte-pneu', 3, 4),
('Bidon huile', 3, 4),
('Blush', 1, 4),
('Mascara', 1, 4);

INSERT INTO Projet_F_Emprunts (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2024-06-01', '2024-06-10'),
(5, 3, '2024-06-03', '2024-06-12'),
(12, 1, '2024-06-05', '2024-06-15'),
(18, 4, '2024-06-07', '2024-06-17'),
(22, 2, '2024-06-09', '2024-06-19'),
(27, 1, '2024-06-11', '2024-06-21'),
(31, 3, '2024-06-13', '2024-06-23'),
(35, 4, '2024-06-15', '2024-06-25'),
(38, 2, '2024-06-17', '2024-06-27'),
(40, 1, '2024-06-19', '2024-06-29');





