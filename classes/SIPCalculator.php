<?php 

namespace app\classes;
use app\core\Calculator;

class SIPCalculator extends Calculator
{
    public function calculate($inputData)
    {

        // handle the input data
        $frequency = $inputData['frequencyOfInvestment'];
        $investmentAmount = $this->checkNull($this->convertToNumber($inputData['investmentAmount']));
        $rateOfReturn = $this->checkNull($this->convertToNumber($inputData['rateOfReturn']));
        $tenureTime = $this->checkNull($this->convertToNumber($inputData['tenureTime']));
        $corpusValue = 0;
        $totalEarnings = 0;
        $depositedAmount = 0;

        if($frequency === 'Monthly') {
  
            $monthlyInterestRate = ($rateOfReturn / 12) / 100;
            $numberOfMonths = $tenureTime * 12;
            $depositedAmount = $investmentAmount * $numberOfMonths;
    
            for ($i = 1; $i <= $numberOfMonths; $i++) {
                $corpusValue = ($corpusValue + $investmentAmount) * (1 + $monthlyInterestRate);
            }
    
        } 

        if($frequency === 'Yearly') {
            $annualInterestRate = $rateOfReturn / 100;
            $depositedAmount = $investmentAmount * $tenureTime;
    
            for ($i = 1; $i <= $tenureTime; $i++) {
                $corpusValue = ($corpusValue + $investmentAmount) * (1 + $annualInterestRate);
            }

        }

        $corpusValue = round($corpusValue, 2);
        $totalEarnings = $corpusValue - $depositedAmount;

        $this->result = [
            'corpusValue' => $this->indianMoneyFormat($corpusValue),
            'corpusValueText' => $this->convertToIndianNumberText($corpusValue),
            'totalEarning' => $this->indianMoneyFormat($totalEarnings),
            'totalEarningText' => $this->convertToIndianNumberText($totalEarnings),
            'depositedAmount' => $this->indianMoneyFormat($depositedAmount),
            'depositedAmountText' => $this->convertToIndianNumberText($depositedAmount),
        ];

        return $this->result;

    }
}
