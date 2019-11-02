<?php
/* print_r($_GET);
echo '<br />' . $_GET["email"] . '<br />' . $_GET["senha"] ;

print_r($_POST);
echo '<br />' . $_POST["email"] . '<br />' . $_POST["senha"] ; */

session_start();

/*
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/

//verifica a autenticacao
$usuario_autenticado = false;
$usuario_id = null;
$perfis = array(1 => 'Administrativo', 2 => 'Usuário');
$usuario_perfil_id = null;

//usuarios do sistema
$usuarios_app = array(
	array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
	array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
  array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
  array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 3)
);

/*
echo '<pre>';
print_r($usuarios);
echo '</pre>';
*/

foreach($usuarios_app as $user){
	if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
		$usuario_autenticado = true;
    $usuario_id = $user['id'];
    $usuario_perfil_id = $user['perfil_id'];
	}
}

if($usuario_autenticado){
	echo 'Usuário autenticado';
    $_SESSION['autenticacao'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
}else{
    $_SESSION['autenticacao'] = 'NAO';
	header('Location: index.php?login=erro');
}

?>