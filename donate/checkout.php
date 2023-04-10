<?php 
    require_once  "../modules/midtransPhpMaster/Midtrans.php";

    $conn = mysqli_connect('localhost', 'root', '', 'ramadhan_card');

    $name = $_POST['name'];
    $nominal = $_POST['nominal'];
    $status = 'unpaid';

    $sql = "INSERT INTO donation VALUE('','$name','$nominal','$status')";

    if ($conn->query($sql)) {
        echo "New record created successfully<br>";

        $cari = "SELECT * FROM donation WHERE name='$name'";
        $result = $conn->query($cari);
        $result = mysqli_fetch_assoc($result);
        // var_dump($result['id']);
        $id = $result['id'];

       header("location:./../modules/midtransPhpMaster/examples/snap/checkout-process-simple-version.php?order_id=$id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>