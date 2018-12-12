CREATE DATABASE IF NOT EXISTS schemaRecords;
USE schemaRecords;
CREATE USER 'jordan';
SET PASSWORD FOR 'jordan'@localhost = PASSWORD('jordan123');

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON schemaRecords.* TO jordan@'localhost';

CREATE TABLE Users(id INT AUTO_INCREMENT,firstname VARCHAR(32),
			lastname VARCHAR(32),password VARCHAR(32) NOT NULL,telephone VARCHAR(32),
			email VARCHAR(32) NOT NULL,date_joined DATE, PRIMARY KEY(id));

CREATE TABLE Jobs(id INT AUTO_INCREMENT,job_title VARCHAR(32),
			job_description VARCHAR(32),category VARCHAR(32),company_name VARCHAR(32),
			company_location VARCHAR(32),date_posted DATE, PRIMARY KEY(id));

CREATE TABLE Jobs_Applied_For(id INT AUTO_INCREMENT,job_id INT,
			user_id INT,date_applied DATE, PRIMARY KEY(id));
			


