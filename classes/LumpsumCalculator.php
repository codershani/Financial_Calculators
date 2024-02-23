<?php

namespace app\classes;
use app\core\Calculator;

class LumpsumCalculator extends Calculator
{
    public function calculate($inputData)
    {
        // Retrieve input data from the array
        $investmentAmount = $this->checkNull($this->convertToNumber($inputData['investmentAmount']));
        $rateOfReturn = $this->checkNull($this->convertToNumber($inputData['rateOfReturn']));
        $tenureTime = $this->checkNull($this->convertToNumber($inputData['tenureTime']));

        // Perform lumpsum calculation
        $corpusValue = round($investmentAmount * pow((1 + ($rateOfReturn / 100)), $tenureTime), 2);
        $totalEarnings = round($corpusValue - $investmentAmount, 2);

        // Format the result
        $this->result = [
            'corpusValue' => $this->indianMoneyFormat($corpusValue),
            'corpusValueText' => $this->convertToIndianNumberText($corpusValue),
            'totalEarning' => $this->indianMoneyFormat($totalEarnings),
            'totalEarningText' => $this->convertToIndianNumberText($totalEarnings),
            'investmentAmount' => $this->indianMoneyFormat($investmentAmount),
            'investmentAmountText' => $this->convertToIndianNumberText($investmentAmount),
        ];

        return $this->result;
    }
}