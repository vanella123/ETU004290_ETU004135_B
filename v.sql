create or replace view v_objet_emprunt_categorie as select empo.* , e.id_emprunt ,
 e.date_emprunt , e.date_retour ,ca.nom_categorie from emprunt_objet empo join emprunt_emprunt e 
on empo.id_objet = e.id_objet join emprunt_categorie_objet ca on empo.id_categorie = ca.id_categorie; 

/*create or replace view v_emprunt_images_objet_categorie_membre as select m.*,c.*,o.id_membre proprietaire,o.nom_objet,i.*,
e.id_emprunt,e.id_membre empperso ,e.date_emprunt ,e.date_retour from emprunt_emprunt e join emprunt_objet o on 
e.id_objet=o.id_objet join emprunt_images_objet  i on i.id_objet=o.id_objet join emprunt_categorie_objet c on c.id_categorie=o.id_categorie join 
emprunt_membre m on  m.id_membre=o.id_membre ;

create or replace view v_emprunt_images_objet as select o.id_membre proprietaire,o.nom_objet,i.*,
e.id_emprunt,e.id_membre empperso ,e.date_emprunt ,e.date_retour from emprunt_emprunt e join emprunt_objet o on 
e.id_objet=o.id_objet join emprunt_images_objet  i on i.id_objet=o.id_objet  ;*/

CREATE OR REPLACE VIEW v_emprunt_images_objet_categorie_membre AS 
SELECT m.*, c.*,o.id_membre AS proprietaire,o.nom_objet,i.*,e.id_emprunt,e.id_membre AS empperso,e.date_emprunt,e.date_retour 
FROM emprunt_objet o
JOIN emprunt_membre m ON m.id_membre = o.id_membre
JOIN emprunt_categorie_objet c ON c.id_categorie = o.id_categorie
LEFT JOIN emprunt_images_objet i ON i.id_objet = o.id_objet
LEFT JOIN emprunt_emprunt e ON e.id_objet = o.id_objet;

