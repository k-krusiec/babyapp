<?php

	require_once 'includes/config.php';

	//if not logged in redirect to login page
	if(!$user->is_logged_in()){ header('Location: index.php'); }

	$weightTab = "SELECT * FROM weight ORDER BY weightdate DESC";

	$stmt = $db->prepare($weightTab);
	$stmt->execute();

	$userData = array();

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

		$userData['Weight'][] = $row;

	}

	echo json_encode($userData);

?>