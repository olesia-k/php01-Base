<?php require_once('templates/top.php');

	if($_SESSION['user_id']){
		
		if($_POST){
			// echo "<pre>";
			// 	print_r($_POST);
			// echo "<pre>";

			$pname = $_POST['name']; // Поле name в БД 
			$pbody = $_POST['body']; // Поле body в БД
			$catalog_id = (int)$_POST['catalog_id'];

			if($_FILES){
				// echo "<pre>";
				// 	phprint_r($_FILES);
				// echo "<pre>";
				$file_name_tmp = $_FILES['picture']['tmp_name']; // Используется для вставки в папку uploud
				$dir = '/upload/'; // Путь к папке для сохранения файлов
				$file_new_name = $_SERVER['DOCUMENT_ROOT'].$dir; // работает, если /upload/ прописан со слешем вначале и в конце. $_SERVER['DOCUMENT_ROOT'] содержит домен.
				// $picture = $_FILES['picture']['name'] // Имя загружаемого файла
				$picture = date('y-m_d_h_i_s').'.jpg'; // Имя загружаемого файла с датой и расширением, чтобы файлы с одним именем не перезаписывались.

				if (move_uploaded_file($file_name_tmp, $file_new_name.$picture)) { // функция move_uploaded_file() загружает файл - параметры функции 1. откуда, 2. куда. Проверка: если файл с параметрами загружен, то вернуть true.
					$ok = true;


				} else {
					$picture = ''; // Что вставляется в БД, когда файл не выбран. 
						echo "no file";
				}

			} else {
				echo "no file";
			} 

			// $query = "INSERT INTO products VALUES(  // Переменная query содержит запрос обращения к таблице в БД. 
			// 	NULL,
			// 	'$pname', // Поле name в БД
			// 	'$pbody', // Поле name в БД
			// 	'$picture' // Поле picture в БД
			// 	'-', // Поле price в БД
			// 	0, // Поле vip в БД
			// 	NOW(), // Поле putdate в БД. Функция myQL, добавляет текущую дату
			// 	'-', // Поле url в БД, прочерк, т.к. не знаем значение. 
			// 	'".date('ymdhis')."',  // Поле product_code в БД, уникальное значение с датой
			// 	'new' // Поле status в БД
			// 	0, // Поле catalog-id в БД
			// 	".$_SESSION['user_id']." // Поле user_id в БД
			// )";

			// $adr = mysqli_query($db_con, $query);
			// if (!$adr) {
			// 	exit($query);
			// } 

			$query = "INSERT INTO products VALUES(   
				NULL,
				'$pname', 
				'$pbody', 
				'$picture',
				'-', 
				0, 
				NOW(), 
				'-',  
				'".date('ymdhis')."',  
				'new',
				$catalog_id,				
				".$_SESSION['user_id']." 
			)";

			$adr = mysqli_query($db_con, $query);
			if (!$adr) {
				exit($query);
			} 

			?>
				<script>
					document.location.href="cabinet.php";
				</script>
			<?

		}
	?>

	<form action="cabinet.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
		    <label for="name">Имя</label>
		    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<? echo $product['name']; ?>">
		</div>
		<div class="form-group">
		    <label for="body">Описание</label>
		 	<textarea name="body"><? echo $product['name']; ?></textarea>			
		 </div>

		 <div class="form-group">
		    <label for="price">Цена</label>
		    <input type="text" class="form-control" name="price" id="price" placeholder="price" value="<? echo $product['price']; ?>">
		</div>

		 <div class="form-group">
			<label for="file">Картинка</label>
		    <input type="file" id="picture" name="picture">		    
		  </div>
		  <div class="form-group">
		  <label for="picture">Категория</label>
				<select class="form-control" name="catalog_id">
					
					<?
						$query = "SELECT * FROM catalogs";
						$adr = mysqli_query($db_con, $query);
						if(!$adr) {
							exit('error');
						}
						while ($cats = mysqli_fetch_array($adr)) {
							?>
								<option value="<? echo $cats['id']?>"><? echo $cats['name']?></option>
							<?
						}
					?>

				</select>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
	</form>

	<table width=100% class="table table table-border">
		<tr>
			<th>Фото</th>
			<th>Имя</th>
			<th>Цена</th>
			<th>Действие</th>			
		</tr>
		<?
			$query = "SELECT * FROM products WHERE user_id=".$_SESSION['user_id'];

			$adr = mysqli_query($db_con, $query);
			if(!$adr) {
				exit('error');				
			} 
			while ($prod = mysqli_fetch_array($adr)) {
				?>
					<tr>
						<td width="200px">
							<?
								if ($prod['picture'] !='') {
									$pic = '/upload/'.$prod['picture']; // Путь, где лежат картинки
								} else {
									$pic = '/upload/empty.jpg'; // iconsearch.ru - иконки
								}
								$id = (int)$prod['id'];
							?>
							<img src="<? echo $pic; ?>" width="100%">
						</td>
						<td>
							<?
								echo $prod['name'];
							?>
						</td>
						<td>
							<?
								echo $prod['price'];
							?>
						</td>
						<td class="action">
							<a href="/prodedit.php?id=<? echo $id; ?>" class="btn btn-success btn-block edit">Редактировать</a>
							<a href="#" class="btn btn-warning btn-block edit" onClick="delete_position('proddel.php?id=<? echo $id ?>', 'Удалить товар?')" class="delete">Удалить</a>
						</td>			
					</tr>


				<?
			}
		?>
		
	</table>
	
	<?
	
	}else{
		?>
			<div class="error">Error exit</div>
		<?	
	}
	?>


<?php require_once ('templates/bottom.php')?>