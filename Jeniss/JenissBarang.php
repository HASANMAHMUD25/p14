<?php 
    require_once '../models/dbkoneksi.php';
    require_once 'class_produk.php';

    // tangkap request element form
    $nama = $_POST['nama'];
    $id = $_POST['id'];

    // Menyimpan data diatas ke sebuah array
    $data = [
        $id,    // ? 1
        $nama,  // ? 2
    ];

    // proses
    $obj = new Produk($dbh);
    //$obj->simpan($data);
     //proses edit & hapus
     switch ($tombol) {
        case 'simpan';
            $obj->simpan($data);
            break;
        case 'ubah';
            $data[] = $_POST['idx']; //tangkap hidden field u/ ? ke-8
            $obj->ubah($data);
            break;
        case 'hapus';
        $id[] = $_POST['idx']; //tangkap ke-1 where id=?
        $obj->hapus($id);
        break;  
        default://tombol batal
        header('Location:http://localhost/belajar_php/crud_1/index.php?hal=DataBarang');
            break;
    }


    // Landing Page
    header('Location://localhost/belajar_php/crud_1/index.php');

?>