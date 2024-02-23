<?php

namespace app\core;

abstract class Calculator
{
    public $result = [];
    abstract public function calculate($inputData);

    public function checkNull($inputData)
    {
        return isset($inputData) ? $inputData : 0;
    }

    public function convertToNumber($inputData)
    {
        return preg_replace('/[^0-9]/', '', $inputData);
    }

    public function indianMoneyFormat($number){    	
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for($i=0;$i<$length;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
                $delimiter .=',';
            }
            $delimiter .=$money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if( $decimal != '0'){
            $result = $result.$decimal;
        }

        return $result;
    }

    public function convertToIndianNumberText($number) {
        $suffixes = ["", "Thousands", "Lakhs", "Crores", "Arab", "Kharab", "Nil"];
        $moneyFormat = $this->indianMoneyFormat($number);
        $countComma = substr_count($moneyFormat, ',');
    
        $formattedNumber = round(floatval(str_replace(',', '.', $moneyFormat)), 2);
        $suffix = $suffixes[$countComma];

        return "{$formattedNumber} {$suffix}" ;
    }
}