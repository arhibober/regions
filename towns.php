<?php
	if ($_GET ["ind"] > 0)
	{
		echo "<div>
				Город *:
				<select data-placeholder='Выберите город...' class='chosen-select' tabindex='-1' name='towns' size='1' id='towns'>
					<option value=''></option>";
					onDB ($result, "t_koatuu_tree");
					while ($row = mysqli_fetch_array ($result))
						if ($row [1] == $_GET ["ind"])
						{
							if ($row [4] != 2)
								echo "<option value='".$row [0]."'>".$row [2]."</option>";
								onDB ($result1, "t_koatuu_tree");
								while ($row1 = mysqli_fetch_array ($result1))
									if (($row1 [1] == $row [0]) && ($row1 [4] != 3))
										echo "<option value='".$row1 [0]."'>".$row1 [2]."</option>";
						}
						echo "</select>
						</div>
						<div id='dest1'></div>
						<script language='javascript'>
							$('#towns').chosen ();	
							$('#towns').on
							(
								'change',
								function ()
								{
									$('#dest1').text ('Подождите, пожалуйста, данные загружаются...');
									$('#dest1').load ('town_regions.php?ind1=' + $(this).val ());
								}
							);
						</script>";
	}
						
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
?>