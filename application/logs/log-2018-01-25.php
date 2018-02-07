<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-01-25 02:42:34 --> Severity: Notice --> Undefined property: Venda::$serv C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 19
ERROR - 2018-01-25 02:42:34 --> Severity: error --> Exception: Call to a member function getVendas() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 19
ERROR - 2018-01-25 02:43:49 --> Severity: Notice --> Undefined variable: codEmpresaa C:\xampp\htdocs\gerirmeusalao\application\models\Model_venda.php 9
ERROR - 2018-01-25 02:43:49 --> Query error: Unknown column 'codEmpresaa' in 'where clause' - Invalid query: SELECT *
FROM `venda`
WHERE `codEmpresaa` IS NULL
ERROR - 2018-01-25 02:44:14 --> Query error: Unknown column 'codEmpresa' in 'where clause' - Invalid query: SELECT *
FROM `venda`
WHERE `codEmpresa` = '1'
ERROR - 2018-01-25 02:51:20 --> Severity: Notice --> Undefined variable: usuarios C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 48
ERROR - 2018-01-25 02:51:20 --> Severity: error --> Exception: Call to a member function result() on null C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 48
ERROR - 2018-01-25 02:51:36 --> Severity: Notice --> Undefined property: stdClass::$perm_cadastrarVenda C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 63
ERROR - 2018-01-25 02:58:22 --> Severity: Notice --> Undefined variable: dados C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 60
ERROR - 2018-01-25 02:58:22 --> Severity: Notice --> Undefined variable: cargos C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 68
ERROR - 2018-01-25 02:58:22 --> Severity: error --> Exception: Call to a member function result() on null C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 68
ERROR - 2018-01-25 02:59:23 --> Severity: Notice --> Undefined variable: cadastro C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 26
ERROR - 2018-01-25 02:59:23 --> Severity: Notice --> Undefined variable: codProcesso C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 27
ERROR - 2018-01-25 02:59:23 --> Severity: error --> Exception: Call to undefined function Dataget() C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 34
ERROR - 2018-01-25 02:59:47 --> Severity: Notice --> Undefined variable: cargos C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 38
ERROR - 2018-01-25 02:59:47 --> Severity: error --> Exception: Call to a member function result() on null C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 38
ERROR - 2018-01-25 03:02:21 --> Severity: error --> Exception: Call to undefined function getDataAniversario() C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 47
ERROR - 2018-01-25 03:02:51 --> Severity: error --> Exception: Call to undefined function Dataget() C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 70
ERROR - 2018-01-25 03:13:24 --> Severity: Notice --> Undefined property: stdClass::$codCliente C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 43
ERROR - 2018-01-25 03:13:24 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 43
ERROR - 2018-01-25 04:05:01 --> Severity: Notice --> Undefined property: stdClass::$valor C:\xampp\htdocs\gerirmeusalao\application\views\venda\cadastro_venda.php 45
ERROR - 2018-01-25 05:06:49 --> Severity: Notice --> Use of undefined constant json - assumed 'json' C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 51
ERROR - 2018-01-25 05:06:49 --> Severity: error --> Exception: Call to undefined function encode() C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 51
ERROR - 2018-01-25 05:14:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 55
ERROR - 2018-01-25 05:15:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 55
ERROR - 2018-01-25 05:15:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 55
ERROR - 2018-01-25 05:15:33 --> Severity: Warning --> Illegal string offset 'produto' C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 56
ERROR - 2018-01-25 05:15:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 56
ERROR - 2018-01-25 05:18:50 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 52
ERROR - 2018-01-25 05:18:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 55
ERROR - 2018-01-25 05:19:08 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 56
ERROR - 2018-01-25 16:43:53 --> Severity: error --> Exception: syntax error, unexpected ',' C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 84
ERROR - 2018-01-25 16:46:22 --> Query error: Unknown column 'valorUnitario' in 'field list' - Invalid query: INSERT INTO `itemvenda` (`codVenda`, `codProduto`, `quantidade`, `valorUnitario`) VALUES (1, '9', 2, 60)
ERROR - 2018-01-25 16:46:54 --> Query error: Unknown column 'discriminação' in 'field list' - Invalid query: INSERT INTO `notaentrada` (`valor`, `status`, `discriminação`, `dataVencimento`, `codCliente`, `codEmpresa`, `codCategoriaEntrada`, `codCompromisso`, `formaPagto`) VALUES (120, 0, 'Relativo a venda [2]', '2018/01/25', 30, '1', '2', 0, 'CARTAO')
ERROR - 2018-01-25 16:47:04 --> 404 Page Not Found: Notaentrada/nota
ERROR - 2018-01-25 16:47:30 --> Severity: error --> Exception: Call to a member function num_rows() on null C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\invoice.php 110
ERROR - 2018-01-25 16:51:58 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW) C:\xampp\htdocs\gerirmeusalao\application\controllers\ContasReceber.php 130
ERROR - 2018-01-25 16:58:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'on iv.codVenda = n.codVenda) as qtd
FROM `notaentrada` `n`
JOIN `cliente` `cli` ' at line 1 - Invalid query: SELECT `n`.*, `c`.`descricao`, `cli`.`nome` as `nomeCliente`, IF(n.codVenda = 0, (select count(*) from servicoprestado sp where sp.codNotaEntrada = n.codNotaEntrada), (select count(*) from itemvenda iv on iv.codVenda = n.codVenda) as qtd
FROM `notaentrada` `n`
JOIN `cliente` `cli` ON `n`.`codCliente` = `cli`.`codCliente`
JOIN `categoriaentrada` `c` ON `c`.`codCategoriaEntrada` = `n`.`codCategoriaEntrada`
WHERE `n`.`codEmpresa` = '1'
ERROR - 2018-01-25 16:58:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as qtd
FROM `notaentrada` `n`
JOIN `cliente` `cli` ON `n`.`codCliente` = `cli`.`' at line 1 - Invalid query: SELECT `n`.*, `c`.`descricao`, `cli`.`nome` as `nomeCliente`, IF(n.codVenda = 0, (select count(*) from servicoprestado sp where sp.codNotaEntrada = n.codNotaEntrada), (select count(*) from itemvenda iv where iv.codVenda = n.codVenda) as qtd
FROM `notaentrada` `n`
JOIN `cliente` `cli` ON `n`.`codCliente` = `cli`.`codCliente`
JOIN `categoriaentrada` `c` ON `c`.`codCategoriaEntrada` = `n`.`codCategoriaEntrada`
WHERE `n`.`codEmpresa` = '1'
ERROR - 2018-01-25 17:02:32 --> Severity: Notice --> Undefined index: formaPagto C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 87
ERROR - 2018-01-25 17:02:32 --> Severity: Notice --> Undefined property: Venda::$sb C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 93
ERROR - 2018-01-25 17:02:32 --> Severity: error --> Exception: Call to a member function where() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 93
ERROR - 2018-01-25 17:03:05 --> Severity: Notice --> Undefined property: Venda::$sb C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 93
ERROR - 2018-01-25 17:03:05 --> Severity: error --> Exception: Call to a member function where() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Venda.php 93
ERROR - 2018-01-25 17:03:19 --> Severity: error --> Exception: Call to undefined method Model_entradas::getProdutosDetalhados() C:\xampp\htdocs\gerirmeusalao\application\controllers\ContasReceber.php 132
ERROR - 2018-01-25 17:04:40 --> Severity: error --> Exception: Call to undefined method Model_entradas::getProdutosDetalhados() C:\xampp\htdocs\gerirmeusalao\application\controllers\ContasReceber.php 132
ERROR - 2018-01-25 17:06:35 --> Severity: Compile Error --> Cannot redeclare Model_entradas::getServicosDetalhados() C:\xampp\htdocs\gerirmeusalao\application\models\Model_entradas.php 67
ERROR - 2018-01-25 17:06:44 --> Query error: Unknown column 'p.valorComum' in 'field list' - Invalid query: SELECT `p`.`descricao`, `p`.`valorComum`, `s`.`codigo`, `ne`.`valor`
FROM `produto` `p`
JOIN `itemvenda` `iv` ON `iv`.`codProduto` = `p`.`codProduto`
JOIN `notaentrada` `ne` ON `ne`.`codNotaEntrada` = `iv`.`codNotaEntrada`
WHERE `ne`.`codNotaEntrada` = '38'
ERROR - 2018-01-25 17:07:29 --> Query error: Unknown column 'p.valor' in 'field list' - Invalid query: SELECT `p`.`descricao`, `p`.`valor` as `Valor`, `p`.`codProduto` as `Codigo`, `ne`.`valor`
FROM `produto` `p`
JOIN `itemvenda` `iv` ON `iv`.`codProduto` = `p`.`codProduto`
JOIN `notaentrada` `ne` ON `ne`.`codNotaEntrada` = `iv`.`codNotaEntrada`
WHERE `ne`.`codNotaEntrada` = '38'
ERROR - 2018-01-25 17:07:50 --> Query error: Unknown column 'iv.codNotaEntrada' in 'on clause' - Invalid query: SELECT `p`.`descricao`, `p`.`valorVenda` as `Valor`, `p`.`codProduto` as `Codigo`, `ne`.`valor`
FROM `produto` `p`
JOIN `itemvenda` `iv` ON `iv`.`codProduto` = `p`.`codProduto`
JOIN `notaentrada` `ne` ON `ne`.`codNotaEntrada` = `iv`.`codNotaEntrada`
WHERE `ne`.`codNotaEntrada` = '38'
ERROR - 2018-01-25 17:08:33 --> Severity: Notice --> Undefined property: stdClass::$codServico C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\invoice.php 144
ERROR - 2018-01-25 17:10:27 --> Query error: Unknown column 'iv.codNotaEntrada' in 'where clause' - Invalid query: SELECT `n`.*, `c`.`descricao`, `cli`.`nome` as `nomeCliente`, IF(n.codVenda = 0, (select count(*) from servicoprestado sp where sp.codNotaEntrada = n.codNotaEntrada), (select count(*) from itemvenda iv where iv.codNotaEntrada = n.codNotaEntrada)) as qtd
FROM `notaentrada` `n`
JOIN `cliente` `cli` ON `n`.`codCliente` = `cli`.`codCliente`
JOIN `categoriaentrada` `c` ON `c`.`codCategoriaEntrada` = `n`.`codCategoriaEntrada`
WHERE `n`.`codEmpresa` = '1'
ERROR - 2018-01-25 17:35:22 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 51
ERROR - 2018-01-25 17:35:22 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 17:35:22 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:35:22 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:35:22 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 17:38:15 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 51
ERROR - 2018-01-25 17:38:15 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 17:38:15 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:38:15 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:38:15 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 17:51:13 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:13 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:14 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:14 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:24 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:24 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:25 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:51:25 --> 404 Page Not Found: Plugins/images
ERROR - 2018-01-25 17:54:35 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 51
ERROR - 2018-01-25 17:54:35 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 17:54:35 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:54:35 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:54:35 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 17:56:28 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 51
ERROR - 2018-01-25 17:56:28 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 17:56:28 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:56:28 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:56:28 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 17:57:07 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 51
ERROR - 2018-01-25 17:57:07 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 17:57:07 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:57:07 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:57:07 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 17:59:06 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ',' or ')' C:\xampp\htdocs\gerirmeusalao\application\models\Model_venda.php 11
ERROR - 2018-01-25 17:59:14 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ',' or ')' C:\xampp\htdocs\gerirmeusalao\application\models\Model_venda.php 11
ERROR - 2018-01-25 17:59:33 --> Severity: Notice --> Undefined property: stdClass::$nome C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 51
ERROR - 2018-01-25 17:59:33 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 17:59:33 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:59:33 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 17:59:33 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 18:00:08 --> Query error: Column 'codEmpresa' in where clause is ambiguous - Invalid query: SELECT `venda`.*, `cliente`.`nome`
FROM `venda`
JOIN `cliente` ON `cliente`.`codCliente` = `venda`.`codCliente`
WHERE `codEmpresa` = '1'
ERROR - 2018-01-25 18:00:15 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 18:00:15 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 18:00:15 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 18:00:15 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 55
ERROR - 2018-01-25 18:01:42 --> Query error: Unknown column 'venda.horario' in 'field list' - Invalid query: SELECT `venda`.`codVenda`, `cliente`.`nome`, DATE_FORMAT(venda.horario, '%d/%m/%Y %H:%i') as horario
FROM `venda`
JOIN `cliente` ON `cliente`.`codCliente` = `venda`.`codCliente`
WHERE `venda`.`codEmpresa` = '1'
ERROR - 2018-01-25 18:02:06 --> Severity: Notice --> Undefined property: stdClass::$email C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 53
ERROR - 2018-01-25 18:02:06 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 54
ERROR - 2018-01-25 18:02:06 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 54
ERROR - 2018-01-25 18:02:06 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 56
ERROR - 2018-01-25 18:02:21 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 18:02:21 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 18:02:21 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 54
ERROR - 2018-01-25 18:02:47 --> Severity: Notice --> Undefined property: stdClass::$status C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 18:02:47 --> Severity: Notice --> Undefined index:  C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 52
ERROR - 2018-01-25 18:02:47 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 54
ERROR - 2018-01-25 18:03:17 --> Severity: Notice --> Undefined property: stdClass::$codUsuario C:\xampp\htdocs\gerirmeusalao\application\views\venda\listagem_vendas.php 54
ERROR - 2018-01-25 18:25:36 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Nenhuma conex�o p�de ser feita porque a m�quina de destino as recusou ativamente.
 C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-01-25 18:25:37 --> Unable to connect to the database
ERROR - 2018-01-25 18:26:01 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Nenhuma conex�o p�de ser feita porque a m�quina de destino as recusou ativamente.
 C:\xampp\htdocs\gerirmeusalao\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-01-25 18:26:01 --> Unable to connect to the database
