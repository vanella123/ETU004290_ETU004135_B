create or replace view v_objet_emprunt_categorie as select empo.* , e.id_emprunt ,
 e.date_emprunt , e.date_retour ,ca.nom_categorie from emprunt_objet empo join emprunt_emprunt e 
on empo.id_objet = e.id_objet join emprunt_categorie_objet ca on empo.id_categorie = ca.id_categorie; 

create or replace view v_objet_emprunt_categorie as select from v_objet_emprunt 
join emprunt_categorie_objet on 