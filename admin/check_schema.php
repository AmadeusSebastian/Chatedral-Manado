<?php
require_once 'includes/db_connect.php';

echo "=== Schema tbl_pengumuman ===\n";
$res = $conn->query("DESCRIBE tbl_pengumuman");
if ($res) {
    while($row = $res->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Error: " . $conn->error . "\n";
}

echo "=== Schema tbl_liturgi ===\n";
$res2 = $conn->query("DESCRIBE tbl_liturgi");
if ($res2) {
    while($row = $res2->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Error: " . $conn->error . "\n";
}
