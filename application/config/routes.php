<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages';
// rota de cadastro
$route['cadastro'] = 'usuario/view_cadastro';
// rota de login
$route['login'] = "usuario/view_login";
// rota para adicionar um novo contato
$route['contato/novo'] = "contato/novo_contato";
// rota para editar contato
$route['contato/editar/:num'] = "contato/editar";
// rota para deletar um contato
$route['contato/delete/:num'] = "contato/delete_contato";
$route['contato/pesquisa'] = "contato/pesquisar";
// rota de logout
$route['logout'] = "usuario/logout";

 



