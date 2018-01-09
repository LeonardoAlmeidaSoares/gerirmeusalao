<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-20 15:32:05 --> Severity: Warning --> mysqli::real_connect(): php_network_getaddresses: getaddrinfo failed: Este host n�o � conhecido.  C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2017-12-20 15:32:05 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: Este host n�o � conhecido.  C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2017-12-20 15:32:05 --> Unable to connect to the database
ERROR - 2017-12-20 15:35:53 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\gerirmeusalao\application\views\login.php 35
ERROR - 2017-12-20 15:37:37 --> Query error: Unknown column 'f.comissao' in 'field list' - Invalid query: SELECT (sum(f.comissao * s.valorComum / 100) + f.salario) as valor, `f`.`nome`
FROM `servicoprestado` `sp`
JOIN `servico` `s` ON `s`.`codServico` = `sp`.`codServico`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `sp`.`codFuncionario`
WHERE MONTH(horario) = MONTH(NOW()) and YEAR(horario) = YEAR(NOW())
AND `f`.`codEmpresa` = '1'
GROUP BY `sp`.`codFuncionario`
ERROR - 2017-12-20 15:38:34 --> Query error: Unknown column 'f.comissao' in 'field list' - Invalid query: SELECT (sum(f.comissao * s.valorComum / 100) + f.salario) as valor, `f`.`nome`
FROM `servicoprestado` `sp`
JOIN `servico` `s` ON `s`.`codServico` = `sp`.`codServico`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `sp`.`codFuncionario`
WHERE MONTH(horario) = MONTH(NOW()) and YEAR(horario) = YEAR(NOW())
AND `f`.`codEmpresa` = '1'
GROUP BY `sp`.`codFuncionario`
ERROR - 2017-12-20 16:27:25 --> Query error: Unknown column 'f.comissao' in 'field list' - Invalid query: SELECT (sum(f.comissao * s.valorComum / 100) + f.salario) as valor, `f`.`nome`
FROM `servicoprestado` `sp`
JOIN `servico` `s` ON `s`.`codServico` = `sp`.`codServico`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `sp`.`codFuncionario`
WHERE MONTH(horario) = MONTH(NOW()) and YEAR(horario) = YEAR(NOW())
AND `f`.`codEmpresa` = '1'
GROUP BY `sp`.`codFuncionario`
