DROP SCHEMA IF EXISTS `SOKOSHOP`;
CREATE SCHEMA `SOKOSHOP`;
USE `SOKOSHOP`;

CREATE TABLE `PRODUCT`(
    ID INT PRIMARY KEY,-- 2 
    FNAME VARCHAR(100),
    PRICE INT,
    NUM INT,
    FUNDS INT,
    IMAGE_URL TEXT,
    DESCR TEXT
);

CREATE TABLE `ORDER`(
    ID_ORDER INT PRIMARY KEY,
    DTIME DATE,
    TOTAL INT
);

CREATE TABLE `PRODUCT_IN_ORDER`(
  PID INT,
  ORDER_ID INT,
  QUANTITY INT,
  NOTE TEXT,
  PRIMARY KEY(PID, ORDER_ID),
  FOREIGN KEY (PID) REFERENCES `PRODUCT`(ID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (ORDER_ID) REFERENCES `ORDER`(ID_ORDER) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `PRODUCT_CATEGORY`(
  PID INT NOT NULL,
  CATEGORY VARCHAR(100) NOT NULL,
  PRIMARY KEY(PID, CATEGORY),
  FOREIGN KEY (PID) REFERENCES `PRODUCT`(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `CUSTOMMER`(
  ID INT PRIMARY KEY,
  FULLNAME TEXT,
  SDT TEXT,
  COMMENT TEXT
);
CREATE TABLE `COST`(
    ID INT PRIMARY KEY,
    DTIME DATE,
    CATEGORY VARCHAR(100),
    PRICE INT,
    QUANTITY INT
);
