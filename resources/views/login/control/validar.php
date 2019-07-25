<?php
include("conexion.php");
if (isset($_POST['login'])) {
	//VARIABLES DEL USUARIO
$usuario = $_POST['txtusuario'];
$pass = $_POST['txtpass'];
//VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
if (empty($usuario) | empty($pass)) 
	{
	header("Location: ../index.html");
	exit();
	}
//VALIDANDO EXISTENCIA DEL USUARIO
$bd = new bd();
$conn= $bd->conectar();
$sql ="SELECT usuario, pass from usuarios where usuario like '$usuario' and pass like '$pass' ";
$result= mysqli_query($conn,$sql);
$row = $result->fetch_row();
    
if ($row[0] == $usuario && $row[1] == $pass){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil.php");
}else
	{
		header("Location: ../index.html");
		exit();
	}
}
mysqli_close($conn);
?>