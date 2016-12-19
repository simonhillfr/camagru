<?php
session_start();
require_once "model/Feed_Gallery.php";

if (isset($_POST["submit_like"]))
{
	$error = array();
	if (!$_POST["like_status"] || !$_POST["pic_id"])
		array_push($error, "Cannot send empty content");
	if (isset($_SESSION["user_id"]) === false)
		array_push($error, "Please login to like pictures");
	if (!$error)
	{
		$db = new Connection();
		$pic_id = $_POST["pic_id"];
		$user_id = intval($_SESSION["user_id"]);
		if ($_POST["like_status"] === "cleared")
		{
			$sql = "
			INSERT INTO likes (pic_id, user_id)
			VALUES ('".$pic_id."', '".$user_id."')
			";
		}
		else if ($_POST["like_status"] === "set")
		{
			$sql = "
			DELETE FROM likes WHERE likes.user_id='".$user_id."'
			";
		}
		
		
		if (!($db->simplequery($sql)))
			array_push($error, "SQL request error");
	}
	if ($error)
		print_r($error);
	else
		header("Location: http://localhost:8080/camagru/");
}


?>