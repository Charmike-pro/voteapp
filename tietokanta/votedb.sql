-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema votedb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema votedb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `votedb` DEFAULT CHARACTER SET utf8 ;
USE `votedb` ;

-- -----------------------------------------------------
-- Table `votedb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `votedb`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `pwd` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `votedb`.`poll`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `votedb`.`poll` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic` MEDIUMTEXT NOT NULL,
  `start` DATETIME NULL,
  `end` DATETIME NULL,
  `user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_poll_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_poll_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `votedb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `votedb`.`option`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `votedb`.`option` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `votes` INT NOT NULL DEFAULT 0,
  `poll_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_option_poll1_idx` (`poll_id` ASC),
  CONSTRAINT `fk_option_poll1`
    FOREIGN KEY (`poll_id`)
    REFERENCES `votedb`.`poll` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
