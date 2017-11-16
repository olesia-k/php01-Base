<?php
	require_once('templates/top.php');

	if (isset($_GET['url'])) {
		$url = $_GET['url']; // Если урл не существует показать ошибку
	} else {
		$url = 'index'; // Иначе загрузить страницу привествия. 
	}

	$query =	"SELECT * FROM mains
				WHERE url = '$url'";
	$adr = mysqli_query($db_con, $query); // Подготовленные запрос пропускаем через функцию
	if (!$adr) { // Проверяем, что созданная переменная существует
		exit($query);
	}

	$tbl_mains = mysqli_fetch_array($adr); // Получает переменную, обрабатывает и на выходе выдает массив с индексами/полями из таблицы БД (например, с урлами всех статичных страниц)

	// echo '<pre>'; // Открывающий и закрывающий тег для print_r
	// 	print_r($tbl_mains);
	// echo '</pre>';
?>
	
<div class="container">
	<h1>
		<?=$tbl_mains['name'];?>
	</h1>

</div>   

<?php require_once('templates/bottom.php') ?>


