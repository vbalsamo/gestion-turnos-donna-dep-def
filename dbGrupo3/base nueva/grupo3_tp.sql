-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema grupo3_tp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema grupo3_tp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `grupo3_tp` DEFAULT CHARACTER SET utf8mb4 ;
USE `grupo3_tp` ;

-- -----------------------------------------------------
-- Table `grupo3_tp`.`profesional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo3_tp`.`profesional` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(300) NOT NULL,
  `id_tratamientoxProfesional` INT(11) NOT NULL,
  `numero_tel` INT(11) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `grupo3_tp`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo3_tp`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `rol` VARCHAR(100) NOT NULL DEFAULT 'cliente',
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `nombre` VARCHAR(300) NOT NULL,
  `numero_tel` VARCHAR(25) NOT NULL,
  `adeuda` TINYINT(4) NULL DEFAULT NULL,
  `id_profesional_preferido` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cliente_profesional1_idx` (`id_profesional_preferido` ASC) ,
  CONSTRAINT `fk_cliente_profesional1`
    FOREIGN KEY (`id_profesional_preferido`)
    REFERENCES `grupo3_tp`.`profesional` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `grupo3_tp`.`locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo3_tp`.`locacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(400) NOT NULL,
  `direccion` VARCHAR(400) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `grupo3_tp`.`tratamiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo3_tp`.`tratamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(300) NOT NULL,
  `descripcion` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `grupo3_tp`.`tratamientoxprofesional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo3_tp`.`tratamientoxprofesional` (
  `id_tratamiento` INT(11) NOT NULL AUTO_INCREMENT,
  `id_profesional` INT(11) NOT NULL,
  `id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tratamiento_has_profesional_profesional1_idx` (`id_profesional` ASC) ,
  INDEX `fk_tratamiento_has_profesional_tratamiento1_idx` (`id_tratamiento` ASC) ,
  CONSTRAINT `fk_tratamiento_has_profesional_profesional1`
    FOREIGN KEY (`id_profesional`)
    REFERENCES `grupo3_tp`.`profesional` (`id`),
  CONSTRAINT `fk_tratamiento_has_profesional_tratamiento1`
    FOREIGN KEY (`id_tratamiento`)
    REFERENCES `grupo3_tp`.`tratamiento` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `grupo3_tp`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo3_tp`.`turno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_y_hora` DATETIME NOT NULL,
  `proximo` TINYINT(4) NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  `id_locacion` INT(11) NOT NULL,
  `id_profesional` INT(11) NOT NULL,
  `id_tratamiento` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_turno_cliente_idx` (`id_cliente` ASC) ,
  INDEX `fk_turno_locacion1_idx` (`id_locacion` ASC) ,
  INDEX `fk_turno_profesional1_idx` (`id_profesional` ASC) ,
  INDEX `fk_turno_tratamiento1_idx` (`id_tratamiento` ASC) ,
  CONSTRAINT `fk_turno_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `grupo3_tp`.`cliente` (`id`),
  CONSTRAINT `fk_turno_locacion1`
    FOREIGN KEY (`id_locacion`)
    REFERENCES `grupo3_tp`.`locacion` (`id`),
  CONSTRAINT `fk_turno_profesional1`
    FOREIGN KEY (`id_profesional`)
    REFERENCES `grupo3_tp`.`profesional` (`id`),
  CONSTRAINT `fk_turno_tratamiento1`
    FOREIGN KEY (`id_tratamiento`)
    REFERENCES `grupo3_tp`.`tratamiento` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
