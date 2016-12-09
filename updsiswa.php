<?php 

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

$id = (isset ($_GET['id'])) ? $_POST['in_nis'];
//$id = $_GET['a'];


if(!is_numeric($id)){
	exit('access forbiden');
}


$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$nation = new nationality();
$data_nation = $nation->readAllNationality();

if(empty($data)){
	exit('access forbiden');
}

$dt = $data[0];


?>

<h1> Edit Data Siswa</h1>
<form action="editsiswa.php" method="post">
	NIS:<br/>
	<input type="text" value ="<?php echo $dt['id_siswa']?>"name="in_nis" readonly="true"><br/>
	Nama Lengkap:<br/>
	<input type="text"value ="<?php echo $dt['full_name']?>"name="in_nis" readonly="true" name="in_name"><br/>
	Email:<br/>
	<input type="text"value ="<?php echo $dt['email']?>"name="in_nis" readonly="true" name="in_email"><br/>
	Kewarganegaraan:<br/>
	<select name="in_nation">
		<option value=""> --pilih negara--</option>
		<?php foreach($data_nation as $n):?>
		<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":""?>
		<option value="<?php echo $n['id_nationality']?>" <?php echo $s?>>
			<?php echo $n['nationality']?>
		</option>
		<?php endforeach?>
	</select><br/>
	<input type="submit" name="kirim" value="simpan">
</form>