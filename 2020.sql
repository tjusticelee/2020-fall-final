

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
    Role_id int FOREIGN KEY REFERENCES Role(Role_id)
);

CREATE TABLE Role (
    Role_id int NOT NULL PRIMARY KEY,
    name varchar(255) NOT NULL,
    access_lvl varchar(255) NOT NULL,
    User_id int FOREIGN KEY REFERENCES Users(Users_id)
);

CREATE TABLE Employess (
    employee_id int NOT NULL PRIMARY KEY,
    salary int,
    group_id int NOT NULL,
    User_id int FOREIGN KEY REFERENCES Users(Users_id)

);

CREATE TABLE Patient (
    Patient_id int NOT NULL PRIMARY KEY,
    family_code varchar(255) NOT NULL,
    emergency_contact varchar(255) NOT NULL,
    relation_to_ec varchar(255) NOT NULL,
    group_id varchar(255) NOT NULL,
    User_id int FOREIGN KEY REFERENCES Users(Users_id)
);

CREATE TABLE Checklist (
    List_id int NOT NULL PRIMARY KEY,
    Dates date,
    am_med varchar(255) NOT NULL,
    pm_med varchar(255) NOT NULL,
    eve_med varchar(255) NOT NULL,
    night_med varchar(255) NOT NULL,
    breakfast varchar(255) NOT NULL,
    lunch varchar(255) NOT NULL,
    dinner varchar(255) NOT NULL,
    Patient_id int FOREIGN KEY REFERENCES Patient(Patient_id),
    employee_id int FOREIGN KEY REFERENCES Employess(employee_id)
);

CREATE TABLE Appointments (
    Dates date,
    comment varchar(255) NOT NULL,
    am_med varchar(255) NOT NULL,
    pm_med varchar(255) NOT NULL,
    night_med varchar(255) NOT NULL,
    Patient_id int FOREIGN KEY REFERENCES Patient(Patient_id),
    employee_id int FOREIGN KEY REFERENCES Employess(employee_id)
);
