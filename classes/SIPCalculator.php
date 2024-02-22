<?php 

namespace app\classes;
use app\core\Calculator;

class SIPCalculator extends Calculator
{
    public function calculate($inputData)
    {

        // Retrieve input data from the form
        $amount = $inputData['amount'] ? $inputData['amount'] : 0;
        $rate = $inputData['rate'] ? $inputData['rate'] : 0;

        // Perform GST calculation
        $gstAmount = ($amount * $rate) / 100;
        $totalAmount = $amount + $gstAmount;

        // Format the result
        return "GST Amount: $gstAmount, Total Amount (including GST): $totalAmount";

    }
}
