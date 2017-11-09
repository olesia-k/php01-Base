<?php 
	require_once('templates/top.php'); 

	if ($_POST) { // Если пользователь нажал на кнопку button, т.е. данные были отправлены с любой страницы, то срабатывает POST
		$p_name = $_POST['name'];
		$p_email = $_POST['email'];
		$p_password = $_POST['password'];
		$p_password_again = $_POST['password_again'];

		$errors = array(); // По умолчанию ошибок нет. Срабатывает. когда поле не заполнено. 

		if (!$p_name) { // Если не существует переменная $_p_name
			$errors[] = 'Поле name не заполненно';
		}

		if (!$p_email) { 
			$errors[] = 'Поле email не заполненно';
		}

		if (!$p_password) { 
			$errors[] = 'Поле password не заполненно';
		}

		if ($p_password != $p_password_again) {
			$errors[] = 'Поля password не совпадают';	
		}

		$query = 'SELECT *FROM users WHERE url = "p_email"'; // Проверка на уникальность пользователей по email
		$adr = (mysqli_query($db_con, $query));
			if (!$adr) {
				exit($query);
			}
		$already_eser = mysqli_fetch_array($adr);
		if (empty($already_user)) {
			$errors[] = 'Такой email уже зарегистрирован в системе'
		}



		if (!empty($errors)) { // Если есть ошибки, то вывести $errors, если нет, то вывести ок
			// echo "<pre>";
			// 	print_r($errors);
			// echo "</pre>";

			foreach ($errors as $error) {
				echo "<div class='error red' style='color:red'>";
				echo $error;
				echo "</div>";
			}


		} else { 
			// echo "ok"; // иначе вывести ок
			$query = "INSERT INTO users VALUES (  
					-- поля прописываются в порядке, как они идут в таблице users БД
				NULL,  
					-- NULL - Глобальная перепенная для поля ID, 
				'$p_name',
				'$p_email',
				'$p_password',
				'unblock',
				NOW(),
				NOW()
			)";
			$adr = (mysqli_query($db_con, $query)); // Соединиться с БД и получать поля из таблицы users
				if (!$adr) {
					exit($query); // если не существует, ввести на экран $query
				}

				?> 
				<script>
					document.location.href = 'login.php'; // Перезагрузка страницу, перенаправление на login.php
				</script>
				<?
		}
	}
?>



	<form method="POST" action="register.php">

	  <div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" id="name" name="name" placeholder="Name">
	  </div>

	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
	  </div>
	  <div class="form-group">
	    <label for="password_again">Password again</label>
	    <input type="password" class="form-control" id="password_again" name="password_again">
	    
	  </div>
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>



	<?php require_once('templates/bottom.php') ?>
?>
