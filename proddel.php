<?
	require_once('config/config.php'); // чтобы работать с запросами к БД

	if ($_SESSION['user_id']) {

		if ($_GET['id']) {
			$id = (int)$_GET['id']; // Проверка, что id это число
		} else {
			$id = 0;
		}

		$query = "SELECT * FROM products WHERE id = $id"; 
		$adr = mysqli_query($db_con, $query);
		if (!$adr) {
			exit('error');
		}
		$pic = mysqli_fetch_array($adr);
		if($pic['picture']) {
			$file = '/upload/'.$pic['picture'];
			// echo $file; // вывод пути файла
			if (file_exists($file)) {  // функция принимает файл, если есть, то true, если нет, то false
				@unlink($file); // функция удаления файлов, @ перед функцией подавляет вывод ошибки этой функции. 
			}
		}

		$query = "DELETE FROM products WHERE id = $id AND user_id = ".$_SESSION['user_id']; // переменная удаления
		$adr = mysqli_query($db_con, $query);
		if(!$adr) {
			exit('error');
		}
	}
	
	?>
		<script>
			document.location.href = "cabinet.php"; // Перенаправление обратно на страницу после удаления строки из БД
		</script>
	<?	

?>