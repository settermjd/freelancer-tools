<?php

use FreelancerTools\Calculator\Savings;

class SavingsCalculatorTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

	/**
	 * @dataProvider calculatePercentageDataProvider
	 */
    public function testCanCalculatePercentageCorrectly($paymentAmount, $expectedAmount, $percentage)
    {
		$calculator = new Savings();
		$this->assertSame(
			$expectedAmount,
			$calculator->calculatePercentage($paymentAmount, $percentage),
			"The expected amount was not returned."
		);
    }

	public function calculatePercentageDataProvider()
	{
		return [
			[1500.00, 285.00, 0.19],
			[1500.00, 300.00, 0.20],
		];
    }

	/**
	 * @dataProvider calculateSavingsDataProvider
	 * @param float $payment The payment amount received
	 * @param float $vat The expected VAT to be generated
	 * @param float $incomeTax The expected income tax to be generated
	 * @param float $savings The expected savings to be generated
	 * @param float $vatPercentage
	 * @param float $incomeTaxPercentage
	 * @param float $savingsPercentage
	 */
	public function testCanCalculateIncomeTaxVatAndSavings(
		float $payment,
		float $vat,
		float $incomeTax,
		float $savings,
		float $vatPercentage,
		float $incomeTaxPercentage,
		float $savingsPercentage
	) {
		$calculator = new Savings();
		$entity = new \FreelancerTools\Entity\Savings($vat, $incomeTax, $savings);
		$this->assertEquals(
			$entity,
			$calculator->calculateSavings(
				$payment, $vatPercentage, $incomeTaxPercentage, $savingsPercentage
			)
		);
    }

	public function calculateSavingsDataProvider()
	{
		return [
			[1500.00, 285.00, 243.00, 121.50, 0.19, 0.20, 0.10],
			[1500.00, 0, 300.00, 150.00, 0, 0.20, 0.10],
		];
	}
}
