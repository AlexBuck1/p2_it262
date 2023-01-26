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

//check server request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Check POST associate array
    if (empty($_POST['userInput'])) {
        $msg = '<p class="error">input a value</p>';
    } else {
        $input = intval($_POST['userInput']);

        //if both toggle empty, print warning
        if (
            !array_key_exists('tempA', $_POST) &&
            !array_key_exists('tempB', $_POST)
        ) {
            $msg =
                '<p class="error">Please pick two temperatures to convert</p>';
        } else {
            //keys exists
            //if one is toggled and not the other, print warning
            if (isset($_POST['tempA']) && !isset($_POST['tempB'])) {
                $msg = '<p class="error">Please pick a conversion type</p>';
            } elseif (!isset($_POST['tempA']) && isset($_POST['tempB'])) {
                $msg =
                    '<p class="error">Please pick a temperature to convert</p>';
            } else {
                //temp combo options
                if ($_POST['tempA'] == 'fahr' && $_POST['tempB'] == 'cel') {
                    $conversion = fahrToCel($input);
                    $msg = conversionMsg($input, $conversion);
                } elseif (
                    $_POST['tempA'] == 'fahr' &&
                    $_POST['tempB'] == 'kel'
                ) {
                    $conversion = fahrToKel($input);
                    $msg = conversionMsg($input, $conversion);
                } elseif (
                    $_POST['tempA'] == 'cel' &&
                    $_POST['tempB'] == 'fahr'
                ) {
                    $conversion = celToFahr($input);
                    $msg = conversionMsg($input, $conversion);
                } elseif (
                    $_POST['tempA'] == 'cel' &&
                    $_POST['tempB'] == 'kel'
                ) {
                    $conversion = celToKel($input);
                    $msg = conversionMsg($input, $conversion);
                } elseif (
                    $_POST['tempA'] == 'kel' &&
                    $_POST['tempB'] == 'fahr'
                ) {
                    $conversion = kelToFahr($input);
                    $msg = conversionMsg($input, $conversion);
                } elseif (
                    $_POST['tempA'] == 'kel' &&
                    $_POST['tempB'] == 'cel'
                ) {
                    $conversion = kelToCel($input);
                    $msg = conversionMsg($input, $conversion);
                } else {
                    // temp same, please try again
                    $msg = conversionMsg($input, $input);
                }
            }
        }
    }
}

//end server request
