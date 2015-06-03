SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `vaga`.`korisnici`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vaga`.`korisnici` (
  `id_korisnika` INT UNSIGNED NULL AUTO_INCREMENT ,
  `ime` VARCHAR(45) NOT NULL ,
  `prezime` VARCHAR(85) NOT NULL ,
  `pol` ENUM('Male','Female') NOT NULL ,
  `visina` DECIMAL(3,2) NOT NULL ,
  `lozinka` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`id_korisnika`) ,
  UNIQUE INDEX `id_korisnika_UNIQUE` (`id_korisnika` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vaga`.`merenja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vaga`.`merenja` (
  `id_merenja` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `tezina` DECIMAL(3,2) NOT NULL ,
  `masti` DECIMAL(3,2) NULL ,
  `misici` DECIMAL(3,2) NULL ,
  `voda` DECIMAL(3,2) NULL ,
  `kosti` DECIMAL(3,2) NULL ,
  `bazalni_indeks` INT NULL ,
  `aktivni_indeks` INT NULL ,
  `datum` DATETIME NULL ,
  `id_korisnika` INT NOT NULL ,
  PRIMARY KEY (`id_merenja`) ,
  UNIQUE INDEX `id_merenja_UNIQUE` (`id_merenja` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
