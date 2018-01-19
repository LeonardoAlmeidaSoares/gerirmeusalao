ERROR - 2018-01-19 16:28:43 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\gerirmeusalao\application\views\cadastro_produtos.php 87
ERROR - 2018-01-19 16:28:43 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\gerirmeusalao\application\views\cadastro_produtos.php 99
ERROR - 2018-01-19 16:30:10 --> Severity: error --> Exception: Too few arguments to function Dataget(), 1 passed in C:\xampp\htdocs\gerirmeusalao\application\views\cadastro_produtos.php on line 75 and exactly 2 expected C:\xampp\htdocs\gerirmeusalao\application\views\cadastro_produtos.php 5
ERROR - 2018-01-19 16:36:52 --> 404 Page Not Found: Instituicao/index
ERROR - 2018-01-19 16:39:20 --> Severity: error --> Exception: Unable to locate the model you have specified: Model_instituicao C:\xampp\htdocs\gerirmeusalao\system\core\Loader.php 344
ERROR - 2018-01-19 16:41:54 --> Severity: Notice --> Undefined property: Instituicao::$func C:\xampp\htdocs\gerirmeusalao\application\controllers\Instituicao.php 33
ERROR - 2018-01-19 16:41:54 --> Severity: error --> Exception: Call to a member function getFuncionarios() on null C:\xampp\htdocs\gerirmeusalao\application\controllers\Instituicao.php 33
ERROR - 2018-01-19 16:43:05 --> Severity: Notice --> Undefined property: stdClass::$cargo C:\xampp\htdocs\gerirmeusalao\application\views\listagem_funcionario.php 67
ERROR - 2018-01-19 16:43:05 --> Severity: Notice --> Undefined property: stdClass::$codFuncionario C:\xampp\htdocs\gerirmeusalao\application\views\listagem_funcionario.php 73
ERROR - 2018-01-19 16:43:05 --> Severity: Notice --> Undefined property: stdClass::$codFuncionario C:\xampp\htdocs\gerirmeusalao\application\views\listagem_funcionario.php 81
ERROR - 2018-01-19 18:02:26 --> Query error: Unknown column 'f.comissoDinheiro' in 'field list' - Invalid query: SELECT DATE_FORMAT(dataPagto, '%m-%Y') as mes, sum(ne.valor) as valor, `c`.`codFuncionario`, `f`.`nome`, `f`.`comissoDinheiro`, `f`.`comissaoCartao`, `ne`.`formaPagto`
FROM `notaentrada` `ne`
JOIN `compromisso` `c` ON `c`.`codCompromisso` = `ne`.`codCompromisso`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `c`.`codFuncionario`
WHERE `dataPagto` is not null
AND `dataPagto` >= DATE_SUB(NOW(),INTERVAL 1 YEAR)
GROUP BY `c`.`codFuncionario`, DATE_FORMAT(dataPagto, '%m-%Y')
ORDER BY `dataPagto` desc, `valor` desc
ERROR - 2018-01-19 18:09:29 --> Severity: error --> Exception: syntax error, unexpected ';' C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 22
ERROR - 2018-01-19 18:10:11 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN) C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 25
ERROR - 2018-01-19 18:10:20 --> Severity: Notice --> Undefined index: formPagto C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 20
ERROR - 2018-01-19 18:10:32 --> Severity: Notice --> Undefined index: formaPagto C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 20
ERROR - 2018-01-19 18:11:14 --> Severity: Notice --> Undefined index: formaPagto C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 20
ERROR - 2018-01-19 18:11:55 --> Severity: Notice --> Undefined index: formaPagto C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 20
ERROR - 2018-01-19 18:13:35 --> Severity: Notice --> Undefined index: comissaoDinheiro C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 22
ERROR - 2018-01-19 18:19:10 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 155
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Undefined index: empresa C:\xampp\htdocs\gerirmeusalao\application\controllers\Relatorio.php 59
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\controllers\Relatorio.php 59
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Undefined index: empresa C:\xampp\htdocs\gerirmeusalao\application\controllers\Relatorio.php 60
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\controllers\Relatorio.php 60
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Undefined index: empresa C:\xampp\htdocs\gerirmeusalao\application\views\inc\barraSuperior.php 31
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\barraSuperior.php 31
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Undefined index: permissoes C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 1
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Undefined index: usuario C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 47
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 47
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 81
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 97
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 113
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 129
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 145
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 161
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 177
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 195
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 211
ERROR - 2018-01-19 19:27:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\gerirmeusalao\application\views\inc\menu.php 227
ERROR - 2018-01-19 19:59:10 --> Severity: error --> Exception: Call to undefined function getMediaRendimentosUltimoAno() C:\xampp\htdocs\gerirmeusalao\application\controllers\Relatorio.php 61
ERROR - 2018-01-19 19:59:22 --> Severity: error --> Exception: Call to undefined function getMediaRendimentosUltimoAno() C:\xampp\htdocs\gerirmeusalao\application\controllers\Relatorio.php 61
ERROR - 2018-01-19 20:01:40 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 152
ERROR - 2018-01-19 20:01:40 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 153
ERROR - 2018-01-19 20:01:40 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 154
ERROR - 2018-01-19 20:02:11 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 153
ERROR - 2018-01-19 20:02:11 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 154
ERROR - 2018-01-19 20:08:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`ne`.`valor`, f.comissaoCartao * ne.valor) / 100)))as comissao
FROM `notaentrada' at line 1 - Invalid query: SELECT sum(ne.valor) as valor, `c`.`codFuncionario`, `f`.`nome`, SUM((SELECT (IF(ne.formaPagto = 'DINHEIRO', `f`.`comissaoDinheiro *` `ne`.`valor`, f.comissaoCartao * ne.valor) / 100)))as comissao
FROM `notaentrada` `ne`
JOIN `compromisso` `c` ON `c`.`codCompromisso` = `ne`.`codCompromisso`
JOIN `funcionario` `f` ON `f`.`codFuncionario` = `c`.`codFuncionario`
WHERE `dataPagto` is not null
AND `dataPagto` >= DATE_SUB(NOW(),INTERVAL 1 YEAR)
GROUP BY `c`.`codFuncionario`
ORDER BY `dataPagto` desc, `valor` desc
ERROR - 2018-01-19 20:09:54 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 153
ERROR - 2018-01-19 20:09:54 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 154
ERROR - 2018-01-19 20:11:33 --> Severity: Notice --> Undefined variable: itemC C:\xampp\htdocs\gerirmeusalao\application\views\relatorio\relatorio_faturamento_total.php 154
ERROR - 2018-01-19 20:17:29 --> Severity: error --> Exception: Call to a member function num_rows() on null C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\invoice.php 108
ERROR - 2018-01-19 20:40:17 --> Severity: error --> Exception: Call to a member function num_rows() on null C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\invoice.php 108
ERROR - 2018-01-19 20:46:30 --> Query error: Unknown column 'sp.codCompromisso' in 'where clause' - Invalid query: SELECT `s`.`descricao`, `s`.`valorComum`, `s`.`codServico`, `ne`.`valor`, (select count(*) from servicoprestado sp where sp.codCompromisso = ne.codCompromisso) as qtd
FROM `servico` `s`
JOIN `notaentrada` `ne` ON `ne`.`codNotaEntrada` = `sp`.`codNotaEntrada`
WHERE `ne`.`codNotaEntrada` = '25'
ERROR - 2018-01-19 20:50:29 --> Severity: error --> Exception: syntax error, unexpected end of file C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\listagem_contas_receber.php 152
ERROR - 2018-01-19 21:01:47 --> 404 Page Not Found: ContasReceber/criarNotaServicoNaoFinalizado
ERROR - 2018-01-19 21:05:13 --> 404 Page Not Found: ContasReceber/criarNotaServicoNaoFinalizado
ERROR - 2018-01-19 21:09:16 --> Severity: Notice --> Undefined property: CI_DB_mysqli_result::$codCompromisso C:\xampp\htdocs\gerirmeusalao\application\controllers\ContasReceber.php 82
ERROR - 2018-01-19 21:09:17 --> Severity: error --> Exception: Call to a member function num_rows() on null C:\xampp\htdocs\gerirmeusalao\application\views\contas_receber\invoice.php 108
