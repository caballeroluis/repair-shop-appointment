-- MySQL Script generated by MySQL Workbench
-- 05/31/16 21:39:37
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema web
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `web` ;

-- -----------------------------------------------------
-- Schema web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `web` DEFAULT CHARACTER SET utf8 ;
USE `web` ;

-- -----------------------------------------------------
-- Table `web`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`cliente` ;

CREATE TABLE IF NOT EXISTS `web`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido1` VARCHAR(45) NULL,
  `apellido2` VARCHAR(45) NULL,
  `telefono` INT NULL,
  `codigo_postal` INT NULL,
  `email` VARCHAR(128) NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `password` VARCHAR(255) NULL COMMENT 'encriptada',
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `imagen` VARCHAR(255) NULL,
  `codigo_activacion` VARCHAR(255) NULL COMMENT 'codigo aleatoreo generado con los datos personales por semilla Se envia al cliente por correo para que active su cuenta',
  `activado` TINYINT(1) NULL DEFAULT 0 COMMENT 'cuenta activa',
  `username` VARCHAR(128) NULL,
  `observaciones` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`estado` ;

CREATE TABLE IF NOT EXISTS `web`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(255) NULL,
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `observaciones` VARCHAR(255) NULL,
  `informacion` VARCHAR(255) NULL COMMENT 'info sobre el estado que se le dara al cliente',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`cita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`cita` ;

CREATE TABLE IF NOT EXISTS `web`.`cita` (
  `fecha_cita` DATETIME NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `fecha_cal_recogida` DATETIME NULL COMMENT 'fecha de recogida estimada calculada y mostrada al usuario',
  `fecha_gusto_recogida` DATETIME NULL COMMENT 'momento en el que le gustaria recoger al usuario',
  `precio_cal` INT NULL COMMENT 'precio que se le dio al cliente al calcular la cita',
  `observaciones` VARCHAR(255) NULL COMMENT 'campo opcional para describir la bici o bicis que traiga el usuario',
  `estado_id` INT NOT NULL DEFAULT 1 COMMENT 'estado de la reparacion',
  `cliente_id` INT NOT NULL DEFAULT 1,
  `id` INT NOT NULL AUTO_INCREMENT,
  `prioridad` INT NULL,
  INDEX `fk_cita_estado1_idx` (`estado_id` ASC),
  INDEX `fk_cita_cliente1_idx` (`cliente_id` ASC),
  UNIQUE INDEX `fecha_cita_UNIQUE` (`fecha_cita` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cita_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `web`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `web`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '						';


-- -----------------------------------------------------
-- Table `web`.`marca_pieza`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`marca_pieza` ;

CREATE TABLE IF NOT EXISTS `web`.`marca_pieza` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `imagen` VARCHAR(255) NULL,
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `observaciones` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB
COMMENT = '		';


-- -----------------------------------------------------
-- Table `web`.`pieza`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`pieza` ;

CREATE TABLE IF NOT EXISTS `web`.`pieza` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `precio` INT NULL,
  `precio_instalar` INT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `marca_pieza_id` INT NULL,
  `imagen` VARCHAR(255) NULL,
  `observaciones` VARCHAR(255) NULL,
  `minutos_instalacion` INT NULL COMMENT 'campo por si acaso',
  `informacion` VARCHAR(255) NULL COMMENT 'info sobre la pieza que se le mostrara al cliente',
  PRIMARY KEY (`id`),
  INDEX `fk_pieza_marca_pieza1_idx` (`marca_pieza_id` ASC),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC),
  CONSTRAINT `fk_pieza_marca_pieza1`
    FOREIGN KEY (`marca_pieza_id`)
    REFERENCES `web`.`marca_pieza` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '				';


-- -----------------------------------------------------
-- Table `web`.`mano`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`mano` ;

CREATE TABLE IF NOT EXISTS `web`.`mano` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `coste` INT NULL,
  `minutos_duracion` INT NULL,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `imagen` VARCHAR(255) NULL,
  `observaciones` VARCHAR(255) NULL,
  `informacion` VARCHAR(255) NULL COMMENT 'info sobre la mano de obra que se le mostrara al cliente',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`otro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`otro` ;

CREATE TABLE IF NOT EXISTS `web`.`otro` (
  `nombre` VARCHAR(45) NULL,
  `valor` VARCHAR(255) NULL COMMENT 'por ejemplo para guardar el iva actual',
  `vivo` TINYINT(1) NULL DEFAULT 1,
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`handicap`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`handicap` ;

CREATE TABLE IF NOT EXISTS `web`.`handicap` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'una cita puede tener varios handicaps La misma cantidad de handicaps que de manos de obra',
  `nombre` VARCHAR(45) NULL,
  `recargo` INT NULL,
  `minutos_duracion` INT NULL COMMENT 'en minutos',
  `imagen` VARCHAR(255) NULL,
  `vivo` TINYINT(1) NULL DEFAULT 1 COMMENT 'campo que dice si esta no borrado o borrado el registro',
  `fecha_creacion` DATETIME NULL,
  `fecha_modificacion` DATETIME NULL,
  `observaciones` VARCHAR(255) NULL,
  `informacion` VARCHAR(255) NULL COMMENT 'informacion sobre el handicap que se le dara al cliente',
  `mano_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC),
  INDEX `fk_handicap_mano1_idx` (`mano_id` ASC),
  CONSTRAINT `fk_handicap_mano1`
    FOREIGN KEY (`mano_id`)
    REFERENCES `web`.`mano` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`cita_has_pieza`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`cita_has_pieza` ;

CREATE TABLE IF NOT EXISTS `web`.`cita_has_pieza` (
  `cita_id` INT NOT NULL,
  `pieza_id` INT NOT NULL,
  `cantidad` INT NULL DEFAULT 1,
  PRIMARY KEY (`cita_id`, `pieza_id`),
  INDEX `fk_cita_has_pieza_pieza1_idx` (`pieza_id` ASC),
  INDEX `fk_cita_has_pieza_cita1_idx` (`cita_id` ASC),
  CONSTRAINT `fk_cita_has_pieza_cita1`
    FOREIGN KEY (`cita_id`)
    REFERENCES `web`.`cita` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_has_pieza_pieza1`
    FOREIGN KEY (`pieza_id`)
    REFERENCES `web`.`pieza` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`cita_has_mano`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `web`.`cita_has_mano` ;

CREATE TABLE IF NOT EXISTS `web`.`cita_has_mano` (
  `cita_id` INT NOT NULL,
  `mano_id` INT NOT NULL,
  `handicap_id` INT NOT NULL,
  PRIMARY KEY (`cita_id`, `mano_id`),
  INDEX `fk_cita_has_mano_mano1_idx` (`mano_id` ASC),
  INDEX `fk_cita_has_mano_cita1_idx` (`cita_id` ASC),
  INDEX `fk_cita_has_mano_handicap1_idx` (`handicap_id` ASC),
  CONSTRAINT `fk_cita_has_mano_cita1`
    FOREIGN KEY (`cita_id`)
    REFERENCES `web`.`cita` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_has_mano_mano1`
    FOREIGN KEY (`mano_id`)
    REFERENCES `web`.`mano` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_has_mano_handicap1`
    FOREIGN KEY (`handicap_id`)
    REFERENCES `web`.`handicap` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido1`, `apellido2`, `telefono`, `codigo_postal`, `email`, `fecha_creacion`, `fecha_modificacion`, `password`, `vivo`, `imagen`, `codigo_activacion`, `activado`, `username`, `observaciones`) VALUES
(2, 'luis', '', '', 913333333, 28033, 'luis@luis.es', '2016-01-10 00:00:00', '2016-01-10 00:00:00', 'e0f6027174679fa6707768654fe17896072953a44d72def1c4b6cd015575338938757090db978df3ff79187ad411f827eb9e90e169ed8d26a1f64c2c7e40389c', 1, '', 'asdfasdf', 0, 'luis', ''),
(1, 'admin', '', '', 913333333, 28033, 'admin@admin.es', '2016-01-10 00:00:00', '2016-01-10 00:00:00', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, '', 'adminadmin', 0, 'admin', 'nunca modificar el username admin');



--
-- Volcado de datos para la tabla `otro`
--

INSERT INTO `otro` (`nombre`, `valor`, `vivo`, `fecha_creacion`, `fecha_modificacion`, `id`) VALUES
('iva', 21, 1, '2016-01-10 00:00:00', '2016-01-10 00:00:00', 1),
('terminos',
'Términos y condiciones:<br />Pendiente de redactar los términos y condiciones del servicio.<br />Por favor, consulte con el administrador. Administrador, consulte la tabla otros para editar este mensaje.',
1, '2016-01-10 00:00:00', '2016-01-10 00:00:00', 2),
('lopd',
'LOPD. Administrador, por favor consulte la tabla otros para editar este mensaje y redactar el aviso de la protección de datos.',
1, '2016-01-10 00:00:00', '2016-01-10 00:00:00', 3);

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'desatendida');