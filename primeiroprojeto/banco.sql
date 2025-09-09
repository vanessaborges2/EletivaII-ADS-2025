CREATE TABLE IF NOT EXISTS `laravel`.`clientes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NULL,
  `email` VARCHAR(150) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;