/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Leo
 * Created: 04/10/2018
 */
USE `gerirmeusalao_homologacao`;
CREATE  OR REPLACE VIEW `detalhamento_servicos` AS
select s.descricao, DATE_FORMAT(sp.horario, '%H:%i') as horario, e.codNotaEntrada, e.status, e.valor
from servicoprestado sp
left join servico s on s.codServico = sp.codServico
left join notaentrada e on e.codNotaEntrada = sp.codNotaEntrada;


