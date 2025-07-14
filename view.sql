CREATE OR REPLACE VIEW v_objet_emprunt_categorie_membre AS
SELECT 
    o.id_objet,
    o.nom_objet,
    c.nom_categorie,
    e.id_emprunt,
    e.date_emprunt,
    e.date_retour,
    m.id_membre,
    m.nom AS nom_membre,
    m.email,
    m.ville
FROM emprunt_objet o
JOIN emprunt_emprunt e ON o.id_objet = e.id_objet
JOIN emprunt_categorie_objet c ON o.id_categorie = c.id_categorie
JOIN emprunt_membre m ON e.id_membre = m.id_membre;


/*create or replace view v_objet_emprunt_categorie as select from v_objet_emprunt 
join emprunt_categorie_objet on 
**/
create or replace v_objet_image as select empo.* , empio.id_image , empio.nom_image 
 from emprunt_objet empo join emprunt_images_objet 
empio on empo.id_objet = empio.id_objet ; 


CREATE OR REPLACE VIEW v_emprunt_images_objet_categorie_membre AS 
SELECT m.*, c.*,o.id_membre AS proprietaire,o.nom_objet,i.*,e.id_emprunt,e.id_membre AS empperso,e.date_emprunt,e.date_retour 
FROM emprunt_objet o
JOIN emprunt_membre m ON m.id_membre = o.id_membre
JOIN emprunt_categorie_objet c ON c.id_categorie = o.id_categorie
LEFT JOIN emprunt_images_objet i ON i.id_objet = o.id_objet
LEFT JOIN emprunt_emprunt e ON e.id_objet = o.id_objet;
