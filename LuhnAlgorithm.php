<?php

/**
 * A class to calculate the Luhn Algorithm check digit and to validate a number using this algorithm
 *
 * @author Sergey Cheban
 */
class LuhnAlgorithm {
    
    /**
     * Function will calculate the check digit for a number using
     * the Luhn Algorithm
     * 
     * @param string $number The number calculate check digit for
     * @return int The check digit
     */
    public function calculateCheckDigit($number) 
    {
        $sum = 0;
        //Create array of non-check digits and reverse it
        $num_arr = array_reverse(str_split(substr($number, 0, -1)));
        //Sum up every other(even item) non-check digit
        foreach($num_arr as $i => &$num) {
            //Double it and check if the $num is > 9,
            //if it is > 9, then subtract 9 from it
            if(!($i & 1)) {
                ($num *= 2) > 9 ? $num -= 9 : $num;
            }
            //Add up the total of every other digit
            $sum += $num;
        }
        //Multiply sum by 9
        $sum *= 9; 
        //Mod 10 the sum to get the check digit
        return $sum % 10;        
    }

    /**
     * Function will validity of a number based on the calculated check digit
     * 
     * @param string $number
     * @param int $checkDigit The check digit of the number
     * @return boolean Validity of number
     */
    public function validateNumber($number, $checkDigit) 
    {
        //Calculate the check digit of the number and compare it
        return $checkDigit == $this->calculateCheckDigit($number);
    }
}
