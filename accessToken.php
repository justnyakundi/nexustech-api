<?php
// YOU MPESA API KEYS
$consumerKey = "1HUeXFGGGBzvq8AIeDqEAUa6g2biLwvw"; // Fill with your app Consumer Key
$consumerSecret = "QpSvFnMg6GU4E4GE"; // Fill with your app Consumer Secret
// ACCESS TOKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers = array('Content-Type:application/json; charset=utf8');
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);

if ($result === false) {
    echo "cURL error: " . curl_error($curl);
} else {
    $result = json_decode($result);
    if ($result === null) {
        echo "JSON decoding error: " . json_last_error_msg();
    } else {
        $access_token = $result->access_token;
        echo " " . $access_token;
    }
}

curl_close($curl);
?>
