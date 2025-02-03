-- Données de test pour les habitations
INSERT INTO Habitats (type, nbChambre, loyer_par_jour, localisation, description)
VALUES
('Maison', 4, 120.00, 'Quartier Sud', 'Maison spacieuse avec piscine'),
('Studio', 1, 60.00, 'Centre Ville', 'Studio moderne et lumineux'),
('Appartement', 3, 90.00, 'Quartier Nord', 'Appartement familial proche des commerces');

-- Donnée de test pour l'administrateur
INSERT INTO Admins (email, mdp)
VALUES ('admin@gmail.com', 'admin123');

-- Données de test pour les photos associées aux habitations
INSERT INTO Photos (idHabitat, url) VALUES
(1, '../assets/images/maison1.jpg'),
(2, '../assets/images/studio1.jpg'),
(3, '../assets/images/appartement1.jpg');

INSERT INTO Photos (idHabitat, url) VALUES
(4, '../assets/images/maison1.jpg'),
(5, '../assets/images/studio1.jpg'),
(6, '../assets/images/appartement1.jpg');
