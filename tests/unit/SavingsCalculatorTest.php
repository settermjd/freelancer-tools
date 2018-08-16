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
	 * @dataProvider taxTestDataProvider
	 */
    public function testCanCalculateVatCorrectly($paymentAmount, $expectedMwStAmount, $taxPercentage)
    {
		$calculator = new Savings();
		$this->assertSame(
			$expectedMwStAmount,
			$calculator->calculateVat($paymentAmount, $taxPercentage),
			"The expected tax amount was not returned."
		);
    }

	public function taxTestDataProvider()
	{
		return [
			[1500.00, 285.00, null],
			[1500.00, 300.00, 0.20],
		];
    }
}
