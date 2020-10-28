-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`user` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`user` (
  `id` INT NOT NULL,
  `userN` VARCHAR(45) NULL,
  `passW` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`card`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`card` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`card` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `exp` DATE NULL,
  `number` INT NULL,
  `cvv` INT NULL,
  `fk_card_user` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_card_user_idx` (`fk_card_user` ASC) VISIBLE,
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_card_user`
    FOREIGN KEY (`fk_card_user`)
    REFERENCES `ecommerce`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`address` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `line1` VARCHAR(45) NULL,
  `apt` VARCHAR(45) NULL,
  `line2` VARCHAR(45) NULL,
  `phone` INT NULL,
  `fk_address_user` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_address_user_idx` (`fk_address_user` ASC) VISIBLE,
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_address_user`
    FOREIGN KEY (`fk_address_user`)
    REFERENCES `ecommerce`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`catalog_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`catalog_item` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`catalog_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `price` FLOAT NULL,
  `quantity` INT NULL,
  `desc` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`catagory_name`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`catagory_name` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`catagory_name` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`categories` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`categories` (
  `fk_cat_catalog` INT NOT NULL,
  `fk_cat_catname` INT NOT NULL,
  INDEX `fk_cat_catalog_idx` (`fk_cat_catalog` ASC) VISIBLE,
  INDEX `fk_cat_catname_idx` (`fk_cat_catname` ASC) VISIBLE,
  CONSTRAINT `fk_cat_catalog`
    FOREIGN KEY (`fk_cat_catalog`)
    REFERENCES `ecommerce`.`catalog_item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_catname`
    FOREIGN KEY (`fk_cat_catname`)
    REFERENCES `ecommerce`.`catagory_name` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
