<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Salao';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Rotas Para Contas a Receber*/

$route['contas_receber'] = 'contasReceber';
$route['contas_receber/novo'] = 'contasReceber/cadastrar';
$route["contas_receber/(:num)"] = "contasReceber/nota/$1";

/*Rotas para Funcionário*/

//$route["colaborador'] = 'funcionario';
//$route['colaborador/update/(:num)'] = "funcionario/alterar/(:num)";
//$route['colaborador/senha/(:num)'] = "funcionario/alterarSenha/(:num)";
