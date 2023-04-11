<?php 

$serverKey = 'SB-Mid-server-c7_EscbBMVroRhJeGTStknXi';
$orderId = $_POST['order_id'];
$statusCode = $_POST['status_code'];
$grossAmount = $_POST['gross_amount'];

$hashed = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

if($hashed == $_POST['signature_key']) {
    if($_POST['transaction_status'] == 'capture') {
        $conn = mysqli_connect('localhost', 'root', '', 'ramadhan_card');
        $setStatus = "UPDATE donation SET status='paid' WHERE id='$orderId'";
        $conn->query($setStatus);
    }
}

?>