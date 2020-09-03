<?php
/* Template Name: MT ADS */
// required headers
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


$data = json_decode(file_get_contents('php://input'), true);
if(
    !empty($data["user_id"])
){
http_response_code(200);

$adsdata = '{
    "primary_cards": [
     {
            "image_url": "https://platefit.co/app/uploads/2020/09/platefit-ios-ad3.png",
            "redirect_url": "https://platefit.co/schedule/brentwood/"
        }
    ]
}';

echo $adsdata;
} else{
 // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Invalid User Id"));
}