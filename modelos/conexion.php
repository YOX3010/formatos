<?php

class Conexion
{

	static public function conectar()
	{

		$link = new PDO(
			"mysql:host=localhost;dbname=tamesis",
			"root",
			""
		);

		$link->exec("set names utf8");

		return $link;
	}
}

// class Conexion{

// 	static public function conectar(){

// 		$link = new PDO("mysql:host=localhost;dbname=autotex_system",
// 			            "autotex_admin",
// 			            "*Autotex2024.,");

// 		$link->exec("set names utf8");

// 		return $link;


// 	}

// }