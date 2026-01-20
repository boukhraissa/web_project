

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    token VARCHAR(255),
    role VARCHAR(50) NOT NULL DEFAULT 'user',
    filiere VARCHAR(100),
);

CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    note DECIMAL(5,2) NOT NULL,
    matiere VARCHAR(100) NOT NULL,

    CONSTRAINT fk_notes_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE
);
INSERT INTO clubs (id, nom) VALUES
(1, 'Rotaract'),
(2, 'BSecure'),
(3, 'Epic'),
(4, 'Enactus'),
(5, 'Comité Masjid');

CREATE TABLE evenements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL UNIQUE
);
INSERT INTO evenements (nom) VALUES
('Electrodays'),
('JEnR'),
('Don du Sang'),
('Competition Football');

CREATE TABLE membre_club (
    id INT AUTO_INCREMENT PRIMARY KEY,
    membre_id INT NOT NULL,
    club_id INT NOT NULL,

    CONSTRAINT fk_membre_club_membre
        FOREIGN KEY (membre_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_membre_club_club
        FOREIGN KEY (club_id)
        REFERENCES clubs(id)
        ON DELETE CASCADE,

    UNIQUE (membre_id, club_id)
);


CREATE TABLE membre_evenement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    membre_id INT NOT NULL,
    evenement_id INT NOT NULL,

    CONSTRAINT fk_membre_evenement_membre
        FOREIGN KEY (membre_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_membre_evenement_evenement
        FOREIGN KEY (evenement_id)
        REFERENCES evenements(id)
        ON DELETE CASCADE,

    UNIQUE (membre_id, evenement_id)
);

CREATE TABLE join_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    target_type VARCHAR(50) NOT NULL,
    target_id INT NOT NULL,
    source VARCHAR(50),
    statut VARCHAR(50),

    CONSTRAINT fk_join_requests_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE postulation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    date_naissance DATE NOT NULL,
    email VARCHAR(150) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    code_postal VARCHAR(20) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    diplome VARCHAR(150) NOT NULL
);

