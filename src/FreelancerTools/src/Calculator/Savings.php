<?php
declare(strict_types=1);

namespace FreelancerTools\Calculator;

use \FreelancerTools\Entity\Savings as SavingsEntity;

class Savings
{
	/**
	 * Calculate a percentage of the payment amount
	 *
	 * This is a multi-purpose utility function for calculating a percentage.
	 * I've decided not to write specific functions for the three values, because
	 * this one does the job, at the expense of a token amount of readibility.
	 *
	 * @param float $paymentAmount
	 * @param float $percentage
	 * @return float
	 */
	public function calculatePercentage(float $paymentAmount, float $percentage): float
	{
		return $paymentAmount * $percentage;
	}

	/**
	 * Calculate the amounts to set aside, with or without a VAT applied
	 *
	 * @param float $payment
	 * @param float $vatPerc
	 * @param float $incomeTaxPerc
	 * @param float $savingsPerc
	 * @return SavingsEntity
	 */
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
