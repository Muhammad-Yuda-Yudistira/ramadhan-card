<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

use mysqli;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-c7_EscbBMVroRhJeGTStknXi';
Config::$clientKey = 'SB-Mid-client-Ud8oPk2GSgy5dMlp';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// my data information
$order_id = $_GET['order_id'];
$conn = mysqli_connect('localhost', 'root', '', 'ramadhan_card');
$getData = "SELECT * FROM donation WHERE id='$order_id'";
$result = $conn->query($getData);
$result = mysqli_fetch_assoc($result);
// var_dump($result);
// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $result['nominal'], // no decimal allowed for creditcard
);
// Optional
$item_details = array (
    array(
        'id' => 'a1',
        'price' => $result['nominal'],
        'quantity' => 1,
        'name' => "Pembayaran Donasi"
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => $result['name'],
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
// echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html>
    <style>
        body {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
    <body>
        <h2>Detail Pembayaran</h2>
        <span>Atas Nama: <?php echo $result["name"]?></span>
        <br>
        <span>Jumlah Dana: <?php echo $result["nominal"]?></span>
        <br>
        <button id="pay-button">Pilih metode pembayaran</button>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>');
            };
        </script>
    </body>
</html>
