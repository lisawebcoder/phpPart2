<?php
$db_host="localhost"; //localhost server 
#$db_user="root";	//database username
//dec18th2022--add examUser
$db_user="examUser";	//database username
$db_password="hello";	//database password   
$db_name="php_pdo_login_db";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



