<?php

	require_once 'includes/config.php';

	//if not logged in redirect to login page
	if(!$user->is_logged_in()){ header('Location: index.php'); }

	$me =  $_SESSION['username'];

	$doctorTab = "SELECT * FROM doctor WHERE username LIKE '%{$me}%' ORDER BY doctordate DESC, doctortime DESC";

	$stmt = $db->prepare($doctorTab);
	$stmt->execute();

	$userData = array();

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

		$userData['Doctor'][] = $row;

	}

	echo json_encode($userData);

?>
