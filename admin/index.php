<?php
include 'header.php';
?>

<?php
$a = mysqli_query($koneksi, "select * from buku");
?>

<div class="col-md-10">
    <h3>
        <center>Selamat Datang
    </h3>
    </center>
    <h3>
        <center>di
    </h3>
    </center>
    <h3>
        <marquee>PERPUSTAKAAN ONLINE
    </h3>
    </marquee>
</div>

<!-- kalender -->
<div class="pull-right">
    <div id="kalender"></div>
</div>

<?php
include 'footer.php';

?>