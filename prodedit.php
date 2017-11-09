<?php require_once('templates/top.php'); 

	if ($_GET['id']) {
		$id = (int)$_GET['id'];
	} else {
		$id = 0;
	}
	$user_id = (int)$_SESSION['user_id'];
	$query = "SELECT * FROM products WHERE id = $id AND user_id = $user_id"; // переменная удаления
	// echo $query;
	$adr = mysqli_query($db_con, $query);
	if(!$adr) {
		exit('error');
	}
	$product = mysqli_fetch_array($adr);

	if ($_SESION)  {
		if ($_POST) {
			if ($_FILES) {
				// Удалить картинку код из proddel.php
				//  загрузить новую код из cabinet.php
				$picture = $_FILES['picture']['name'];
			} else {
				$picture = '';
			}
		}

		$query = "UPDATE products SET name='$pname', body='$pbody' WHERE id = $id AND user_id = $user_id";

		$query = "SELECT * FROM catalogs";
		$adr = mysqli_query($db_con, $query);
		if(!$adr) {
			exit('error');
		}
		?>
			<script>
				document.location.href='prodedit.php?id=<? echo $id?>'
			</script>
		<?
	}

?>

	<form action="prodedit.php?id=<? echo $id ?>" method="post" enctype="multipart/form-data">
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
								<option <? if($product['catalog_id'] == $cats['id'])echo'selected';	?> value="<? echo $cats['id']?>"><? echo $cats['name']?></option>
							<?
						}
					?>

				</select>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
	</form>


<?php require_once ('templates/bottom.php')?>