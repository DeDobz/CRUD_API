// create.php
<?php
header('Content-Type: application/json');
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->Nama) && isset($data->Umur) && isset($data->Email) && isset($data->Kelas) && isset($data->Alamat) && isset($data->Deskripsi)) {
    $nama = $data->Nama;
    $umur = $data->Umur;
    $email = $data->Email;
    $kelas = $data->Kelas;
    $alamat = $data->Alamat;
    $deskripsi = $data->Deskripsi;

    $sql = "INSERT INTO t_siswa (Nama, Umur, Email, Kelas, Alamat, Deskripsi) VALUES ('$nama', $umur, '$email', '$kelas', '$alamat', '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data siswa berhasil ditambahkan"]);
    } else {
        echo json_encode(["message" => "Gagal menambahkan data siswa"]);
    }
} else {
    echo json_encode(["message" => "Data tidak lengkap"]);
}
?>
