// update.php
<?php
header('Content-Type: application/json');
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->Id_siswa) && isset($data->Nama) && isset($data->Umur) && isset($data->Email) && isset($data->Kelas) && isset($data->Alamat) && isset($data->Deskripsi)) {
    $id_siswa = $data->Id_siswa;
    $nama = $data->Nama;
    $umur = $data->Umur;
    $email = $data->Email;
    $kelas = $data->Kelas;
    $alamat = $data->Alamat;
    $deskripsi = $data->Deskripsi;

    $sql = "UPDATE t_siswa SET Nama='$nama', Umur=$umur, Email='$email', Kelas='$kelas', Alamat='$alamat', Deskripsi='$deskripsi' WHERE Id_siswa=$id_siswa";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data siswa berhasil diupdate"]);
    } else {
        echo json_encode(["message" => "Gagal mengupdate data siswa"]);
    }
} else {
    echo json_encode(["message" => "Data tidak lengkap"]);
}
?>
