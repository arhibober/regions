<?php
	include "head.php";
	onDB ($result, "t_koatuu_tree");
	while ($row = mysqli_fetch_array ($result))
		if (array_key_exists ("town_regions", $_GET))
		{
			if ($row [0] == $_GET ["town_regions"])
				$address = $row [3];
		}
		else			
			if ($row [0] == $_GET ["towns"])
				$address = $row [3];
	$i = 0;
	onDB ($result, "people");
	while ($row = mysqli_fetch_array ($result))
		if ($row [2] == $_GET ["email"])
		{
			$i++;
			echo "Данный email уже задействован в базе у пользователя<br/>
			<table>
				<tr>
					<td>
						Имя:
					</td>
					<td>".
						$row [1].
					"</td>
				</tr>
				<tr>
					<td>
						email:
					</td>
					<td>".
						$row [2].
					"</td>
				</tr>
				<tr>
					<td>
						Адрес:
					</td>
					<td>".
						$row [3].
					"</td>
				</tr>
			</table>
			Пожалуйста, вернитесь и зарегистрируйтесь под другим email.";
		}
	if ($i == 0)
		toDB ($_GET ["SNP"], $_GET ["email"], $address);
	echo "</body>
	</html>";

	function toDB ($name, $email, $territory)
	{
		connect_to_DB ($conn);
		$result = mysqli_query ($conn, "INSERT INTO PEOPLE VALUES(NULL, '".$name."', '".$email."', '".$territory."')");
		if (!$result)
		{
			echo "Can't insert into PEOPLE";
			return;
		}
		echo "<p>
		Информация о человеке успешно загружена.
		</p>";
	}
 ?>