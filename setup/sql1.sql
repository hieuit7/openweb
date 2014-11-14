SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `rosa` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `rosa` ;

-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_group` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_group` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `permission` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_permission` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_permission` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `permission` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id`
    FOREIGN KEY (`id`)
    REFERENCES `rosa`.`rs_sys_group` (`permission`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
