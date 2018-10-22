/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Leo
 * Created: 04/10/2018
 */

CREATE TABLE `fechamentocaixa` (
  `codFechamentoCaixa` INT NOT NULL AUTO_INCREMENT,
  `data` TIMESTAMP NOT NULL,
  `codEmpresa` INT NOT NULL,
  `codUsuario` INT NOT NULL,
  `status` INT NOT NULL DEFAULT 0,
  `valorAbertura` DOUBLE NOT NULL DEFAULT 0,
  `valorFechamento` DOUBLE NULL,
  `obs` TEXT NULL,
  PRIMARY KEY (`codFechamentoCaixa`));

ALTER TABLE `gerirmeusalao_homologacao`.`caixa` 
ADD COLUMN `codCaixa` INT NOT NULL AUTO_INCREMENT FIRST,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`codCaixa`);

ALTER TABLE `gerirmeusalao_homologacao`.`movimentacaofinanceira` 
ADD COLUMN `codCaixa` INT NULL DEFAULT 0 AFTER `comentario`;

select c.codCaixa, m.codMovimentacao, m.valor, m.horario as 'HorarioMovimentacao', c.data, c.valorInicio, 
	u.nome as 'UsuarioIniciou', m.tipoMovimentacao, uf.nome as 'UsuarioFechou', f.nome as 'usuario'
from movimentacaofinanceira m
left join caixa c on c.codCaixa = m.codCaixa
left join usuario u on u.codUsuario = c.codUsuarioInicio
left join usuario uf on uf.codUsuario = c.codUsuarioFinal
left join usuario f on f.codUsuario = m.codUsuario
order by m.horario

ALTER TABLE `gerirmeusalao_homologacao`.`caixa` 
ADD COLUMN `obs` TEXT NULL AFTER `HorarioFinal`;


