CREATE SCHEMA `project2` ;

CREATE TABLE `project2`.`evenementen` (
  `idevenementen` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  `dagen` INT NOT NULL,
  `aantal` INT NOT NULL,
  PRIMARY KEY (`idevenementen`),
  UNIQUE INDEX `idevenementen_UNIQUE` (`idevenementen` ASC));
  
  CREATE TABLE `project2`.`gerecht` (
  `idgerecht` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgerecht`),
  UNIQUE INDEX `idgerecht_UNIQUE` (`idgerecht` ASC));
  
  CREATE TABLE `project2`.`gerechtevenement` (
  `idGerechtevenement` INT NOT NULL AUTO_INCREMENT,
  `idevenementen` INT NOT NULL,
  `idgerecht` INT NOT NULL,
  PRIMARY KEY (`idGerechtevenement`),
  UNIQUE INDEX `idGerechtevenement_UNIQUE` (`idGerechtevenement` ASC),
  INDEX `eve_idx` (`idevenementen` ASC),
  INDEX `ger_idx` (`idgerecht` ASC),
  CONSTRAINT `eve`
    FOREIGN KEY (`idevenementen`)
    REFERENCES `project2`.`evenementen` (`idevenementen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ger`
    FOREIGN KEY (`idgerecht`)
    REFERENCES `project2`.`gerecht` (`idgerecht`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
    CREATE TABLE `project2`.`winkel` (
  `idwinkel` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NULL,
  `aantal` INT NULL,
  PRIMARY KEY (`idwinkel`),
  UNIQUE INDEX `idwinkel_UNIQUE` (`idwinkel` ASC));
    
    CREATE TABLE `project2`.`product` (
  `idproduct` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idproduct`),
  UNIQUE INDEX `idproduct_UNIQUE` (`idproduct` ASC));
  
      ALTER TABLE `project2`.`product` 
ADD COLUMN `idwinkel` INT NOT NULL AFTER `aantal`,
ADD INDEX `winkel_idx` (`idwinkel` ASC);
;
ALTER TABLE `project2`.`product` 
ADD CONSTRAINT `winkel`
  FOREIGN KEY (`idwinkel`)
  REFERENCES `project2`.`winkel` (`idwinkel`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  CREATE TABLE `project2`.`gerechtproduct` (
  `idgerechtproduct` INT NOT NULL AUTO_INCREMENT,
  `idgerecht` INT NOT NULL,
  `idproduct` INT NOT NULL,
  `hoeveelheid` INT NOT NULL,
  `Eenheid` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgerechtproduct`),
  UNIQUE INDEX `idgerechtproduct_UNIQUE` (`idgerechtproduct` ASC),
  INDEX `gerechten_idx` (`idgerecht` ASC),
  INDEX `producten_idx` (`idproduct` ASC),
  CONSTRAINT `gerechten`
    FOREIGN KEY (`idgerecht`)
    REFERENCES `project2`.`gerecht` (`idgerecht`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `producten`
    FOREIGN KEY (`idproduct`)
    REFERENCES `project2`.`product` (`idproduct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
    
    INSERT INTO `project2`.`gerecht` (`naam`) VALUES ('pannekoeken');
INSERT INTO `project2`.`gerecht` (`naam`) VALUES ('spaghetti');
INSERT INTO `project2`.`gerecht` (`naam`) VALUES ('lasagne');
INSERT INTO `project2`.`gerecht` (`naam`) VALUES ('brownie');
INSERT INTO `project2`.`gerecht` (`naam`) VALUES ('croque monsieur');
INSERT INTO `project2`.`gerecht` (`naam`) VALUES ('pudding');

INSERT INTO `project2`.`evenementen` (`naam`, `dagen`, `aantal`) VALUES ('picknick', '1', '4');
INSERT INTO `project2`.`evenementen` (`naam`, `dagen`, `aantal`) VALUES ('lunchtime', '2', '10');
INSERT INTO `project2`.`evenementen` (`naam`, `dagen`, `aantal`) VALUES ('desert', '2', '5');

INSERT INTO `project2`.`gerechtevenement` (`idevenementen`, `idgerecht`) VALUES ('2', '2');
INSERT INTO `project2`.`gerechtevenement` (`idevenementen`, `idgerecht`) VALUES ('2', '3');
INSERT INTO `project2`.`gerechtevenement` (`idevenementen`, `idgerecht`) VALUES ('3', '1');
INSERT INTO `project2`.`gerechtevenement` (`idevenementen`, `idgerecht`) VALUES ('3', '4');
INSERT INTO `project2`.`gerechtevenement` (`idevenementen`, `idgerecht`) VALUES ('1', '5');
INSERT INTO `project2`.`gerechtevenement` (`idevenementen`, `idgerecht`) VALUES ('1', '6');

INSERT INTO `project2`.`winkel` (`naam`) VALUES ('aldi');
INSERT INTO `project2`.`winkel` (`naam`) VALUES ('lidl');
INSERT INTO `project2`.`winkel` (`naam`) VALUES ('Delhaize');
INSERT INTO `project2`.`winkel` (`naam`) VALUES ('colruyt');

INSERT INTO `project2`.`product` (`naam`, `aantal`, `idwinkel`) VALUES ('suiker', '1', '3');
INSERT INTO `project2`.`product` (`naam`, `aantal`, `idwinkel`) VALUES ('melk', '2', '4');
INSERT INTO `project2`.`product` (`naam`, `aantal`, `idwinkel`) VALUES ('tomatensaus', '5', '2');
INSERT INTO `project2`.`product` (`naam`, `aantal`, `idwinkel`) VALUES ('suiker', '3', '1');

INSERT INTO `project2`.`gerechtproduct` (`idgerecht`, `idproduct`, `hoeveelheid`, `Eenheid`) VALUES ('1', '4', '2', 'KG');
INSERT INTO `project2`.`gerechtproduct` (`idgerecht`, `idproduct`, `hoeveelheid`, `Eenheid`) VALUES ('1', '2', '3', 'L');
INSERT INTO `project2`.`gerechtproduct` (`idgerecht`, `idproduct`, `hoeveelheid`, `Eenheid`) VALUES ('2', '3', '3', 'L');
INSERT INTO `project2`.`gerechtproduct` (`idgerecht`, `idproduct`, `hoeveelheid`, `Eenheid`) VALUES ('3', '3', '2', 'L');