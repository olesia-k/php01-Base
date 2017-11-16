<?php
	require_once('templates/top.php'); ?>


<?	
	$scripts = ['js/parse.js'];
	if ($_SESSION['user_id']) { ?>
		<a href="#" id="google_click">Клик в гугле</a>
		<div id="empty"></div> 
<?	} 

	if(!empty($scripts)) {
		foreach($scripts as $script) {
?>
			<script src="<?=$script?>"></script>
<?			
		}
	}


?>

	
?>
<?php require_once('templates/bottom.php') ?>
?>

