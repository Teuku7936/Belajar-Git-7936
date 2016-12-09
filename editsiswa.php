<?php

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	if (!isset($_POST['kirim'])) {
		exit('Access Forbiden');
	}

	$siswa = new siswa();

	$data['input_name'] = $_POST['in_name'];
	$data['input_email'] = $_POST['in_email'];
	$data['input_nationality'] = $_POST['in_nation'];
	$data['foto'] = "";

	$siswa->UpdateSiswa($_POST['in_nis'], data);

	echo "Data Siswa Berhasil di update <br />";
	echo "<a href='d_siswa.php?a=".$_POST['in_nis']."'>Detail Siswa</a>"
?>