ALTER TABLE
	`usuarios` DROP FOREIGN KEY `fk_usu_id_foto`,
	DROP INDEX `fk_usuarios_1_idx`,
	CHANGE COLUMN `usu_id_foto` `usu_foto_perfil` TEXT NULL DEFAULT NULL
AFTER
	`usu_nome`;

DROP TABLE files;