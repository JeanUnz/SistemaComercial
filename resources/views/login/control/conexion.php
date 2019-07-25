<?php
class bd {
	// // $db='tec';
	// $con=mysql_connect('localhost','root','','tec') or die('Problema con la conexion');
	// mysql_select_db($db,$con)or die('Problema con la base de datos');
	// if($con){
	// 	echo "conectado";
	// }
 public function conectar(){
	$Base = mysqli_connect(
		'localhost',
		'root',
		'',
		'tec'
	  ) or die(mysqli_erro($mysqli));
	  if($Base){
		  echo "Conecto";
	  }
	  return $Base;
  
  
}
}
?>