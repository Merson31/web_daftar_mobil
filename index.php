<?php
include 'proses.php';
$proses = new Proses();
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstraps CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" 
    rel="stylesheet">

    <title>Daftar Mobil Terbaru</title>

    <style>
         #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

    </style>    

</head>
<body>
    <div>
        <video id="bg-video" autoplay muted loop>
            <source src="bg_video_mobil.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container mt-5">
        <center><h1 class="lead text-light" style="font-family: 'Holtwood One SC', serif; font-weight: bold; font-size: 60px"></h1></center>
        <br>
        <a href="form_tambah.php" type="button" class="btn btn-warning">Tambah Data</a><br><br>
        <table class='table table-light table-striped' id='example' style="opacity: 0.8;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Merek Mobil</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $hasil = $proses->tampil_data();
                    if (!empty($hasil)) {
                        foreach ($hasil as $data) :
                ?>
                <tr>
                    <td class="align-middle"><?= $no++; ?></td>
                    <td class="align-middle"><?= $data->nama_mobil; ?></td>
                    <td class="align-middle"><?= $data->harga; ?></td>
                    <td class="align-middle"><img src="file_gambar/<?= $data->gambar; ?>" style="width: 150px; height: 100px;"></td>
                    <td class="align-middle">
                        <a href="form_ubah.php?id=<?= $data->id; ?>" type="button" class="btn btn-primary" style="width: 70px;">Edit</a>
                        <a href="hapus.php?id=<?= $data->id; ?>" type="button" class="btn btn-danger" style="width: 70px;">Hapus</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                }
                else
                ?>
            </tbody>
        </table>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>

        <!-- Script GSAP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
        <script>
            gsap.registerPlugin(TextPlugin);
            gsap.to('.lead', {duration: 1.8, text: 'Daftar Mobil'});
        </script>
    </div>
</body>
</html>