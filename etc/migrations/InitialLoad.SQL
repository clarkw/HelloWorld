/*
Created: 8/20/2014
Modified: 8/20/2014
Model: MySQL 5.1
Database: MySQL 5.1
*/

-- Create tables section -------------------------------------------------

-- Table person

CREATE TABLE person
(
  id Int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name Varchar(100) NOT NULL,
  last_name Varchar(100) NOT NULL,
 PRIMARY KEY (id)
)
;

-- Table location

CREATE TABLE location
(
  id Int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  person_id Int(11) UNSIGNED NOT NULL,
  address1 Varchar(100) NOT NULL,
  address2 Varchar(100),
  city Varchar(100) NOT NULL,
  state Varchar(2) NOT NULL,
  zip Varchar(10) NOT NULL,
  country Varchar(5) NOT NULL,
 PRIMARY KEY (id)
)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE location ADD CONSTRAINT person_location FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;


