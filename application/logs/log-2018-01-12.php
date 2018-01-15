<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-01-12 01:52:37 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ';' C:\xampp\htdocs\gerirmeusalao\application\models\Model_rendimentos.php 87
ERROR - 2018-01-12 01:52:44 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ';' C:\xampp\htdocs\gerirmeusalao\application\models\Model_rendimentos.php 87
ERROR - 2018-01-12 01:59:18 --> Query error: Unknown column 'f.nome' in 'field list' - Invalid query: SELECT DATE_FORMAT(dataPagto, '%m-%Y') as mes, sum(ne.valor) as valor, `c`.`codFuncionario`, `f`.`nome`
FROM `notaentrada` `ne`
JOIN `compromisso` `c` ON `c`.`codCompromisso` = `ne`.`codCompromisso`
JOIN `funcionario` ON `f`.`codFuncionario` = `c`.`codFuncionario`
WHERE `dataPagto` is not null
GROUP BY `c`.`codFuncionario`, DATE_FORMAT(dataPagto, '%m-%Y')
ORDER BY `dataPagto` desc, `valor` desc
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 44
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 44
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 44
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 44
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 44
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:29 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:43 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:43 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:43 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:43 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 02:12:43 --> Severity: Notice --> Undefined property: stdClass::$Mes C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 54
ERROR - 2018-01-12 03:28:45 --> Severity: error --> Exception: syntax error, unexpected end of file C:\xampp\htdocs\gerirmeusalao\application\views\relatorio_faturamento_total.php 104
