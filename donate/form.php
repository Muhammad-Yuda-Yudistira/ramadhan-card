<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <link rel="stylesheet" href="../css/donate/form.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h2>Donation Now</h2>
            <form action="checkout.php" method="post">
                <label for="name">Atas Nama:</label>
                <input type="text" name="name" id="name" required>
                <label for="nominal">Jumlah Dana:</label>
                <input type="number" name="nominal" id="nominal" min="1000" value="1000" required>
                <button type="submit">Give Us</button>
            </form>
        </div>
    </div>
</body>
</html>