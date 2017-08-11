<?php
$conn = mysqli_connect('localhost', 'root', '', 'sams');

if (mysqli_errno($conn)) {
	mysqli_error($conn);
	exit;
}

mysqli_set_charset($conn, 'utf8');