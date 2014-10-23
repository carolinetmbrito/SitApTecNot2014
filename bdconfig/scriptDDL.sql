SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sitap` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sitap` ;
-- -----------------------------------------------------
-- Database `sitap`
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `sitap`;
-- -----------------------------------------------------
-- Table `sitap`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(100) NULL,
  `senha` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `nome` VARCHAR(45) NULL,
  `dtNascimento` DATE NULL,
  `endereco` VARCHAR(100) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `dtCriacao` DATETIME NULL,
  `dtAtualizacao` DATETIME NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`noticia` (
  `idnoticia` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `texto` TEXT NULL,
  `dtCriacao` DATETIME NULL,
  `dtAtualizacao` DATETIME NULL,
  `idusuario` INT NOT NULL,
  `positivo` INT NULL,
  `negatigo` INT NULL,
  PRIMARY KEY (`idnoticia`),
  UNIQUE INDEX `idnoticia_UNIQUE` (`idnoticia` ASC),
  INDEX `fk_noticia_usuario_idx` (`idusuario` ASC),
  CONSTRAINT `fk_noticia_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sitap`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`comentario` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NULL,
  `dtCriacao` DATETIME NULL,
  `dtAtualizacao` DATETIME NULL,
  `idusuario` INT NOT NULL,
  `idnoticia` INT NOT NULL,
  `positivo` INT NULL,
  `negativo` INT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_comentario_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_comentario_noticia1_idx` (`idnoticia` ASC),
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sitap`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitap`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`categoria_tem_noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`categoria_tem_noticia` (
  `idcategoria` INT NOT NULL,
  `idnoticia` INT NOT NULL,
  PRIMARY KEY (`idcategoria`, `idnoticia`),
  INDEX `fk_categoria_has_noticia_noticia1_idx` (`idnoticia` ASC),
  INDEX `fk_categoria_has_noticia_categoria1_idx` (`idcategoria` ASC),
  CONSTRAINT `fk_categoria_has_noticia_categoria1`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `sitap`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_has_noticia_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitap`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sitap`.`foto` (
  `idfoto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `url` VARCHAR(45) NULL,
  `idnoticia` INT NOT NULL,
  PRIMARY KEY (`idfoto`),
  INDEX `fk_foto_noticia1_idx` (`idnoticia` ASC),
  CONSTRAINT `fk_foto_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitap`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
