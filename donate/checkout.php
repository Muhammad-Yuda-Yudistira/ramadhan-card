<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'ramadhan_card');

    $name = $_POST['name'];
    $nominal = $_POST['nominal'];
    $status = 'unpaid';

    $sql = "INSERT INTO donation VALUE('','$name','$nominal','$status')";

    if ($conn->query($sql)) {
        echo "New record created successfully";

        $cari = "SELECT * FROM donation WHERE name = '$name'";
        $result = $conn->query($cari);
        var_dump($result);

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'Mid-server-hr_Tv6DdX2Xb4ppiAvfTHDoG';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $_POST['id'],
        //         'gross_amount' => 10000,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => 'budi',
        //         'last_name' => 'pratama',
        //         'email' => 'budi.pra@example.com',
        //         'phone' => '08111222333',
        //     ),
        // );
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>