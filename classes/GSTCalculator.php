<?php

namespace app\classes;
use app\core\Calculator;

class GSTCalculator extends Calculator
{
    public function calculate($inputData)
    {
        // Handle Input Data
        $gstType = $inputData['gstType'];
        $amount = $this->checkNull($this->convertToNumber($inputData['amount']));
        $taxRate = $this->checkNull($this->convertToNumber($inputData['taxRate']));
        $gstAmount = 0;
        $totalAmount = 0;
        if($gstType === 'exclusive') {
            $gstAmount += $amount * ($taxRate / 100);
            $totalAmount += $gstAmount + $amount;
        } elseif($gstType === 'inclusive') {
            $gstAmount += $amount - ($amount * (100 / (100 + $taxRate)));
            $totalAmount += $amount - $gstAmount;
        }

        $this->result = [
            'gstAmount' => $this->indianMoneyFormat($gstAmount),
            'gstAmountText' => $this->convertToIndianNumberText($gstAmount),
            'totalAmount' => $this->indianMoneyFormat($totalAmount),
            'totalAmountText' => $this->convertToIndianNumberText($totalAmount),
            'gstType' => $gstType,
        ];

        return $this->result;
    }
}