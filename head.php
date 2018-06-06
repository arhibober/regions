<html>
	<head>
		<title>Форма регистрации адреса</title>
		<meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' http://www.google.com">		
		<link rel="stylesheet" href="docsupport/style.css">
		<link rel="stylesheet" href="docsupport/prism.css">
		<link rel="stylesheet" href="chosen.css">
		<style>
		.clearfix::after {
			content: "\0020";
			display: block;
			height: 0;
			clear: both;
			overflow: hidden;
			visibility: hidden;
		}
		</style>
	</head>
<?php
	connect_to_DB ($conn);	
						
	function onDB (&$result, $table_name)
	{
		connect_to_DB ($conn);
		$result = mysqli_query ($conn, "SELECT * FROM ".$table_name);
		if (!$result)
		{
			echo " Can't select from ".$table_name;
			return;
		}
	}	
  
	function connect_to_DB (&$conn)
	{  
		$conn = mysqli_connect ("localhost:3306", "root", "", "test")
			or die ("Невозможно установить соединение: ".mysqli_error ());
			mysqli_query ($conn, 'SET NAMES "utf8" COLLATE "utf8_general_ci"');
		if (!mysqli_set_charset ($conn, "utf8"))
		{
			echo "Ошибка при загрузке набора символов utf8: ".mysqli_error ($link);
			exit ();
		}
		$database = "artjoker";
		mysqli_select_db ($conn, $database); // выбираем базу данных
	}