CREATE TABLE ft_table
(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
login CHAR(8) NOT NULL DEFULT `toto`, 
`group` ENUM('staff', 'student', 'other') NOT NULL, 
creation_date DATE NOT NULL
);
