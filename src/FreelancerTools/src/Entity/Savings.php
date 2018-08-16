<?php
declare(strict_types=1);

namespace FreelancerTools\Entity;


class Savings
{
	private $incomeTax;
	private $vat;
	private $savings;

	public function __construct($vat, $incomeTax, $savings)
	{
		$this->vat = $vat;
		$this->incomeTax = $incomeTax;
		$this->savings = $savings;
	}
}
