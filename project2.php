<?php
//initalize variables
$input = '';
$conversion = '';
$msg = '';

function fahrToCel($arg)
{
    $num = $arg;
    $int_val = intval($num);
    $conversion = (($int_val - 32) * 5) / 9;
    return $conversion;
}

function fahrToKel($arg)
{
    $num = $arg;
    $int_val = intval($num);
    $conversion = (($int_val - 32) * 5) / 9 + 273.15;
    return $conversion;
}

function celToKel($arg)
{
    $num = $arg;
    $int_val = intval($num);
    $conversion = $int_val + 273.15;
    return $conversion;
}

function celToFahr($arg)
{
    $num = $arg;
    $int_val = intval($num);
    $conversion = ($int_val * 9) / 5 + 32;
    return $conversion;
}

function kelToFahr($arg)
{
    $num = $arg;
    $int_val = intval($num);
    $conversion = (($int_val - 273.15) * 9) / 5 + 32;
    return $conversion;
}

function kelToCel($arg)
{
    $num = $arg;
    $int_val = intval($num);
    $conversion = $int_val - 273.15;
    return $conversion;
}

function conversionMsg($input, $conversion)
{
    return '<p class = "result">The conversion of <b>' .
        $input .
        '</b> from <b>' .
        strtoupper($_POST['tempA'][0]) .
        '°</b> to <b>' .
        strtoupper($_POST['tempB'][0]) .
        '°</b> is equal to <b>' .
        number_format((float) $conversion, 2) .
        '</b> degrees!</p>';
}

#=======================================================================
