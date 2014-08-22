/*
Created: 8/20/2014
Modified: 8/21/2014
Model: MySQL 5.1
Database: MySQL 5.1
*/

-- Create tables section -------------------------------------------------
-- Table account
CREATE TABLE account
(
  id Int(11) NOT NULL AUTO_INCREMENT,
  person_id Int(11) UNSIGNED NOT NULL,
  created Datetime NOT NULL,
 PRIMARY KEY (id)
)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE account ADD CONSTRAINT person_account FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

