<?php 
$data;
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $data = $_GET['nama'];
}
else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['nama'];
}
echo $data;
?>