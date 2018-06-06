<?php
	include "head.php"; ?>
	<h2>Форма регистрации адреса</h2>
	Для регистрации заполните, пожалуйста, форму.<br/>
	<form method="get" action="fill.php" onSubmit="return overify ()">
		<div>
			Фамилия, имя, отчество*:				
			<input type="text" name="SNP" placeholder="Введите имя" required/>
		</div>	
		<div>					
			Email*:				
			<input type="email" name="email" placeholder="Введите e-mail" required/>	
		</div>					
		<div>				
			Область*:
			<select data-placeholder="Выберите область..." class="chosen-select" tabindex="-1" id="regions" name="regions">
				<option value=""></option>
				<?php	
					onDB ($result, "t_koatuu_tree");
					while ($row = mysqli_fetch_array ($result))
						if ($row [5] == 1)
							echo "<option value='".$row [0]."'>".$row [2]."</option>"; ?>
			</select>
		</div>
		<div id="dest"></div>
		<input type="submit" value="Подтвердить"/>
		<script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript" charset="utf-8"></script>
		<script language="javascript">
			function validateEmail ($email)
			{
				var emailReg = /^.+@.+$/;
				return emailReg.test ($email);
			}
			function overify ()
			{
				if ($("input[name='SNP']").val () == "")
				{
					alert ("Вы не ввели инициалы!");
					return false;
				}
				if ($("input[name='email']").val () == "")
				{
					alert ("Вы не ввели email!");
					return false;
				}
				
				if (!validateEmail ($("input[name='email']").val ()))
				{
					alert ("Некорректный e-mail!");
					return false;
				}
				if ($("#regions").val () == "")
				{
					alert ("Вы не выбрали область проживания!");
					return false;
				}
				if ((!$("*").is("#towns")) || ($("#towns").val () == ""))
				{
					alert ("Вы не выбрали город проживания!");
					return false;
				}
				if ($("*").is("#town_regions") && ($("#town_regions").val () == 0))
				{
					alert ("Вы не выбрали район города проживания!");
					return false;
				}
				return true;
			}
			$(document).ready
			(
				function ()
				{
					$("#regions").chosen ();
					if ($("*").is("#town_regions"))
						$("#town_regions").chosen ();
				}
			);
		</script>
		<script src="chosen.jquery.js" type="text/javascript"></script>
		<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
		<script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>		
	</form>
	<small>* Звёздочкой помечены поля, обязательные для заполнения</small>
	</body>
	</html>
