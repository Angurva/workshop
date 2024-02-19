
INSERT INTO roles(ro_name) 
VALUES 
   ('moderators'),
   ('users');

INSERT INTO brands(br_name)
VALUES
   ('Renault'),
   ('Peugeot'),
   ('Citroën'),
   ('Toyota'),
   ('Fiat'),
   ('BMW');

INSERT INTO energies(en_name)
VALUES
   ('diesel'),
   ('essence'),
   ('ethanol'),
   ('électrique'),
   ('hybrid');

INSERT INTO models (mo_name,br_id)
VALUES
   ('208', 2),
   ('308',2),
   ('Clio',1),
   ('R5',1),
   ('500',5),
   ('Yaris',4),
   ('C4',3),
   ('500XL',5),
   ('M5',6),
   ('Corolla',4),
   ('DS4',3),
   ('Mégane',1),
   ('iX2',6);

INSERT INTO equipments(eq_name)
VALUES
   ('Aide parking'),
   ('Jantes alu'),
   ('Rétroviseurs dégivrants'),
   ('Rétroviseurs électriques'),
   ('Rétroviseurs rabattables électriquement'),
   ('Toit ouvrant panoramique'),
   ('Climatisation automatique multi'), 
   ('Fermeture électrique'),
   ('GPS'),
   ('Régulateur limiteur de vitesse'),
   ('Airbags rideaux'),
   ('ABS');

INSERT INTO schedules(sc_day,sc_am_start,sc_am_end,sc_ap_start,sc_ap_end,ro_id)
VALUES
   ('Lundi','09:00','12:00','14:00','18:00',1),
   ('Mardi','09:00','12:00','14:00','18:00',1),
   ('Mercredi','09:00','12:00','14:00','18:00',1),
   ('Jeudi','09:00','12:00','14:00','18:00',1),
   ('Vendredi','09:00','12:00','14:00','18:00',1),
   ('Samedi','00:00','00:00','00:00','00:00',1),
   ('Dimanche','00:00','00:00','00:00','00:00',1);


INSERT INTO opinions(op_surname,op_note, op_comments,ro_id)
VALUES
    ('toto69',5, 'super génial de la mort qui tue',2),
    ('Cruella58',2, 'super bof bof',2),
    ('Mystic36',4, 'appréciable',2),
    ('Bijbij',3, 'jadore',2),
    ('Loto65',5, 'trop sympa',2),
    ('Skywalker',4, 'merci',2),
    ('Mishi',5, 'je recommande',2);

INSERT INTO services(se_title,se_description,ro_id)
VALUES
    ('Entretien', '',1),
    ('Mécanique', '',1),
    ('Carrosserie', '',1);

INSERT INTO contacts(co_firstname,co_lastname,co_email,co_phone,co_subject,co_description, ro_id)
VALUES
    ('Marcel','Gaps','mgaps@exemple.fr','0612345678','test','demande de test une voiture',3),
    ('Gertrude','Martin','gmartin@exemple.fr','0612345678','rdv','demande de rdv',3),
    ('Michelle','Grand','mgrand@exemple.fr','0612345678','entretien','demande de révision voiture',3),
    ('Bernard','Petit','bpetit@exemple.fr','0612345678','demande','demande essai une voiture',3),
    ('Martine','Brouille','mbrouille@exemple.fr','0612345678','Vente','vente véhicule',3),
    ('Mirelle','Troupe','mtroupe@exemple.fr','0612345678','Achat','demande de renseignement sur une voiture',3);

INSERT INTO vehicles(ve_designation,ve_price,ve_km,ve_year,ve_color,ve_doors,ve_photo,en_id, mo_id,ro_id)
VALUES
    ('Peugeot 3008 sx electric 18ch',25459,25432,2023,'blue',5,'assets/A-1/peugeot-3008.jpg', 4,2,3),
    ('Renault R5 electric sport xs',23612,12542,2023,'Orange',5,'assets/A-2/r5-electric.jpg',5,4,3),
    ('Occaz',12345,98657,2022,'Yellow',3,'assets/A-3/renault_clio.jpg',3,3,3),
    ('Folie',8999,175236,2018,'blue',5,'assets/A-4/toyota-yaris2.jpg',2,6,3),
    ('Bijoux',3000,275123,2012,'White',3,'assets/A-5/citroen_c4.jpg',1,7,3);

INSERT INTO vehicles_equipments(ve_id, eq_id)
VALUES
    (1,1),
    (1,2),
    (1,3),
    (1,4),
    (1,8),
    (1,10),
    (2,5),
    (2,7),
    (2,9),
    (3,2),
    (3,5),
    (3,8),
    (3,11),
    (4,4),
    (4,6),
    (5,8);

INSERT INTO images (im_name, im_path, ve_id)
VALUES
   ('peugeot-30081.jpg','assets/A-1/peugeot-30081.jpg',1),
   ('peugeot-30082.jpg','assets/A-1/peugeot-30082.jpg',1),
   ('peugeot-30083.jpg','assets/A-1/peugeot-30083.jpg',1),
   ('r5-electric1.jpg','assets/A-2/r5-electric1.jpg',2),
   ('r5-electric2.jpg','assets/A-2/r5-electric2.jpg',2),
   ('r5-electric3.jpg','assets/A-2/r5-electric3.jpg',2),
   ('renault_clio1.jpg','assets/A-3/renault_clio1.jpg',3),
   ('renault_clio2.jpg','assets/A-3/renault_clio2.jpg',3),
   ('renault_clio3.jpg','assets/A-3/renault_clio3.jpg',3),
   ('toyota-yaris-int1.jpg','assets/A-4/toyota-yaris-int1.jpg',4),
   ('toyota-yaris-int1.jpg','assets/A-4/toyota-yaris-int2.jpg',4),
   ('toyota-yaris-int1.jpg','assets/A-4/toyota-yaris-int3.jpg',4),
   ('citroen_c41.jpg','assets/A-5/citroen_c41.jpg',5),
   ('citroen_c42.jpg','assets/A-5/citroen_c42.jpg',5),
   ('citroen_c43.jpg','assets/A-5/citroen_c43.jpg',5);
   