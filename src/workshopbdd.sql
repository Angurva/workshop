
CREATE TABLE brands(
   br_name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE models(
   models_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   mo_name VARCHAR(250) NOT NULL,
   brands_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(brands_id) REFERENCES brands(brands_id)
);

CREATE TABLE options(
   options_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   opt_name VARCHAR(250) NOT NULL
);

CREATE TABLE motors(
   motors_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   mo_energy VARCHAR(50)
);

CREATE TABLE roles(
   role_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   ro_name VARCHAR(100)
);

CREATE TABLE employees(
   employees_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   em_firstname VARCHAR(100) NOT NULL,
   em_lastname VARCHAR(100) NOT NULL,
   em_email VARCHAR(250) NOT NULL UNIQUE,
   em_password VARCHAR(250) NOT NULL,
   em_created_at DATETIME NOT NULL,
   em_updated_at DATETIME NOT NULL,
   em_status VARCHAR(50) NOT NULL,
   role_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(role_id) REFERENCES roles(role_id)
);

CREATE TABLE vehicles(
   vehicles_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   ve_designation VARCHAR(250) NOT NULL,
   ve_price INT UNSIGNED NOT NULL,
   ve_km INT NOT NULL,
   ve_year YEAR NOT NULL,
   ve_create_at DATETIME NOT NULL,
   motors_id INT UNSIGNED NOT NULL,
   models_id INT UNSIGNED NOT NULL,
   employees_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(motors_id) REFERENCES motors(motors_id),
   FOREIGN KEY(models_id) REFERENCES models(models_id),
   FOREIGN KEY(employees_id) REFERENCES employees(employees_id)
);

CREATE TABLE photos(
   photos_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   ph_name VARCHAR(250) NOT NULL,
   ph_file MEDIUMBLOB NOT NULL,
   vehicles_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(vehicles_id) REFERENCES vehicles(vehicles_id)
);

CREATE TABLE vehicles_options(
   vehicles_id INT UNSIGNED,
   options_id INT UNSIGNED,
   PRIMARY KEY(vehicles_id, options_id),
   FOREIGN KEY(vehicles_id) REFERENCES vehicles(vehicles_id),
   FOREIGN KEY(options_id) REFERENCES options(options_id)
);

CREATE TABLE opinions(
   opi_opinions_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   opi_surname VARCHAR(100) NOT NULL,
   opi_note TINYINT NOT NULL,
   opi_comments TEXT,
   opi_status VARCHAR(50) NOT NULL,
   opi_create_at DATETIME NOT NULL,
   opi_updated_at DATETIME NOT NULL,
   employees_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(employees_id) REFERENCES employees(employees_id)
);

CREATE TABLE schedules(
   schedules_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   sc_day VARCHAR(10) NOT NULL UNIQUE,
   sc_am_start TIME,
   sc_am_end TIME,
   sc_ap_start TIME,
   sc_ap_end TIME,
   sc_updated_at DATETIME NOT NULL,
   employees_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(employees_id) REFERENCES employees(employees_id)
);

CREATE TABLE services(
   services_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   se_title VARCHAR(50) NOT NULL,
   se_description TEXT NOT NULL,
   se_updated_at DATETIME NOT NULL,
   employees_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(employees_id) REFERENCES employees(employees_id)
);

CREATE TABLE contacts(
   contacts_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   co_firstname VARCHAR(100) NOT NULL,
   co_lastname VARCHAR(100) NOT NULL,
   co_email VARCHAR(254) NOT NULL,
   co_tel CHAR(10) NOT NULL,
   co_subject VARCHAR(250),
   co_description TEXT,
   co_status VARCHAR(50) NOT NULL,
   co_create_at DATETIME NOT NULL,
   co_updated_at DATETIME NOT NULL,
   employees_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(employees_id) REFERENCES employees(employees_id)
);

CREATE TABLE contacts_vehicles(
   vehicles_id INT UNSIGNED,
   contacts_id INT UNSIGNED,
   PRIMARY KEY(vehicles_id, contacts_id),
   FOREIGN KEY(vehicles_id) REFERENCES vehicles(vehicles_id),
   FOREIGN KEY(contacts_id) REFERENCES contacts(contacts_id)
);

INSERT INTO roles(ro_name) 
VALUES 
   ('superadmin'),
   ('administrator'),
   ('user');

INSERT INTO employees (em_firstname, em_lastname, em_email,em_password,em_create_at,em_update_at,role_id)
VALUES
   ('admin','admin','admin@localhost','admin',curdate(),curdate(),1);

INSERT INTO brands(br_name)
VALUES
   ('Renault'),
   ('Peugeot'),
   ('Citroën'),
   ('Toyota'),
   ('Fiat'),
   ('BMW');

INSERT INTO motors(mo_energy)
VALUES
   ('diesel'),
   ('essence'),
   ('ethanol'),
   ('électrique'),
   ('hybrid');

INSERT INTO models (mo_name,brands_id)
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

INSERT INTO options(opt_name)
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

INSERT INTO schedules(sc_day,sc_am_start,sc_am_end,sc_ap_start,sc_ap_end,sc_updated_at,employees_id)
VALUES
   ('Lundi','09:00','12:00','14:00','18:00',curdate(),1),
   ('Mardi','09:00','12:00','14:00','18:00',curdate(),1),
   ('Mercredi','09:00','12:00','14:00','18:00',curdate(),1),
   ('Jeudi','09:00','12:00','14:00','18:00',curdate(),1),
   ('Vendredi','09:00','12:00','14:00','18:00',curdate(),1),
   ('Samedi','00:00','00:00','00:00','00:00',curdate(),1),
   ('Dimanche','00:00','00:00','00:00','00:00',curdate(),1);


