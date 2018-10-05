<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php echo $data['nama'];?>
        <a href="output.php"><button>Back</button></a>
        <form method="POST">
                Nama      : <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br>
                NIM       : <input type="text" name="nim" pattern="\d*" maxlength="10" value="<?php echo $data['nim']; ?>" required><br>
                Tgl Lahir : <input type="date" name="tanggallahir" value="<?php echo $data['tanggallahir']; ?>" required><br>
                            <input type="submit" value="Ubah">
        </form>
    </body>
</html>
<?php
    include("koneksi.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $pdo -> prepare("SELECT * FROM data WHERE id = $id");
        $query -> execute();
        $row = $query -> rowcount();
        $data = $query -> fetch (PDO::FETCH_ASSOC);
    } else {
        header("Location: output.php");
    }


    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $tgl_lahir = $_POST['tanggallahir'];
        $query = $pdo -> prepare("UPDATE data SET nama = '$nama', nim = '$nim', tanggallahir = '$tanggallahir' WHERE id = '$id' ");
        $query -> execute();
        if ($query) {
            ?>
            <script>
                alert("Data Diubah");
                location = "koneksi.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data Gagal Diubah");
                location = "koneksi.php";
            </script>
            <?php
        }
    }
?>
