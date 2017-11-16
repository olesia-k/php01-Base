<?
	require_once('config/config.php');


	$p_url = $_POST['url']; // static.php?url=contacts
	$arr = explode("=", $p_url);

	$query = "SELECT * FROM mains WHERE url = '".$arr[1]."'"; 
	// echo $query;
	

	// echo "sdfsdfdsf";

	$adr = mysqli_query($db_con, $query); 
	if (!$adr) { 
		exit($query);
	}
	$tbl_mains = mysqli_fetch_array($adr);

	echo "<p>".$tbl_mains['name']."</p>";
	echo "<p>".$tbl_mains['body']."</p>";




?>