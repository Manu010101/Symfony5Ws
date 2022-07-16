USE mi5;

INSERT INTO CATEGORIE(id, libelle, texte)
VALUES (1, "Fruits", "De la passion ou de ton imagination"),
       (2, "Légumes", "Plus tu en manges, moins tu en es un"),
       (3, "Junk Food", "Chère et cancérogène, tu es prévenu(e)");

INSERT INTO produit(id,
                    categorie_id,
                    libelle,
                    texte,
                    prix)
VALUES (1, 1, "Pomme", "Elle est bonne pour la tienne", 3.42),
       (2, 1, "Pomme", "Ici tu n''en es pas une", 2.11),
       (3, 1, "Pêche", "Elle va te la donner", 2.84),
       (4, 2, "Carotte", "C'est bon pour ta vue", 3.42),
       (5, 2, "Tomate", "Ici tu n''en es pas une", 2.11),
       (6, 2, "Chou Romanesco", "Elle va te la donner", 2.84),
       (7, 3, "Nutella", "Elle est bonne pour la tienne", 3.42),
       (8, 3, "Pizza", "Ici tu n''en es pas une", 2.11),
       (9, 3, "Oreo", "Elle va te la donner", 2.84);