SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ContactsManager
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ContactsManager` ;

-- -----------------------------------------------------
-- Schema ContactsManager
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ContactsManager` DEFAULT CHARACTER SET utf8 ;
USE `ContactsManager` ;

-- -----------------------------------------------------
-- Table `ContactsManager`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ContactsManager`.`Users` ;

CREATE TABLE IF NOT EXISTS `ContactsManager`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `create_at` DATETIME NULL,
  `edit_at` DATETIME NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ContactsManager`.`Contacts_list`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ContactsManager`.`Contacts_list` ;

CREATE TABLE IF NOT EXISTS `ContactsManager`.`Contacts_list` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `list_name` VARCHAR(45) NULL,
  `create_at` DATETIME NULL,
  `edit_at` DATETIME NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`, `user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ContactsManager`.`Contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ContactsManager`.`Contacts` ;

CREATE TABLE IF NOT EXISTS `ContactsManager`.`Contacts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `list_id` INT NOT NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `home` VARCHAR(45) NULL,
  `work` VARCHAR(45) NULL,
  `cell` VARCHAR(45) NULL,
  `first_adress` VARCHAR(45) NULL,
  `second_adress` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `state` VARCHAR(45) NULL,
  `zip` VARCHAR(45) NULL,
  `country` VARCHAR(45) NULL,
  `birth_date` VARCHAR(45) NULL,
  `create_at` DATETIME NULL,
  `edit_at` DATETIME NULL,
  `status` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`, `user_id`, `list_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
