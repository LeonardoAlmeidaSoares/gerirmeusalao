<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Salao';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Rotas Para Clientes*/

$route['cliente'] = 'Cliente';
$route['cliente/novo'] = 'cliente/cadastrar';
$route["cliente/editar/(:num)"] = "cliente/alterar/$1";
$route["cliente/(:num)"] = "cliente/historico/$1";
$route['cliente/aniversariantes'] = 'cliente/aniversariantes';

/*Rotas Para Contas a Receber*/

$route['contas_receber'] = 'contasReceber';
$route['contas_receber/novo'] = 'contasReceber/cadastrar';
$route['contas_receber/novo/(:num)'] = 'contasReceber/cadastrar/$1';
$route["contas_receber/(:num)"] = "contasReceber/nota/$1";
$route["contas_receber/hoje"] = "contasReceber/vencendoHoje";
$route['contas_receber/status'] = "contasReceber/alterarStatus";
$route['contas_receber/servico_pendente/(:num)'] = "contasReceber/criarNotaServicoNaoFinalizado/$1";

/*Rotas Para Contas a Pagar*/

$route['contas_pagar'] = 'contasPagar';
$route['contas_pagar/novo'] = 'contasPagar/cadastrar';
$route["contas_pagar/(:num)"] = "contasPagar/nota/$1";
$route["contas_pagar/hoje"] = "contasPagar/vencendoHoje";
$route['contas_pagar/pagar'] = "contasPagar/EfetuarPagamento";

/*Rotas para Funcionário*/

$route['colaborador'] = 'funcionario';
$route['colaborador/novo'] = 'funcionario/cadastrar';
$route['colaborador/editar/(:num)'] = "funcionario/Alterar/$1";
$route['colaborador/(:num)'] = "funcionario/visualizar/$1";

/*Rotas para Usuario*/

$route['usuario'] = 'Usuario';
$route['usuario/novo'] = 'Usuario/cadastrar';
$route['usuario/editar/(:num)'] = "Usuario/Alterar/$1";
$route['usuario/(:num)'] = "Usuario/visualizar/$1";

/*Rotas para Produtos*/

$route['produto'] = 'Produtos';
$route['produto/novo'] = 'Produtos/cadastrar';
$route['produto/editar/(:num)'] = "Produtos/Alterar/$1";

/*Rotas para Serviços*/

$route['servico'] = 'Servicos';
$route['servico/novo'] = 'Servicos/cadastrar';
$route['servico/editar/(:num)'] = "Servicos/Alterar/$1";

/* Rotas para Tipo de Saida*/
$route['tiposaida'] = 'tipo_saida';

/* Rotas para Tipo de Saida*/
$route['lembrete'] = 'lembrete';
$route['lembrete/novo'] = 'lembrete/cadastrar';
$route['lembrete/hoje'] = 'lembrete/ListagemHoje';

/* Rotas para Agenda*/
$route['agenda'] = 'agenda';
$route['agenda/hoje'] = 'agenda/listagemHoje';