<?php
function currencyConverter ($amount, $from_Currency, $to_Currency) {
    $from_Currency = urlencode(strtoupper($from_Currency));
    $to_Currency = urlencode(strtoupper($to_Currency));
    $url = file_get_contents('http://free.currencyconverterapi.com/api/v3/convert?q=' . $from_Currency . '_' . $to_Currency . '&compact=ultra');
    $json = json_decode($url, true);

    $val = $json[$from_Currency . '_' . $to_Currency];
    $converted_amount = $val * $amount;

    $data = array('rate' => $val, 'converted_amount' =>$converted_amount, 'from_Currency' => strtoupper($from_Currency), 'to_Currency' => strtoupper($to_Currency));
    
    echo json_encode($data);
}

?> 