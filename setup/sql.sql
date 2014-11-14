SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `rosa` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `rosa` ;

-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_menu` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NULL,
  `link` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idrs_sys_menu_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_themes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_themes` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_themes` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `isuse` INT NOT NULL,
  `type` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_themes_css`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_themes_css` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_themes_css` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NULL,
  `path` VARCHAR(45) NOT NULL,
  `id_themes` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_themes`
    FOREIGN KEY (`id_themes`)
    REFERENCES `rosa`.`rs_sys_themes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_module`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_module` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_module` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `descreption` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_permission` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_permission` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `permission` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_group` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_group` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `permission` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `permission`
    FOREIGN KEY (`permission`)
    REFERENCES `rosa`.`rs_sys_permission` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_user` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `group` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `group`
    FOREIGN KEY (`group`)
    REFERENCES `rosa`.`rs_sys_group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_content_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_content_product` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_content_product` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `time` TIMESTAMP NOT NULL,
  `show` TINYINT(1) NOT NULL,
  `userpost` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `userpost`
    FOREIGN KEY (`userpost`)
    REFERENCES `rosa`.`rs_sys_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rosa`.`rs_sys_themes_javascript`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rosa`.`rs_sys_themes_javascript` ;

CREATE TABLE IF NOT EXISTS `rosa`.`rs_sys_themes_javascript` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `des` VARCHAR(45) NULL,
  `path` VARCHAR(45) NOT NULL,
  `id_themes` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_themes`
    FOREIGN KEY (`id_themes`)
    REFERENCES `rosa`.`rs_sys_themes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
