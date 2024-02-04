
INSERT INTO roles(ro_name) 
VALUES 
   ('superadmin'),
   ('administrator'),
   ('user');

INSERT INTO employees (em_firstname, em_lastname, em_email,em_password,ro_id)
VALUES
   ('admin','admin','admin@localhost','admin',1),
   ('Vincent','Parrot','vparrot@test.fr','test',2);

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
   ('Lundi','09:00','12:00','14:00','18:00',2),
   ('Mardi','09:00','12:00','14:00','18:00',2),
   ('Mercredi','09:00','12:00','14:00','18:00',2),
   ('Jeudi','09:00','12:00','14:00','18:00',2),
   ('Vendredi','09:00','12:00','14:00','18:00',2),
   ('Samedi','00:00','00:00','00:00','00:00',2),
   ('Dimanche','00:00','00:00','00:00','00:00',2);


INSERT INTO opinions(op_surname,op_note, op_comments,ro_id)
VALUES
    ('toto69',5, 'super génial de la mort qui tue',3),
    ('Cruella58',2, 'super bof bof',3),
    ('Mystic36',4, 'appréciable',3),
    ('Bijbij',3, 'jadore',3),
    ('Loto65',5, 'trop sympa',3),
    ('Skywalker',4, 'merci',3),
    ('Mishi',5, 'je recommande',3);

INSERT INTO services(se_title,se_description,ro_id)
VALUES
    ('Entretien', '',2),
    ('Mécanique', '',2),
    ('Carrosserie', '',2);

INSERT INTO contacts(co_firstname,co_lastname,co_email,co_phone,co_subject,co_description, ro_id)
VALUES
    ('Marcel','Gaps','mgaps@exemple.fr','0612345678','test','demande de test une voiture',3),
    ('Gertrude','Martin','gmartin@exemple.fr','0612345678','rdv','demande de rdv',3),
    ('Michelle','Grand','mgrand@exemple.fr','0612345678','entretien','demande de révision voiture',3),
    ('Bernard','Petit','bpetit@exemple.fr','0612345678','demande','demande essai une voiture',3),
    ('Martine','Brouille','mbrouille@exemple.fr','0612345678','Vente','vente véhicule',3),
    ('Mirelle','Troupe','mtroupe@exemple.fr','0612345678','Achat','demande de renseignement sur une voiture',3);

INSERT INTO vehicles(ve_designation,ve_price,ve_km,ve_year,ve_color,ve_doors,en_id, mo_id,em_id)
VALUES
    ('Exept',25459,25432,2023,'Red',5, 4,2,1),
    ('Rare',23612,12542,2023,'Yellow',5,5,4,1),
    ('Occaz',12345,98657,2022,'Blue',3, 3,3,1),
    ('Folie',8999,175236,2018,'Orange',5, 2,6,1),
    ('Bijoux',3000,275123,2012,'White',3, 1,7,1);

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
    (5,8),
    (5,2),
    (5,12);




