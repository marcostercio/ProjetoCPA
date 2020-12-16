-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema projetocpa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetocpa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetocpa` DEFAULT CHARACTER SET utf8mb4 ;
USE `projetocpa` ;

-- -----------------------------------------------------
-- Table `projetocpa`.`dimensao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`dimensao` (
  `cod_dimensao` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NULL DEFAULT NULL,
  `cod_usuario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_dimensao`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`pergunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`pergunta` (
  `cod_pergunta` INT(11) NOT NULL AUTO_INCREMENT,
  `pergunta` VARCHAR(200) NULL DEFAULT NULL,
  `cod_dimensao` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_pergunta`),
  INDEX `cod_dimensao` USING BTREE (`cod_dimensao`) VISIBLE,
  CONSTRAINT `pergunta_ibfk_1`
    FOREIGN KEY (`cod_dimensao`)
    REFERENCES `projetocpa`.`dimensao` (`cod_dimensao`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`alternativa_resposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`alternativa_resposta` (
  `cod_alternativa_resposta` INT(10) NOT NULL AUTO_INCREMENT,
  `alternativa_resposta` VARCHAR(10) NOT NULL,
  `descrição` VARCHAR(200) NOT NULL,
  `cod_pergunta` INT(11) NOT NULL,
  PRIMARY KEY (`cod_alternativa_resposta`),
  INDEX `fk_alternativa_resposta_pergunta1_idx` (`cod_pergunta` ASC) VISIBLE,
  CONSTRAINT `fk_alternativa_resposta_pergunta1`
    FOREIGN KEY (`cod_pergunta`)
    REFERENCES `projetocpa`.`pergunta` (`cod_pergunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`perfil` (
  `descrição` VARCHAR(60) NULL DEFAULT NULL,
  `cod_perfil` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_perfil` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_perfil`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`tipo_questionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`tipo_questionario` (
  `cod_tipo_questionario` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_questionario` VARCHAR(20) NULL DEFAULT NULL,
  `descrição` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_tipo_questionario`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`questionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`questionario` (
  `cod_questionario` INT(11) NOT NULL AUTO_INCREMENT,
  `data_cadastramento` DATETIME NULL DEFAULT NULL,
  `data_encerramento` DATETIME NULL DEFAULT NULL,
  `descrição` VARCHAR(200) NULL DEFAULT NULL,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `cod_tipo_questionario` INT(11) NULL DEFAULT NULL,
  `data_disponibilidade` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`cod_questionario`),
  INDEX `cod_tipo_questionario` (`cod_tipo_questionario` ASC) VISIBLE,
  CONSTRAINT `questionario_ibfk_1`
    FOREIGN KEY (`cod_tipo_questionario`)
    REFERENCES `projetocpa`.`tipo_questionario` (`cod_tipo_questionario`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`resposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`resposta` (
  `cod_resposta` INT(10) NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `cod_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`cod_resposta`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`usuario` (
  `cod_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(60) NULL DEFAULT NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  `sobrenome` VARCHAR(100) NULL DEFAULT NULL,
  `senha` VARCHAR(80) NOT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `cod_perfil` INT(11) NULL DEFAULT NULL,
  `status_prova` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`cod_usuario`),
  INDEX `cod_perfil` (`cod_perfil` ASC) VISIBLE,
  CONSTRAINT `usuario_ibfk_1`
    FOREIGN KEY (`cod_perfil`)
    REFERENCES `projetocpa`.`perfil` (`cod_perfil`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetocpa`.`pergunta_questionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetocpa`.`pergunta_questionario` (
  `cod_pergunta` INT(11) NOT NULL,
  `cod_questionario` INT(11) NOT NULL,
  `cod_resposta_correta` INT(10) NOT NULL,
  INDEX `fk_pergunta_has_questionario_questionario1_idx` (`cod_questionario` ASC) VISIBLE,
  INDEX `fk_pergunta_has_questionario_pergunta1_idx` (`cod_pergunta` ASC) VISIBLE,
  INDEX `fk_pergunta_questionario_resposta1_idx` (`cod_resposta_correta` ASC) VISIBLE,
  CONSTRAINT `fk_pergunta_has_questionario_pergunta1`
    FOREIGN KEY (`cod_pergunta`)
    REFERENCES `projetocpa`.`pergunta` (`cod_pergunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pergunta_has_questionario_questionario1`
    FOREIGN KEY (`cod_questionario`)
    REFERENCES `projetocpa`.`questionario` (`cod_questionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pergunta_questionario_resposta1`
    FOREIGN KEY (`cod_resposta_correta`)
    REFERENCES `projetocpa`.`resposta` (`cod_resposta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
