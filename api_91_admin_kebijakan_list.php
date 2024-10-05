// Read.php
<?php
header('Content-Type: application/json');
include 'db.php';

// Cek jika Id_siswa ada di query string
if (isset($_GET['id_information'])) {
    $id_information = $_GET['id_information'];
    
    // Query berdasarkan id_information
    $sql = "SELECT * FROM t_kebijakan WHERE id_information = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_information);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $information = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $information[] = $row;
        }
        echo json_encode($information);
    } else {
        echo json_encode(["message" => "Tidak ada data information"]);
    }
} else {
    echo json_encode(["message" => "id_information tidak ditemukan"]);
}
?>
