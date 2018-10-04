/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Leo
 * Created: 04/10/2018
 */

ALTER TABLE `gerirmeusalao_homologacao`.`funcionario` 
ADD COLUMN `status` INT NOT NULL DEFAULT 1 AFTER `salario`;

ALTER TABLE `gerirmeusalao_homologacao`.`produto` 
ADD COLUMN `status` INT NOT NULL DEFAULT 1 AFTER `codEmpresa`;