<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <a href="index.php"><button>Tambah</button></a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Option</th>
            </tr>
            <?php
                include("koneksi.php");
                $query = $conn -> prepare("SELECT * FROM data");
                $query -> execute();
                $row = $query -> rowcount();
                if ($row == 0) {
                    ?>
                    <tr>
                        <td colspan="5"><br><h3>Data Kosong</h3><br></td>
                    </tr>
                    <?php
                } else {
                    while($data = $query -> fetch (PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tanggallahir']; ?></td>
                            <td><a href="edit.php<?php echo $data['id'];?>">Edit</a> | <a href="delete.php?id=<?php echo $data['id'];?>" onclick="return confirm('Apakah anda ingin menghapus ?');">Hapus</a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </body>
</html>