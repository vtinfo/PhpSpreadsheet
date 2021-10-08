<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical;
use PHPUnit\Framework\TestCase;

class SlopeTest extends TestCase
{
    protected function setUp(): void
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerSLOPE
     *
     * @param mixed $expectedResult
     */
    public function testSLOPE($expectedResult, array $xargs, array $yargs): void
    {
        $result = Statistical::SLOPE($xargs, $yargs);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-12);
    }

    public function providerSLOPE(): array
    {
        return require 'tests/data/Calculation/Statistical/SLOPE.php';
    }
}
