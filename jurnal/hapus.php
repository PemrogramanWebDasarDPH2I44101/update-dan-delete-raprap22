<?php
include("koneksi.php");
if (isset($_GET['id'])) {
$id = $_GET['id'];
$query = $conn -> prepare("DELETE FROM tb_siswa WHERE id = $id");
$query -> execute();
if ($query) {
?>
<script>
alert("Data Berhasil terhapus..!");
location = "ouput.php";
</script>
<?php
} else {
?>
<script>
alert("Data gagal terhapus..!");
location = "ouput.php";
</script>
<?php
}
}
?>