SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS MCP;
CREATE DATABASE MCP;

USE MCP;

CREATE TABLE Customer(
	custId INT AUTO_INCREMENT,
	title varchar(8),
	fname varchar(40) NOT NULL,
	lname varchar(40) NOT NULL,
	phone varchar(14) NOT NULL DEFAULT 555,
	email varchar(100),
	usrNme varchar (20) NOT NULL UNIQUE,
	pwd varchar (20)NOT NULl,
	pwdHash varchar (200)NOT NULl,
	PRIMARY KEY(custId)
) AUTO_INCREMENT = 1;

/*
CREATE TABLE Details(
	custId varchar(8) NOT NULL,
	usrNme varchar (20) NOT NULL,
	pwd varchar (20)NOT NULl,
	PRIMARY KEY(custId),
	FOREIGN KEY(CustId) REFERENCES Customer(custId)
);

CREATE TABLE CustResAddr(
	custId varchar(8),
	Street varchar(45),
	Suburb varchar(45),
	Postcode char(5) NOT NULL DEFAULT 1001,
	phone varchar(14) NOT NULL DEFAULT 555,
	email varchar(100),
	PRIMARY KEY (custId),
	FOREIGN KEY(CustId) REFERENCES Customer(custId)
);

CREATE TABLE CustDelAddr(
	custId varchar(8) NOT NULL,
	Street varchar(45),
	Suburb varchar(45),
	Postcode char(5),
	deliveryNote varchar(300),
	PRIMARY KEY(custId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);
*/

CREATE TABLE Product (
	stockNum varchar(10) NOT NULL,
	productName varchar(25),
	description varchar(300),
	unitCost decimal(6,2),
	stockQty int(8),
	category varchar(300),
	PRIMARY KEY(stockNum)
);

CREATE TABLE Card (
	custId INT NOT NULL,
	cardNum	char(21) NOT NULL,
	PRIMARY KEY(custId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);

CREATE TABLE Cart (
	custId INT NOT NULL,
	stockNum varchar(10),
	unitCost decimal(6,2),
	qty int(3),
	totalCost decimal(8,2),
	PRIMARY KEY(custId, stockNum)
);

CREATE TABLE Invoice (
	invoiceId INT AUTO_INCREMENT,
	custId INT NOT NULL,
	invoiceDate	timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	fname varchar(40) NOT NULL,
	lname varchar(40) NOT NULL,
	email varchar(100),
	address varchar(45) NOT NULL,
	address2 varchar(45),
	apartType varchar(45),
	Suburb varchar(45) NOT NULL,
	galaxy varchar(45) NOT NULL,
	sSystem varchar(45) NOT NULL,
	Postcode char(5) NOT NULL,
	phone varchar(14) NOT NULL DEFAULT 555,
	deliveryFee decimal(5,2),
	finCost decimal(8,2) NOT NULL,
	PRIMARY KEY (invoiceId, custId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);

CREATE user IF NOT EXISTS 'dbadmin'@'localhost';
GRANT all privileges ON MCP.* TO dbadmin@localhost;
