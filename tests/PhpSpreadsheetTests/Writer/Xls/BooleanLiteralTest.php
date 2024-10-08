<?php

declare(strict_types=1);

namespace PhpOffice\PhpSpreadsheetTests\Writer\Xls;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheetTests\Functional\AbstractFunctional;

class BooleanLiteralTest extends AbstractFunctional
{
    public function testBooleanLiteral(): void
    {
        // Issue 3369 - Xls Writer Parser unable to handle
        //   TRUE (or FALSE) when specified as function arguments.
        $formula = '=AND(TRUE,true(),true,TRUE(),FALSE,false(),false,FALSE(),fAlse)';
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()->setCellValue('A1', $formula);

        $robj = $this->writeAndReload($spreadsheet, 'Xls');
        $spreadsheet->disconnectWorksheets();
        $sheet0 = $robj->setActiveSheetIndex(0);
        self::assertSame(strtoupper($formula), $sheet0->getCell('A1')->getValue());
        $robj->disconnectWorksheets();
    }
}
