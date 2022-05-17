<?php
	include 'backend/Question.php';
	$qc = new Question();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$check = $qc->checker($_POST);
		echo json_encode($check);
	}
?>