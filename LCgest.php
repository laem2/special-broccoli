<?php
include 'config.php';

if (isset($_GET['dt_id'])) {
    $dt_id = intval($_GET['dt_id']);

    $sql = "SELECT lc.lc_date, lc.lc_num,
    dt.dt_code, dt.dt_design
FROM liste_consommations lc 
INNER JOIN demande_travail dt ON lc.dt_id = dt.dt_id
WHERE lc.dt_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dt_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "Invalid request. No demande de travail ID provided.";
    exit();
}

// Check if there are any rows in the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['lc_date']}</td>
                <td>{$row['lc_num']}</td>
                <td>{$row['dt_code']}</td>
                <td>{$row['dt_design']}</td>
                <td><a>view</a></td>
                <td><img src='imgg/mdi--trash.svg' alt='trash' class='trash-icon'> 
                <td><img src='imgg/mdi--printer.svg' alt='printer' class='print-icon'>
                <img src='imgg/mdi--eye.svg' alt='eye'>
                <img src='imgg/mdi--pencil.svg' alt='pencil'> <td>
              </tr>";
    }
} 
$stmt->close();
$conn->close();
?>