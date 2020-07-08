<?php
if (isset($_POST['get_airtime'])) {
       
        $number = $_POST['number'];
        
        $amount = $_POST['amount'];
        
        $network = $_POST['network'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://sandbox.wallets.africa/bills/airtime/purchase",
        CURLOPT_URL => "https://api.wallets.africa/bills/airtime/purchase",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\r\n  \"Code\": \"$network\",\r\n  \"Amount\": $amount,\r\n  \"PhoneNumber\": \"$number\",\r\n  \"SecretKey\": \"hfucj5jatq8h\"\r\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Access-Control-Allow-Origin: *",
            "AUTHORIZATION: Bearer uvjqzm5xl6bw",
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = $response;
        echo $a;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Airtime - HNG Internship Entry</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Welcome, SMS SENDER</h5>
                <form class="form-signin" method="POST">
                <div class="form-label-group">
                    <input type="number" id="inputNumber" name="number" placeholder="Provide Number" class="form-control" required autofocus>
                    <label for="inputNumber">Provide Mobile Number</label>
                </div>

                <div class="form-label-group">
                    <input type="number" id="inputAmount" name="amount" class="form-control" placeholder="Send Amount" required>
                    <label for="inputAmount">Amount to send</label>
                </div>
                
                <hr>

                <div class="form-label-group">
                    <select id="inputNetwork" class="form-control" name="network" required>
                        <option selected name="mtn" id="">MTN</option>
                        <option name="airtel" id="">Airtel</option>
                        <option name="glo" id="">GLO</option>
                    </select>
                    
                </div>

                <button name="get_airtime" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Initiate Transaction</button>
                <hr class="my-4">
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    <hr>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>