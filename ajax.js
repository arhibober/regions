$("#regions").on
	(
		"change",
		function ()
		{
			$("#dest").text ("Подождите, пожалуйста, данные загружаются...");
			$("#dest").load ("towns.php?ind=" + $(this).val ());
		}
	);