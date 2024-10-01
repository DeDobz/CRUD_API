// delete.php
<?php
header('Content-Type: application/json');
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->Id_siswa)) {
    $id_siswa = $data->Id_siswa;

    $sql = "DELETE FROM t_siswa WHERE Id_siswa=$id_siswa";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data siswa berhasil dihapus"]);
    } else {
        echo json_encode(["message" => "Gagal menghapus data siswa"]);
    }
} else {
    echo json_encode(["message" => "ID tidak ditemukan"]);
}
?>
