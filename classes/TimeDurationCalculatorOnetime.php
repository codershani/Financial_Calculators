<?php

namespace app\classes;
use app\core\Calculator;

class TimeDurationCalculatorOnetime extends Calculator
{
    public $investmentAmount;
    public $rateOfReturn;
    public $targetWealth;
    public $compoundsPerYear = 1;

    public function calculate($inputData)
    {

        // Handle Data
        $this->targetWealth = $this->checkNull($this->convertToNumber($inputData['targetWealth']));
        $this->investmentAmount = $this->checkNull($this->convertToNumber($inputData['investmentAmount']));
        $this->rateOfReturn = $this->checkNull($this->convertToNumber($inputData['rateOfReturn'])) / 100;

        $timeInDays = 0;
        $wealth = $this->investmentAmount;

        while ($wealth < $this->targetWealth) {
            $wealth *= pow(1 + $this->rateOfReturn / $this->compoundsPerYear, $this->compoundsPerYear / 365);
            $timeInDays += 1;
        }

        $timeDuration = $this->daysToYears($timeInDays);

        $this->result = [
            'years' => $timeDuration['years'],
            'months' => $timeDuration['months'],
            'days' => $timeDuration['days'],
        ];

        return $this->result;
    }

    public function daysToYears($days) {
        // Define the number of days in each month
        $daysInMonth = [
            31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
        ];

        // Calculate the number of years
        $years = floor($days / 365);

        // Calculate the remaining days after considering whole years
        $remainingDays = $days % 365;
        $months = 0;

        // Iterate through each month to find the remaining months and days
        foreach ($daysInMonth as $daysInCurrentMonth) {
            if ($remainingDays < $daysInCurrentMonth) {
                $remainingDays %= $daysInCurrentMonth;
                break;
            } else {
                $remainingDays -= $daysInCurrentMonth;
                $months += 1;
            }
        }

        // Return the result
        return [
            'years' => $years,
            'months' => $months,
            'days' => $remainingDays
        ];
    }
}