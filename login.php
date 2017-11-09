<?php 
	require_once('templates/top.php'); 

	if ($_POST) { // Если пользователь нажал на кнопку button, т.е. данные были отправлены с любой страницы, то срабатывает POST
		
		$p_email = $_POST['email'];
		$p_password = $_POST['password'];	

		$errors = array(); // По умолчанию ошибок нет. Срабатывает. когда поле не заполнено. 

		

		if (!$p_email) { 
			$errors[] = 'Поле email не заполненно';
		}

		if (!$p_password) { 
			$errors[] = 'Поле password не заполненно';
		}

		

		$query = 	"SELECT * FROM users WHERE email = '$p_email'
					AND password = '$p_password'";
		// echo "$query"; // Выводим ошибку
		$adr = mysqli_query($db_con, $query);
			if (!$adr) {
				exit($query);
			}
		$user = mysqli_fetch_array($adr);
		if (empty($user)) {
			$errors[] = 'Ошибка входа';
		}


		if (!empty($errors)) { 

			foreach ($errors as $error) {
				echo "<div class='error red' style='color:red'>";
				echo $error;
				echo "</div>";
			}

		} else { 			
			$_SESSION['user_id'] = $user['id']; // Глабальный массив, который надо подключить. Авторизует пользователя. $_SESSION['user_id'] - переменная, если она есть, пользователь авторизован, если ее нет, то не авторизован. 
		?>
			<script>
				document.location.href="cabinet.php";
			</script>
		<?

		}


	}
?>



	<form method="POST" action="login.php" class="ok-form">

	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
	  </div>

	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>



	<?php require_once('templates/bottom.php') ?>
?>
