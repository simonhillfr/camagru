<!DOCTYPE html>
<html>
<body>
<?php 
require_once 'config/setup.php';
require_once 'tools/database_operations.php';


echo "Latests pics :";
$sql = "SELECT path FROM pictures 
	WHERE user_id='".$_SESSION["user_id"]."'
	ORDER BY timestamp DESC";
$pic = db_array_fetchAll($sql);
if ($pic)
{
	/*$k = 0;
	while ($k < 5)
	{
		if (isset($pic[''.$k.''][0])) {
			echo "	<img src='".$pic[''.$k.'']['0']."' width='80%' \>";
			echo "	<form action='./?page=create' method='post' >
			<button class='delbtn' id='delbtn".$k."' type='submit' name='img_delete' value='";
			echo $pic[''.$k.''][0];
			echo "'	></button></form>";
		}
		$k++;
	}*/
}
else
	echo "db error";

?>
</body>
</html>
