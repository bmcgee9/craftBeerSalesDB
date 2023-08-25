-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema craftbeerdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema craftbeerdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `craftbeerdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `craftbeerdb` ;

-- -----------------------------------------------------
-- Table `craftbeerdb`.`vendors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `craftbeerdb`.`vendors` (
  `Vendor_code` VARCHAR(255) NOT NULL,
  `Country_of_Origin` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`Vendor_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `craftbeerdb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `craftbeerdb`.`products` (
  `Product_code` INT NOT NULL,
  `Vendor_code` VARCHAR(255) NULL DEFAULT NULL,
  `Name` TEXT NULL DEFAULT NULL,
  `Retail_price` INT NULL DEFAULT NULL,
  `Base_unit` TEXT NULL DEFAULT NULL,
  `Size` TEXT NULL DEFAULT NULL,
  `ABV` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`Product_code`),
  INDEX `Vendor_code` (`Vendor_code` ASC) VISIBLE,
  CONSTRAINT `products_ibfk_1`
    FOREIGN KEY (`Vendor_code`)
    REFERENCES `craftbeerdb`.`vendors` (`Vendor_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `craftbeerdb`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `craftbeerdb`.`transactions` (
  `order_id` INT NOT NULL,
  `Date_and_time_of_unloading` TEXT NULL DEFAULT NULL,
  `Product_code` INT NULL DEFAULT NULL,
  `Amount` INT NULL DEFAULT NULL,
  `Sale_amount` DOUBLE NULL DEFAULT NULL,
  `Profit` DOUBLE NULL DEFAULT NULL,
  `Discount_percentage` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `Product_code` (`Product_code` ASC) VISIBLE,
  CONSTRAINT `transactions_ibfk_1`
    FOREIGN KEY (`Product_code`)
    REFERENCES `craftbeerdb`.`products` (`Product_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
