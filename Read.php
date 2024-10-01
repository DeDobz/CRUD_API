// Read.php
<?php
header('Content-Type: application/json');
include 'db.php';

// Cek jika Id_siswa ada di query string
if (isset($_GET['Id_siswa'])) {
    $id_siswa = $_GET['Id_siswa'];
    
    // Query berdasarkan Id_siswa
    $sql = "SELECT * FROM t_siswa WHERE Id_siswa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_siswa);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $siswa = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $siswa[] = $row;
        }
        echo json_encode($siswa);
    } else {
        echo json_encode(["message" => "Tidak ada data siswa"]);
    }
} else {
    echo json_encode(["message" => "Id_siswa tidak ditemukan"]);
}
?>
