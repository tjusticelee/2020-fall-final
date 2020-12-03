

CREATE DATABASE  IF NOT EXISTS 2020project;
USE 2020project;

DROP TABLE IF EXISTS appointments;

DROP TABLE IF EXISTS checklist;

DROP TABLE IF EXISTS patient;

DROP TABLE IF EXISTS employees;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS role;


CREATE TABLE role (
    role_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    access_lvl int NOT NULL
);

CREATE TABLE users (
    user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(255) NOT NULL,
    lastName varchar(255) NOT NULL,
    email varchar(255),
    phone varchar(255),
    password varchar(255),
    DOB date,
    confirmed BOOLEAN,
    role_id int,
    FOREIGN KEY (role_id)
      REFERENCES role(role_id)
      ON DELETE CASCADE
);

CREATE TABLE employees (
    employee_id int NOT NULL PRIMARY KEY,
    salary int,
    group_id int NOT NULL,
    user_id int,
    FOREIGN KEY (user_id)
      REFERENCES users(user_id)
      ON DELETE CASCADE


);

CREATE TABLE patient (
    patient_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    family_code int NOT NULL,
    emergency_contact varchar(255) NOT NULL,
    relation_to_ec varchar(255) NOT NULL,
    group_id varchar(255) NOT NULL,
    user_id int,
    FOREIGN KEY (user_id)
      REFERENCES users(user_id)
      ON DELETE CASCADE
);

CREATE TABLE checklist (
    list_id int AUTO_INCREMENT PRIMARY KEY,
    dates date NOT NULL,
    am_med BOOLEAN NOT NULL,
    pm_med BOOLEAN NOT NULL,
    eve_med BOOLEAN NOT NULL,
    breakfast BOOLEAN NOT NULL,
    lunch BOOLEAN NOT NULL,
    dinner BOOLEAN NOT NULL,
    patient_id int,
    employee_id int,
    FOREIGN KEY (patient_id)
      REFERENCES patient(patient_id)
      ON DELETE CASCADE,
    FOREIGN KEY (employee_id)
      REFERENCES employees(employee_id)
      ON DELETE CASCADE
);

CREATE TABLE appointments (
    appt_id INT AUTO_INCREMENT PRIMARY KEY,
    app_dates date NOT NULL,
    comment varchar(255) NOT NULL,
    am_med varchar(255) NOT NULL,
    pm_med varchar(255) NOT NULL,
    night_med varchar(255) NOT NULL,
    patient_id int,
    employee_id int,
    FOREIGN KEY (patient_id)
      REFERENCES patient(patient_id)
      ON DELETE CASCADE,
    FOREIGN KEY (employee_id)
      REFERENCES employees(employee_id)
      ON DELETE CASCADE
);
