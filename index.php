<?php  

require_once("config.php");

// Carrega um usuário

//$root = new Usuario();
//$root->loadbyid(3);
//echo $root;

//---------------------------------------//

// Carrega uma lista de usuários

//$lista = Usuario::getList();
//echo json_encode($lista);

//---------------------------------------//

// Carrega uma lista de usuários buscando pelo login

//$search = Usuario::search("jo");
//echo json_encode($search);

//---------------------------------------//

// Carrega um usuário usando o login e a senha

//$usuario = new Usuario();
//$usuario->login("jose", 12345);
//echo $usuario;

//---------------------------------------//

// Cria um novo usuario

//$aluno = new Usuario("aluno", "@luno");
//$aluno->insert();
//echo $aluno;

//---------------------------------------//

// Alterar usuário

//$usuario = new Usuario();
//$usuario->loadById(8);
//$usuario->update("professor", "prof123");
//echo $usuario;

//---------------------------------------//

// Deletando usuário

$usuario = new Usuario();
$usuario->loadById(7);
$usuario->delete();
echo $usuario;

?>