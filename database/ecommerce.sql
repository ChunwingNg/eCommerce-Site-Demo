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
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `userN` VARCHAR(45) NOT NULL,
  `passW` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`address` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`address` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `line1` VARCHAR(45) NOT NULL,
  `line2` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `zip` INT(11) NOT NULL,
  `phone` INT(11) NOT NULL,
  `fk_address_user` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC),
  INDEX `fk_address_user_idx` (`fk_address_user` ASC),
  CONSTRAINT `fk_address_user`
    FOREIGN KEY (`fk_address_user`)
    REFERENCES `ecommerce`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`card`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`card` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`card` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `expMonth` INT(2) NOT NULL,
  `expYear` INT(2) NOT NULL,
  `number` VARCHAR(45) NOT NULL,
  `cvv` INT(11) NOT NULL,
  `fk_card_user` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_card_user_idx` (`fk_card_user` ASC),
  CONSTRAINT `fk_card_user`
    FOREIGN KEY (`fk_card_user`)
    REFERENCES `ecommerce`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`catalog_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`catalog_item` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`catalog_item` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `price` FLOAT NOT NULL,
  `quantity` INT(11) NOT NULL,
  `desc` VARCHAR(45) NOT NULL,
  `image_link` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ID_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecommerce`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`orders` ;

CREATE TABLE IF NOT EXISTS `ecommerce`.`orders` (
  `id` INT(11) NOT NULL,
  `fk_orders_user` INT(11) NOT NULL,
  `fk_orders_card` INT(11) NOT NULL,
  `fk_orders_address` INT(11) NOT NULL,
  `ordertotal` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_orders_user_idx` (`fk_orders_user` ASC),
  INDEX `fk_orders_card_idx` (`fk_orders_card` ASC),
  INDEX `fk_orders_address_idx` (`fk_orders_address` ASC),
  CONSTRAINT `fk_orders_user`
    FOREIGN KEY (`fk_orders_user`)
    REFERENCES `ecommerce`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_card`
    FOREIGN KEY (`fk_orders_card`)
    REFERENCES `ecommerce`.`card` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_address`
    FOREIGN KEY (`fk_orders_address`)
    REFERENCES `ecommerce`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
