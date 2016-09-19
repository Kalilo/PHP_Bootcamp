USE db_khansman;
SET autocommit=0 ; source base_student.sql ; COMMIT ;
CREATE TABLE ft_table(id INT PRIMARY KEY AUTO_INCREMENT, login CHAR(8) NOT NULL DEFULT 'toto', kind ENUM('staff', 'student', 'other') NOT NULL, creation_date DATE NOT NULL);
