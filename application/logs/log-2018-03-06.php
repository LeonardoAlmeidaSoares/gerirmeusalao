<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-03-06 13:59:19 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Nenhuma conex�o p�de ser feita porque a m�quina de destino as recusou ativamente.
 C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-03-06 13:59:20 --> Unable to connect to the database
ERROR - 2018-03-06 14:00:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Nenhuma conex�o p�de ser feita porque a m�quina de destino as recusou ativamente.
 C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-03-06 14:00:08 --> Unable to connect to the database
ERROR - 2018-03-06 14:00:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Nenhuma conex�o p�de ser feita porque a m�quina de destino as recusou ativamente.
 C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-03-06 14:00:32 --> Unable to connect to the database
ERROR - 2018-03-06 14:02:44 --> Query error: Unknown column 'f.comissaoCartao_' in 'field list' - Invalid query: SELECT sum(ne.valor) as valor, `c`.`codFuncionario`, `f`.`nome`, SUM((SELECT (IF(ne.formaPagto = 'DINHEIRO', ((100 - f.comissaoDinheiro) * ne.valor), ((100 - f.comissaoCartao_) * ne.valor)) / 100)))as comissao
FROM `notaentrada` `ne`
JOIN `compromisso` `c` ON `c`.`codCompromisso` = `ne`.`codCompromisso`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `c`.`codFuncionario`
WHERE `dataPagto` is not null
AND `dataPagto` >= DATE_SUB(NOW(),INTERVAL 1 YEAR)
GROUP BY `c`.`codFuncionario`
ORDER BY `dataPagto` desc, `valor` desc
ERROR - 2018-03-06 14:04:58 --> Query error: Unknown column 'f.comissaoCartao_' in 'field list' - Invalid query: SELECT sum(ne.valor) as valor, `c`.`codFuncionario`, `f`.`nome`, SUM((SELECT (IF(ne.formaPagto = 'DINHEIRO', ((100 - f.comissaoDinheiro) * ne.valor), ((100 - f.comissaoCartao_) * ne.valor)) / 100)))as comissao
FROM `notaentrada` `ne`
JOIN `compromisso` `c` ON `c`.`codCompromisso` = `ne`.`codCompromisso`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `c`.`codFuncionario`
WHERE `dataPagto` is not null
AND `dataPagto` >= DATE_SUB(NOW(),INTERVAL 1 YEAR)
GROUP BY `c`.`codFuncionario`
ORDER BY `dataPagto` desc, `valor` desc
ERROR - 2018-03-06 15:23:58 --> Severity: error --> Exception: Too few arguments to function Model_servico::getServico(), 1 passed in C:\xampp\htdocs\gerirmeusalao\application\controllers\Agenda.php on line 126 and exactly 2 expected C:\xampp\htdocs\gerirmeusalao\application\models\Model_servico.php 20
ERROR - 2018-03-06 15:42:34 --> 404 Page Not Found: Clientes/index
ERROR - 2018-03-06 15:44:58 --> 404 Page Not Found: Cliente/aniversariantes
ERROR - 2018-03-06 15:47:04 --> Severity: Notice --> Undefined property: Cliente::$clientes C:\xampp\htdocs\gerirmeusalao\application\controllers\Cliente.php 175
ERROR - 2018-03-06 15:47:04 --> Severity: error --> Exception: Call to a member function aniversariantes() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Cliente.php 175
ERROR - 2018-03-06 15:47:13 --> Severity: Notice --> Undefined property: Cliente::$clientes C:\xampp\htdocs\gerirmeusalao\application\controllers\Cliente.php 175
ERROR - 2018-03-06 15:47:13 --> Severity: error --> Exception: Call to a member function aniversariantes() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Cliente.php 175
ERROR - 2018-03-06 15:53:04 --> 404 Page Not Found: ContasReceber/vencendoHoje
ERROR - 2018-03-06 16:02:13 --> Severity: Notice --> Undefined variable: status C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\listagem_contas_vencendo_hoje.php 87
ERROR - 2018-03-06 16:02:36 --> Severity: Notice --> Undefined variable: status C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\listagem_contas_vencendo_hoje.php 88
ERROR - 2018-03-06 18:14:46 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 305
ERROR - 2018-03-06 19:39:11 --> Severity: Notice --> Undefined variable: colaboradores C:\xampp\htdocs\gerirmeusalao\application\views\agenda\listagem_hoje.php 47
ERROR - 2018-03-06 19:39:12 --> Severity: error --> Exception: Call to a member function result() on null C:\xampp\htdocs\gerirmeusalao\application\views\agenda\listagem_hoje.php 47
ERROR - 2018-03-06 19:40:25 --> Severity: Notice --> Undefined variable: colaboradores C:\xampp\htdocs\gerirmeusalao\application\views\agenda\listagem_hoje.php 47
ERROR - 2018-03-06 19:40:25 --> Severity: error --> Exception: Call to a member function result() on null C:\xampp\htdocs\gerirmeusalao\application\views\agenda\listagem_hoje.php 47
ERROR - 2018-03-06 19:40:56 --> Severity: Notice --> Undefined property: Agenda::$colaboradores C:\xampp\htdocs\gerirmeusalao\application\controllers\Agenda.php 301
ERROR - 2018-03-06 19:40:56 --> Severity: error --> Exception: Call to a member function getFuncionarios() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Agenda.php 301
ERROR - 2018-03-06 19:41:05 --> Severity: Notice --> Undefined property: Agenda::$colaboradores C:\xampp\htdocs\gerirmeusalao\application\controllers\Agenda.php 301
ERROR - 2018-03-06 19:41:05 --> Severity: error --> Exception: Call to a member function getFuncionarios() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Agenda.php 301
ERROR - 2018-03-06 19:41:20 --> Severity: Notice --> Undefined variable: colaboradores C:\xampp\htdocs\gerirmeusalao\application\views\agenda\listagem_hoje.php 47
ERROR - 2018-03-06 19:41:20 --> Severity: error --> Exception: Call to a member function result() on null C:\xampp\htdocs\gerirmeusalao\application\views\agenda\listagem_hoje.php 47
