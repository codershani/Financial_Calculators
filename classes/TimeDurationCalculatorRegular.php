<?php

namespace app\classes;
use app\core\Calculator;

class TimeDurationCalculatorRegular extends Calculator
{
    public $investmentAmount;
    public $rateOfReturn;
    public $targetWealth;
    public $compoundsPerYear = 1;
    public function calculate($inputData)
    {
        // Handle input Data
        $frequency = $inputData['frequencyOfInvestment'];
        $this->targetWealth = $this->checkNull($this->convertToNumber($inputData['targetedWealth']));
        $this->investmentAmount = $this->checkNull($this->convertToNumber($inputData['investmentAmount']));
        $this->rateOfReturn = $this->checkNull($this->convertToNumber($inputData['rateOfReturn']));

        if($frequency === 'Monthly') {
            $monthlyInterestRate = ($this->rateOfReturn / 12) / 100;
            $numberOfMonths = log(($this->targetWealth / $this->investmentAmount) * ($monthlyInterestRate / (1 + $monthlyInterestRate)) + 1) / log(1 + $monthlyInterestRate);

            $timeDuration = $this->monthsToYears($numberOfMonths);

            $this->result = [
                'type' => $frequency,
                'years' => $timeDuration['years'],
                'months' => $timeDuration['months'],
            ];
        } elseif($frequency === 'Yearly') {

            $numberOfYears = '';
            $this->result = [
                'type' => $frequency,
                'years' => $numberOfYears,
            ];
        }

        return $this->result;
    }

    public function monthsToYears($months) {
        // Calculate the number of years
        $years = floor($months / 12);
    
        // Calculate the remaining months
        $remainingMonths = $months % 12;
    
        // Return the result
        return [
            'years' => $years,
            'months' => $remainingMonths
        ];
    }
}