-- //Requete pour creer la table Car 

CREATE TABLE car (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50),
    model VARCHAR(50),
    price INT,
    kilometer INT,
    distribution VARCHAR(20),
    year INT,
    fuel VARCHAR(20),
    illustration VARCHAR(255),
    created_at DATETIME IMMUTABLE,
    updated_at DATETIME,
    deleted_at DATETIME,
    added_by_id INT NOT NULL,
    FOREIGN KEY (added_by_id) REFERENCES user(id) 
);

-- // Insertion de données

INSERT INTO car (brand, model, price, kilometer, distribution, year, fuel, illustration, created_at, added_by_id) 
VALUES ('Peugeot', '508', 23000, 50000, 'Chain', 2019, 'Diesel', 'image_path.jpg', NOW(), 1);

-- // Mise à jour des données d'une voiture

UPDATE car 
SET kilometer = 55000, price = 22000 
WHERE id = 1;


/* jointure pour récupérer des données liées récupere toute les colonnes de la table car et récupère le nom et prénom de celui qui a creer l'itération */

SELECT car.*, user.first_name,user.last_name
FROM car 
JOIN user ON car.added_by_id = user.id

