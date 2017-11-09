<?

session_start();

$title = 'Заголовок сайта';
$description = 'Описание сайта';
$keywords = 'не актуально';
$email = 'name@mail.com';
$autor = 'Имя автора';



$db_location = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ok-bd';
$db_con = mysqli_connect($db_location,
						$db_user,
						$db_pass,
						$db_name); 


if (!$db_con){
	exit('Error');
}

?>

