-- Database: practica

-- DROP DATABASE practica;

CREATE DATABASE practica
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;


--DROP TABLE public.employee;

CREATE TABLE public.employee (
  id        serial NOT NULL PRIMARY KEY,
  emp_name  char(100),
  salary    char(100),
  gender    char(100),
  city      char(100),
  email     char(100)
) WITH (
    OIDS = FALSE
  );

ALTER TABLE public.employee
  OWNER TO postgres;



  INSERT INTO employee (id, emp_name, salary, gender, city, email) VALUES
  (1, 'Yogesh', '30000', 'male', 'Bhopal', 'yogesh@makitweb.com'),
  (3, 'Vijay', '35000', 'male', 'Jaipur', 'vijayec@yahoo.com'),
  (5, 'Sonarika', '50000', 'female', 'Mumbai', 'bsonarika@gmail.com'),
  (6, 'Jitentendre', '48000', 'male', 'Bhopal', 'jiten94@yahoo.com'),
  (7, 'Aditya', '36000', 'male', 'Pune', 'aditya@gmail.com'),
  (8, 'Anil', '32000', 'male', 'Indore', 'anilsingh@gmail.com'),
  (9, 'Sunil', '48000', 'male', 'Nagpur', 'sunil1993@gmail.com'),
  (10, 'Akilesh', '52000', 'male', 'Surat', 'akileshsahu@yahoo.com'),
  (11, 'Raj', '48000', 'male', 'Ahmedabad', 'rajsingh@gmail.com'),
  (12, 'Mayank', '54000', 'male', 'Ghaziabad', 'mpatidar@gmail.com'),
  (13, 'Shalu', '43000', 'female', 'Bhopal', 'gshalu521@gmail.com'),
  (14, 'Ravi', '32000', 'male', 'Ludhiana', 'ravisharma21@yahoo.com'),
  (15, 'Shruti', '45000', 'female', 'Delhi', 'shruti@gmail.com'),
  (16, 'Rishi', '38000', 'male', 'Mumbai', 'rishi121@gmail.com'),
  (17, 'Rohan', '47000', 'male', 'Jaipur', 'rohansingh@gmail.com'),
  (18, 'Priya', '28000', 'female', 'Indore', 'priya1992@gmail.com'),
  (19, 'Rakesh', '34000', 'male', 'bhopal', 'rakesh@yahoo.com'),
  (20, 'Vinay', '34000', 'male', 'Delhi', 'vinaysingh@gmail.com'),
  (21, 'Tanu', '41000', 'female', 'pune', 'Tanu@gmail.com'),
  (22, 'Ajay', '28000', 'male', 'bhopal', 'ajay93@gmail.com'),
  (23, 'Nikhil', '46000', 'male', 'pune', 'nikhil@gmail.com'),
  (24, 'Arav', '28000', 'male', 'Nagpur', 'aravsingh@yahoo.com'),
  (25, 'Madhu', '32000', 'female', 'Rajkot', 'madhu@gmail.com'),
  (26, 'Sagar', '44000', 'male', 'Rajkot', 'sagar@gmail.com'),
  (27, 'Anju', '30000', 'female', 'Ranchi', 'anju@gmail.com'),
  (28, 'Rajat', '28000', 'male', 'kota', 'rajat@gmail.com'),
  (29, 'Anjali', '32000', 'female', 'Gwalior', 'anjali@gmail.com'),
  (30, 'Saloni', '32000', 'female', 'Nashik', 'saloni@gmail.com'),
  (31, 'Mayur', '28000', 'male', 'Bhopal', 'mayur@gmail.com'),
  (32, 'Pankaj', '32000', 'male', 'Indore', 'pankaj@gmail.com'),
  (33, 'Hrithik', '35000', 'male', 'Jaipur', 'hrithik@gmail.com'),
  (34, 'LRas', '37000', 'female', 'Pune', 'vinaysingh@gmail.com'),
  (35, 'Prtow', '23000', 'male', 'Rajkot', 'gshalu521@gmail.com'),
  (36, 'Karjo', '53000', 'female', 'Pune', 'nikhil@gmail.com');
