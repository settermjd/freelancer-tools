<?php
declare(strict_types=1);

namespace FreelancerTools\Calculator;


class Savings
{
	public function calculatePercentage(float $paymentAmount, $percentage): float
	{
		return $paymentAmount * $percentage;
	}

	public function calculateSavings($payment, $vat, $incomeTax, $savings)
	{
		if ($vat === 0) {
			$entity = new \FreelancerTools\Entity\Savings(
				0,
				$this->calculatePercentage($payment, $incomeTax),
				$this->calculatePercentage($payment, $savings)
			);
		} else {
			$vatAmount = $this->calculatePercentage($payment, $vat);
			$entity = new \FreelancerTools\Entity\Savings(
				$vatAmount,
				$this->calculatePercentage($payment - $vatAmount, $incomeTax),
				$this->calculatePercentage($payment - $vatAmount, $savings)
			);
		}

		return $entity;
	}
}
