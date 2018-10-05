<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-04 17:08:13 --> Query error: Unknown column 'id_funcionario' in 'where clause' - Invalid query: UPDATE `funcionario` SET `status` = 0
WHERE `id_funcionario` =0
ERROR - 2018-10-04 17:11:18 --> Query error: Unknown column 'id_funcionario' in 'where clause' - Invalid query: UPDATE `funcionario` SET `status` = 0
WHERE `id_funcionario` =0
ERROR - 2018-10-04 17:11:27 --> Query error: Unknown column 'id_funcionario' in 'where clause' - Invalid query: UPDATE `funcionario` SET `status` = 0
WHERE `id_funcionario` =0
ERROR - 2018-10-04 17:17:41 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:17:41 --> 404 Page Not Found: Funcionario/
ERROR - 2018-10-04 17:30:52 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:30:52 --> 404 Page Not Found: Funcionario/
ERROR - 2018-10-04 17:32:11 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:32:11 --> 404 Page Not Found: Funcionario/
ERROR - 2018-10-04 17:32:37 --> 404 Page Not Found: Fut/index
ERROR - 2018-10-04 17:32:57 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:32:57 --> 404 Page Not Found: Funcionario/
ERROR - 2018-10-04 17:33:04 --> 404 Page Not Found: Colaborador/index
ERROR - 2018-10-04 17:33:08 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:33:08 --> 404 Page Not Found: Funcionario/
ERROR - 2018-10-04 17:33:17 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:33:17 --> 404 Page Not Found: /Funcionario/
ERROR - 2018-10-04 17:33:23 --> Severity: Notice --> Uninitialized string offset: 0 C:\xampp\htdocs\gerirmeusalao\system\core\CodeIgniter.php 413
ERROR - 2018-10-04 17:33:23 --> 404 Page Not Found: Funcionario/
ERROR - 2018-10-04 17:33:38 --> 404 Page Not Found: Colaborador/index
ERROR - 2018-10-04 17:36:38 --> 404 Page Not Found: Colaborador/deletar
ERROR - 2018-10-04 17:46:09 --> Query error: Table 'gerirmeusalao_homologacao.produtos' doesn't exist - Invalid query: UPDATE `produtos` SET `status` = 0
WHERE `codProduto` = 9
ERROR - 2018-10-04 17:46:15 --> Query error: Table 'gerirmeusalao_homologacao.produtos' doesn't exist - Invalid query: UPDATE `produtos` SET `status` = 0
WHERE `codProduto` =0
ERROR - 2018-10-04 18:00:30 --> Severity: Warning --> dirname() expects exactly 1 parameter, 0 given C:\xampp\htdocs\gerirmeusalao\application\controllers\Funcionario.php 56
ERROR - 2018-10-04 18:09:14 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\gerirmeusalao\system\libraries\Email.php 1890
ERROR - 2018-10-04 18:10:25 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `c`.`descricao`, `c`.`horario`, s.descricao as 'serviço', `c`.`status`, `f`.`nome` as `funcionario`, `cli`.`nome` as `cliente`, `f`.`codFuncionario`, `c`.`codCompromisso`
FROM `compromisso` `c`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `c`.`codFuncionario`
JOIN `servico` `s` ON `s`.`codServico` = `c`.`codServico`
JOIN `cliente` `cli` ON `cli`.`codCliente` = `c`.`codCliente`
WHERE DAY(horario) = DAY(NOW())
AND `status` > -1
AND `c`.`status` < 2
AND `c`.`codEmpresa` = '1'
ORDER BY `c`.`horario`
ERROR - 2018-10-04 18:13:45 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `c`.`descricao`, `c`.`horario`, s.descricao as 'serviço', `c`.`status`, `f`.`nome` as `funcionario`, `cli`.`nome` as `cliente`, `f`.`codFuncionario`, `c`.`codCompromisso`
FROM `compromisso` `c`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `c`.`codFuncionario`
JOIN `servico` `s` ON `s`.`codServico` = `c`.`codServico`
JOIN `cliente` `cli` ON `cli`.`codCliente` = `c`.`codCliente`
WHERE DAY(horario) = DAY(NOW())
AND `status` > -1
AND `c`.`status` < 2
AND `c`.`codEmpresa` = '1'
ORDER BY `c`.`horario`
ERROR - 2018-10-04 18:19:20 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\gerirmeusalao\application\controllers\Funcionario.php 53
ERROR - 2018-10-04 18:19:43 --> Severity: Warning --> move_uploaded_file(C:\xampp\htdocs\gerirmeusalao\assets\upload\colaboradores\assets/upload/colaboradores/5bb63d9f6618a.jpeg): failed to open stream: No such file or directory C:\xampp\htdocs\gerirmeusalao\application\controllers\Funcionario.php 81
ERROR - 2018-10-04 18:19:43 --> Severity: Warning --> move_uploaded_file(): Unable to move 'C:\xampp\tmp\phpC297.tmp' to 'C:\xampp\htdocs\gerirmeusalao\assets\upload\colaboradores\assets/upload/colaboradores/5bb63d9f6618a.jpeg' C:\xampp\htdocs\gerirmeusalao\application\controllers\Funcionario.php 81
ERROR - 2018-10-04 18:20:40 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\gerirmeusalao\system\libraries\Email.php 1890
ERROR - 2018-10-04 20:22:34 --> Severity: Warning --> move_uploaded_file(C:\wamp\www\gerirmeusalao\assets\upload\clientes\5bb6768a0cf68.jpg): failed to open stream: No such file or directory C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 20:22:34 --> Severity: Warning --> move_uploaded_file(): Unable to move 'C:\wamp\tmp\phpA07.tmp' to 'C:\wamp\www\gerirmeusalao\assets\upload\clientes\5bb6768a0cf68.jpg' C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Undefined index: empresa C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 18
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 18
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Undefined index: permissoes C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 1
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Undefined index: empresa C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 23
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 23
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Undefined index: usuario C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 36
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 36
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 53
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 62
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 70
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 78
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 86
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 94
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 102
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 110
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 119
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 128
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 144
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 152
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\inc\menu.php 160
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Undefined index: permissoes C:\wamp\www\gerirmeusalao\application\views\cliente\listagem_cliente.php 127
ERROR - 2018-10-04 20:44:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\gerirmeusalao\application\views\cliente\listagem_cliente.php 127
ERROR - 2018-10-04 23:53:40 --> Severity: Notice --> Undefined index: txtImagem C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:53:40 --> Severity: Notice --> Undefined variable: upload_name C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:55:52 --> Severity: Notice --> Undefined index: txtImagem C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:55:52 --> Severity: Notice --> Undefined variable: upload_name C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:56:00 --> Severity: Notice --> Undefined index: txtImagem C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:56:00 --> Severity: Notice --> Undefined variable: upload_name C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:57:10 --> Severity: Notice --> Undefined index: txtImagem C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
ERROR - 2018-10-04 23:57:10 --> Severity: Notice --> Undefined variable: upload_name C:\wamp\www\gerirmeusalao\application\controllers\Cliente.php 80
