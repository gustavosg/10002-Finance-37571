SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `finance_37571` ;
CREATE SCHEMA IF NOT EXISTS `finance_37571` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `finance_37571` ;

-- -----------------------------------------------------
-- Table `categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `categories` ;

CREATE  TABLE IF NOT EXISTS `categories` (
  `id` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sub_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sub_categories` ;

CREATE  TABLE IF NOT EXISTS `sub_categories` (
  `id` INT NOT NULL ,
  `category_id` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sub_categories_categories` (`category_id` ASC) ,
  CONSTRAINT `fk_sub_categories_categories`
    FOREIGN KEY (`category_id` )
    REFERENCES `categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budgets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `budgets` ;

CREATE  TABLE IF NOT EXISTS `budgets` (
  `id` INT NOT NULL ,
  `created` DATETIME NOT NULL COMMENT '	' ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `budget_records`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `budget_records` ;

CREATE  TABLE IF NOT EXISTS `budget_records` (
  `id` INT NOT NULL ,
  `budget_id` INT NOT NULL ,
  `ammount` DECIMAL(6,2) NULL ,
  `sub_category_id` INT NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_budget_records_budgets1` (`budget_id` ASC) ,
  INDEX `fk_budget_records_sub_categories1` (`sub_category_id` ASC) ,
  CONSTRAINT `fk_budget_records_budgets1`
    FOREIGN KEY (`budget_id` )
    REFERENCES `budgets` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_budget_records_sub_categories1`
    FOREIGN KEY (`sub_category_id` )
    REFERENCES `sub_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `accounts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `accounts` ;

CREATE  TABLE IF NOT EXISTS `accounts` (
  `id` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `expenditure`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `expenditure` ;

CREATE  TABLE IF NOT EXISTS `expenditure` (
  `id` INT NOT NULL ,
  `sub_category_id` INT NOT NULL ,
  `account_id` INT NOT NULL ,
  `date` DATETIME NOT NULL ,
  `ammount` DECIMAL(6,2) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  `description` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_expenditure_sub_categories1` (`sub_category_id` ASC) ,
  INDEX `fk_expenditure_accounts1` (`account_id` ASC) ,
  CONSTRAINT `fk_expenditure_sub_categories1`
    FOREIGN KEY (`sub_category_id` )
    REFERENCES `sub_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_expenditure_accounts1`
    FOREIGN KEY (`account_id` )
    REFERENCES `accounts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
