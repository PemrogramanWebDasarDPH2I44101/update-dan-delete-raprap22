<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <form method="post">            
                Nama      : <input type="text" name="nama" required><br>
                Nim       : <input type="text" name="nim"  maxlength="10" required><br>
                Tgl Lahir : <input type="date" name="tanggallahir" required><br>
                            <input type="submit" value="Submit"> <input type="reset" value="Reset">
        </form>
    </body>
</html>
<?php
    include("koneksi.php");
    if (isset($_POST['nama'])) {
        $nama = addslashes($_POST['nama']);
        $nim = $_POST['nim'];
        $tgl_lahir = $_POST['tanggallahir'];
        $query = $conn -> prepare("INSERT INTO data(nama, nim, tanggallahir) VALUE ('$nama','$nim','$tanggallahir')");
        $query -> execute();
        if ($query) {
            ?>
            <script>
                alert("Data berhasil tersimpan");
                location = "output.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data tidak tersimpan");
            </script>
            <?php
        }
    }
?>