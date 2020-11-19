

CREATE DATABASE  IF NOT EXISTS 2020project;
USE 2020project;


DROP TABLE IF EXISTS Users;

DROP TABLE IF EXISTS Role;

DROP TABLE IF EXISTS Employess;

DROP TABLE IF EXISTS Patient;

DROP TABLE IF EXISTS Checklist;

DROP TABLE IF EXISTS Appointments;


CREATE TABLE Users (
    User_id int NOT NULL PRIMARY KEY,
    FirstName varchar(255) NOT NULL,
    LastName varchar(255) NOT NULL,
    email varchar(255),
    Address varchar(255),
    Phone varchar(255),
    Password varchar(255),
    DOB varchar(255),
    FOREIGN KEY (Role_id)
      REFERENCES Role(Role_id)
      ON DELETE CASCADE
);

CREATE TABLE Role (
    Role_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    access_lvl int NOT NULL,
    FOREIGN KEY (User_id)
      REFERENCES Users(User_id)
      ON DELETE CASCADE
);

CREATE TABLE Employess (
    employee_id int NOT NULL PRIMARY KEY,
    salary int,
    group_id int NOT NULL,
    FOREIGN KEY (User_id)
      REFERENCES Users(User_id)
      ON DELETE CASCADE


);

CREATE TABLE Patient (
    Patient_id int NOT NULL PRIMARY KEY,
    family_code int NOT NULL,
    emergency_contact varchar(255) NOT NULL,
    relation_to_ec varchar(255) NOT NULL,
    group_id varchar(255) NOT NULL,
    FOREIGN KEY (User_id)
      REFERENCES Users(User_id)
      ON DELETE CASCADE
);

CREATE TABLE Checklist (
    List_id int AUTO_INCREMENT PRIMARY KEY,
    Dates date NOT NULL,
    am_med BOOLEAN NOT NULL,
    pm_med BOOLEAN NOT NULL,
    eve_med BOOLEAN NOT NULL,
    night_med BOOLEAN NOT NULL,
    breakfast BOOLEAN NOT NULL,
    lunch BOOLEAN NOT NULL,
    dinner BOOLEAN NOT NULL,
    FOREIGN KEY (Patient_id)
      REFERENCES Patient(Patient_id)
      ON DELETE CASCADE,
    FOREIGN KEY (employee_id)
      REFERENCES Employess(employee_id)
      ON DELETE CASCADE
);

CREATE TABLE Appointments (
    appt_id INT AUTO_INCREMENT PRIMARY KEY,
    Dates date NOT NULL,
    comment varchar(255) NOT NULL,
    am_med varchar(255) NOT NULL,
    pm_med varchar(255) NOT NULL,
    night_med varchar(255) NOT NULL,
    FOREIGN KEY (Patient_id)
      REFERENCES Patient(Patient_id)
      ON DELETE CASCADE,
    FOREIGN KEY (employee_id)
      REFERENCES Employess(employee_id)
      ON DELETE CASCADE
);
