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

//usuarios do sistema
$usuarios_app = array(
	array('email' => 'adm@teste.com.br', 'senha' => '123456'),
	array('email' => 'user@teste.com.br', 'senha' => 'abcd')
);

//verifica a autenticacao
$usuario_autenticado = false;

/*
echo '<pre>';
print_r($usuarios);
echo '</pre>';
*/

foreach($usuarios_app as $user){
	if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
		$usuario_autenticado = true;
	}
}

if($usuario_autenticado){
	echo 'Usuário autenticado';
    $_SESSION['autenticacao'] = 'SIM';
    header('Location: home.php');
}else{
    $_SESSION['autenticacao'] = 'NAO';
	header('Location: index.php?login=erro');
}

?>