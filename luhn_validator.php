<?php

include_once 'LuhnAlgorithm.php';

/*
 * This PHP script will check the validity of a number using the Luhn Algorithm
 * 
 * @author Sergey Cheban
 */
echo "**NOTE: To validate a hexadecimal number add the 'h' character at the end of your number\n";
echo "Please enter the number you would like to validate or type 'exit' to exit this script: ";
//Take input from STDIN and trim the whitespaces
$input = trim(fgets(STDIN));

//Check to see if user wants to abort/exit the script, otherwise run the validation
if (trim($input) == 'exit') {
    echo "EXITING!\n";
    exit;
} else {
    $luhn = new LuhnAlgorithm(); 
    //Check if the number is a hexadecimal (ends with 'h' character)
    if(substr($input, -1, 1) == 'h') {
        echo "Hexadecimal number $input" . " is " . ($luhn->validateHexadecNumber(strtoupper(substr($input, 0, -1))) ? 'valid!' : 'invalid');
    } else {
        echo "$input" . " is " . ($luhn->validateNumber($input, substr($input, -1, 1)) ? 'valid!' : 'invalid');
    }
}
