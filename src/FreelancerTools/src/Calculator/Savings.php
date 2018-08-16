<?php
declare(strict_types=1);

namespace FreelancerTools\Calculator;


class Savings
{
	const TaxPercentage = 0.19;

	public function calculateVat(float $paymentAmount, $mwstPercentage): float
	{
		if (is_null($mwstPercentage)) {
			$mwstPercentage = self::TaxPercentage;
		}
		
		return (float) money_format('%.2n', $paymentAmount * $mwstPercentage);
	}
}
