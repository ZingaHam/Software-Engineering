-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema site_data
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema site_data
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `site_data` DEFAULT CHARACTER SET utf8mb3 ;
USE `site_data` ;

-- -----------------------------------------------------
-- Table `site_data`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_data`.`course` (
  `course_num` INT NOT NULL,
  `professor` INT NOT NULL,
  `course_name` VARCHAR(45) NOT NULL,
  `course_desc` BLOB NULL DEFAULT NULL,
  `coursecol` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`course_num`),
  UNIQUE INDEX `course_name_UNIQUE` (`course_name` ASC) VISIBLE,
  INDEX `professor_idx` (`professor` ASC) VISIBLE,
  CONSTRAINT `professor`
    FOREIGN KEY (`professor`)
    REFERENCES `site_data`.`users` (`userID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `site_data`.`documents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_data`.`documents` (
  `docID` INT NOT NULL,
  `docName` VARCHAR(45) NOT NULL,
  `docExt` ENUM('.txt', '.doc', '.docx', '.ppt', '.pptx', '.py', '.css', '.pdf') NOT NULL DEFAULT '.txt',
  `contents` BLOB NOT NULL,
  `ownerID` INT NOT NULL,
  `timeUploaded` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`docID`),
  UNIQUE INDEX `docID_UNIQUE` (`docID` ASC) VISIBLE,
  INDEX `userID_idx` (`ownerID` ASC) VISIBLE,
  CONSTRAINT `userID`
    FOREIGN KEY (`ownerID`)
    REFERENCES `site_data`.`users` (`userID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `site_data`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_data`.`user` (
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `time_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `full_name` VARCHAR(90) GENERATED ALWAYS AS (concat(`first_name`,_utf8mb3' ',`last_name`)) VIRTUAL,
  `type` ENUM('student', 'professor', 'administrator') NOT NULL,
  `bio` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE INDEX `userID_UNIQUE` (`userID` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 10002
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `site_data`.`enrolled`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_data`.`enrolled` (
  `enrollment_id` VARCHAR(9) GENERATED ALWAYS AS (concat(`course_id`,_utf8mb4'-',`student_id`)) VIRTUAL,
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  UNIQUE INDEX `enrollment_id_UNIQUE` (`enrollment_id` ASC) VISIBLE,
  INDEX `student_id_idx` (`student_id` ASC) VISIBLE,
  INDEX `course_id_idx` (`course_id` ASC) VISIBLE,
  CONSTRAINT `course_id`
    FOREIGN KEY (`course_id`)
    REFERENCES `site_data`.`course` (`course_num`),
  CONSTRAINT `student_id`
    FOREIGN KEY (`student_id`)
    REFERENCES `site_data`.`user` (`userID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
