CREATE TABLE brands(
   br_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   br_name VARCHAR(100) NOT NULL
);

CREATE TABLE models(
   mo_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   mo_name VARCHAR(250) NOT NULL,
   br_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(br_id) REFERENCES brands(br_id)
);

CREATE TABLE equipments(
   eq_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   eq_name VARCHAR(250) NOT NULL
);

CREATE TABLE energies(
   en_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   en_name VARCHAR(50) NOT NULL
);

CREATE TABLE roles(
   ro_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   ro_name VARCHAR(50) NOT NULL
);

CREATE TABLE employees(
   em_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   em_firstname VARCHAR(100) NOT NULL,
   em_lastname VARCHAR(100) NOT NULL,
   em_email VARCHAR(250) NOT NULL UNIQUE,
   em_password VARCHAR(250) NOT NULL,
   em_createAt VARCHAR(50) NOT NULL DEFAULT (curdate()),
   em_updateAt DATETIME NOT NULL DEFAULT (curdate()),
   em_status VARCHAR(50) NOT NULL DEFAULT 'active',
   ro_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(ro_id) REFERENCES roles(ro_id)
);

CREATE TABLE opinions(
   op_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   op_surname VARCHAR(100) NOT NULL,
   op_note SMALLINT NOT NULL,
   op_comments TEXT,
   op_status VARCHAR(50) NOT NULL DEFAULT 'pending',
   op_createAt DATETIME NOT NULL DEFAULT (curdate()),
   op_updateAt DATETIME NOT NULL DEFAULT (curdate()),
   ro_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(ro_id) REFERENCES roles(ro_id)
);

CREATE TABLE vehicles(
   ve_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   ve_designation VARCHAR(250) NOT NULL,
   ve_price MEDIUMINT UNSIGNED NOT NULL,
   ve_km MEDIUMINT UNSIGNED NOT NULL,
   ve_year YEAR NOT NULL,
   ve_color VARCHAR(50) NOT NULL,
   ve_doors SMALLINT NOT NULL,
   ve_createAt DATETIME NOT NULL DEFAULT (curdate()),
   en_id INT UNSIGNED NOT NULL,
   mo_id INT UNSIGNED NOT NULL,
   em_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(en_id) REFERENCES energies(en_id),
   FOREIGN KEY(mo_id) REFERENCES models(mo_id),
   FOREIGN KEY(em_id) REFERENCES employees(em_id)
);

CREATE TABLE images(
   im_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   im_name VARCHAR(250) NOT NULL,
   im_file MEDIUMBLOB NOT NULL,
   ve_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(ve_id) REFERENCES vehicles(ve_id)
);

CREATE TABLE schedules(
   sc_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   sc_day VARCHAR(10) NOT NULL UNIQUE,
   sc_am_start TIME,
   sc_am_end TIME,
   sc_ap_start TIME,
   sc_ap_end TIME,
   sc_updateAt DATETIME NOT NULL DEFAULT (curdate()),
   ro_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(ro_id) REFERENCES roles(ro_id)
);

CREATE TABLE services(
   se_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   se_title VARCHAR(50) NOT NULL,
   se_description TEXT NOT NULL,
   se_updateAt DATETIME NOT NULL DEFAULT (curdate()),
   ro_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(ro_id) REFERENCES roles(ro_id)
);

CREATE TABLE contacts(
   co_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   co_firstname VARCHAR(100) NOT NULL,
   co_lastname VARCHAR(100) NOT NULL,
   co_email VARCHAR(254) NOT NULL,
   co_phone CHAR(10) NOT NULL,
   co_subject VARCHAR(250) NOT NULL,
   co_description TEXT NOT NULL,
   co_status VARCHAR(50) NOT NULL DEFAULT 'pending',
   co_createAt DATETIME NOT NULL DEFAULT (curdate()),
   co_updateAt DATETIME NOT NULL DEFAULT (curdate()),
   ro_id INT UNSIGNED NOT NULL,
   FOREIGN KEY(ro_id) REFERENCES roles(ro_id)
);

CREATE TABLE vehicles_equipments(
   ve_id INT UNSIGNED,
   eq_id INT UNSIGNED,
   PRIMARY KEY(ve_id, eq_id),
   FOREIGN KEY(ve_id) REFERENCES vehicles(ve_id),
   FOREIGN KEY(eq_id) REFERENCES equipments(eq_id)
);

CREATE TABLE vehicles_contacts(
   ve_id INT UNSIGNED,
   co_id INT UNSIGNED,
   PRIMARY KEY(ve_id, co_id),
   FOREIGN KEY(ve_id) REFERENCES vehicles(ve_id),
   FOREIGN KEY(co_id) REFERENCES contacts(co_id)
);
