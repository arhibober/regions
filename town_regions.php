<?php
	if ($_GET ["ind1"] > 0)
	{
		$i = 0;		
		onDB ($result, "t_koatuu_tree");
		while ($row = mysqli_fetch_array ($result))
			if (($row [1] == $_GET ["ind1"]) && ($row [4] == 3))
				$i++;
		if ($i > 0)
		{
			echo "<div>
					Район *:
					<select data-placeholder='Выберите район города...' class='chosen-select' tabindex='-1' name='town_regions' size='1' id='town_regions' onChange='SubmitForm ()'>
						<option value=''></option>";
						onDB ($result, "t_koatuu_tree");
						while ($row = mysqli_fetch_array ($result))
							if (($row [1] == $_GET ["ind1"]) && ($row [4] == 3))
								echo "<option value='".$row [0]."'>".$row [2]."</option>";
					echo "</select>
					</div>
					<script language='javascript'>
						$('#town_regions').chosen ();
					</script>";
		}
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