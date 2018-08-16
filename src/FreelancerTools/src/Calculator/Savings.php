<?php
declare(strict_types=1);

namespace FreelancerTools\Calculator;

use \FreelancerTools\Entity\Savings as SavingsEntity;

class Savings
{
	public function calculatePercentage(float $paymentAmount, $percentage): float
	{
		return $paymentAmount * $percentage;
	}

	public function calculateSavings($payment, $vat, $incomeTax, $savings)
	public function calculateSavings(float $payment, float $vatPerc, float $incomeTaxPerc, float $savingsPerc): SavingsEntity
	{
		$vatAmount = ($vatPerc === 0) ? $vatPerc : $this->calculatePercentage($payment, $vatPerc);

		return new SavingsEntity(
			$vatAmount,
			$this->calculatePercentage($payment - $vatAmount, $incomeTaxPerc),
			$this->calculatePercentage($payment - $vatAmount, $savingsPerc)
		);
	}
}
