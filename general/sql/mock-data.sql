INSERT INTO role (name, access_lvl)
VALUES ('admin', 1),
      ('supervisor', 2),
      ('doctor', 3),
      ('caretaker', 4),
      ('patient', 5),
      ('family', 6);

INSERT INTO users (firstName, lastName, email, phone, password, DOB, role_id)
VALUES ('Big', 'Cheese', 'bigcheese@admin.com', 8675309, 'qwerty', 1999-01-01, 1),
      ('Shady', 'Supervisor', 'shady@super.com', 1234567, 'asdfg', 1776-07-07, 2),
      ('Dr', 'Doc', 'doc@tor.com', 2345678, 'ytrewq', 1777-08-08, 3),
      ('Care', 'giver', 'care@giver.com', 3456789, 'gfdsa', 1778-09-09, 4),
      ('mother', 'thresa', 'mother@gmail.com', 5679090, 'mother', 1000-10-2, 4),
      ('Chuck', 'Norris', 'norris@chuck.com', 9990505, 'norris', 1774-03-01, 5),
      ('Sandy', 'Cheeks', 'sandy@cheeks.com', 3495588, 'bikini', 1676-12-12, 5),
      ('Bruce', 'Lee', 'brucelee@lee.com', 8008135, 'dragon', 1300-01-17, 6),
      ('sponge', 'bob', 'sponge@bob.com', 1134000, 'bottom', 1210-05-05, 6);

INSERT INTO patient (patient_id, family_code, emergency_contact, relation_to_ec, group_id)
VALUES (5, 6969, 'Norris family', 'Father', 1),
      (6, 1337, 'BB family', 'Homie', 1);

INSERT INTO employees (employee_id, salary)
VALUES (1, 69000),
      (2,72000),
      (3,1),
      (4,9001),
      (5,10000000);

INSERT INTO checklist (patient_id, employee_id, dates, am_med, pm_med, eve_med, breakfast,
                      lunch, dinner)
VALUES (5, 4, 2020-11-09, 1, 1, 1, 1, 1, 1),
      (6, 5, CURDATE(), 0, 0, 0, 0, 0, 0);

INSERT INTO appointments (patient_id, employee_id, app_dates, comment, am_med, pm_med, night_med)
VALUES (5, 3, 2020-11-09, "He aight", 'limpurt root', 'strength pot', 'xanax'),
      (5, 3, CURDATE(), "He good", 'plant', 'chocolate bar', 'money');
