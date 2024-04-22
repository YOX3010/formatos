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

// class Conexion
// {

// 	static public function conectar()
// 	{

// 		$link = new PDO(
// 			"mysql:host=tamesisper;dbname=tamesisper_formatos",
// 			"tamesisper_alberto",
// 			"T93R58HveELpKkZ"
// 		);

// 		$link->exec("set names utf8");

// 		return $link;
// 	}
// }
