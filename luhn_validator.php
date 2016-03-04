<?php

include_once 'LuhnAlgorithm.php';

/*
 * This PHP script will check the validity of a number using the Luhn Algorithm
 * This script uses a Luhn PHP Class created by Rolands Kusins
 * Luhn PHP Class - http://www.phpclasses.org/browse/file/51066.html
 * 
 * @author Sergey Cheban
 */
echo "Please enter the number you would like to validate or type 'exit' to exit this script: ";
//Take input from STDIN and trim the whitespaces
$input = trim(fgets(STDIN));

//Check to see if user wants to abort/exit the script, otherwise run the validation
if (trim($input) == 'exit') {
    echo "EXITING!\n";
    exit;
} else {
    $luhn = new LuhnAlgorithm(); 
    echo "$input" . " is " . ($luhn->validateNumber($input, substr($input, -1, 1)) ? 'valid!' : 'invalid');
}

function hexToDecimal($input) 
{
    
}
