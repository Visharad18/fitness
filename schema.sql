CREATE DATABASE fitness;
USE fitness;
CREATE TABLE users ( 
	user_id INT(6) AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(20) NOT NULL,
	lastname VARCHAR(20) NOT NULL,
	email VARCHAR(50) UNIQUE NOT NULL,
	pass_word VARCHAR(100),
	phone INT(10) UNIQUE,
	image LONGTEXT,
	user_type ENUM ('customer', 'seller', 'admin') DEFAULT 'customer',
	joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE sessions (
	session_id INT(6) PRIMARY KEY AUTO_INCREMENT,
	session_datetime TIMESTAMP ,
	user_id INT(6) REFERENCES users(user_id)
);
CREATE TABLE queries (
	qid INT(6) PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(50),
	questioner_name VARCHAR(40),
	question VARCHAR(300)
);
CREATE TABLE products (
	pid INT(6) PRIMARY KEY AUTO_INCREMENT,
	pname VARCHAR(100),
	seller VARCHAR(50) REFERENCES users(user_id),
	price FLOAT(6,2),
	image LONGTEXT,
	first_available TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);