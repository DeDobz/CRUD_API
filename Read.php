// read.php
<?php
header('Content-Type: application/json');
include 'db.php';

$sql = "SELECT * FROM t_siswa";
$result = $conn->query($sql);

$siswa = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $siswa[] = $row;
    }
    echo json_encode($siswa);
} else {
    echo json_encode(["message" => "Tidak ada data siswa"]);
}
?>
