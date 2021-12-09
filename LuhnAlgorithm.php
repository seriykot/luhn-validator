<?php

/**
 * A class to calculate the Luhn Algorithm check digit and to validate a number using it
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
        foreach($num_arr as $i => $num) {
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

    /**
     * Function will validate a Hexadecimal number using Luhn mod N algorithm
     *
     * @param string $number The Hexacedimal number to validate
     * @return boolean
     */
    public function validateHexadecNumber($number)
    {
        $sum = 0;
        $hex_arr = array_reverse(str_split($number));
        //Go through each digit and double every other code point and sum up the total
        foreach ($hex_arr as $i => $char) {
            $codePoint = $this->hexadecMap($char);
            //Double every other codePoint
            !($i % 1) ? $codePoint *= 2 : $codePoint;
            // If doubling the value is greater than 15,
            // then calculate the digits of codePoint in base 16
            if($codePoint > 15) {
                $codePoint = (int)($codePoint / 15) + ($codePoint % 15);
            }
            $sum += $codePoint;
        }

        return ($sum % 15) == 0;
    }

    /**
     * A mapper function to map a hexadecimal character to a decimal character point
     *
     * @param type $hex_char
     * @return sting
     */
    public function hexadecMap($hex_char)
    {
        $map = array(
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            'A' => '10',
            'B' => '11',
            'C' => '12',
            'D' => '13',
            'E' => '14',
            'F' => '15',
        );

        return $map[$hex_char];
    }
}
