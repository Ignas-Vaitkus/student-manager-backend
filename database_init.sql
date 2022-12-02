DROP DATABASE IF EXISTS student_manager;

CREATE DATABASE student_manager DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci;

DROP USER IF EXISTS  'student_manager_user'@'localhost';

CREATE USER 'student_manager_user'@'localhost' IDENTIFIED BY 'student_manager';

GRANT ALL PRIVILEGES ON student_manager.* TO 'student_manager_user'@'localhost';