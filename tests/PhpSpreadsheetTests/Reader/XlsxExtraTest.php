<?php

namespace PhpOffice\PhpSpreadsheetTests\Reader;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\File;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PHPUnit\Framework\TestCase;

class XlsxExtraTest extends TestCase
{
    public function testLoadXlsxConditionalFormattingExtra(): void
    {
        // Make sure Conditionals are read correctly from existing file
        $filename = 'tests/data/Reader/XLSX/conditionalFormattingExtraTest.xlsx';
        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($filename);
        $worksheet = $spreadsheet->getActiveSheet();

        $conditionalStyle = $worksheet->getConditionalStyles('A2:A8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_DUPLICATES, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('B2:B8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_UNIQUEVALUES, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('C2:C8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_ABOVEAVERAGE, $conditionalRule->getConditionType());
        self::assertEquals('0', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('D2:D13');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_TOPTEN, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('E2:E8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_COLORSCALE, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);
    }

    public function testReloadXlsxConditionalFormattingExtra(): void
    {
        // Make sure conditionals from existing file are maintained across save
        $filename = 'tests/data/Reader/XLSX/conditionalFormattingExtraTest.xlsx';
        $outfile = File::temporaryFilename();
        $reader = IOFactory::createReader('Xlsx');
        $spreadshee1 = $reader->load($filename);
        $writer = IOFactory::createWriter($spreadshee1, 'Xlsx');
        $writer->save($outfile);
        $spreadsheet = $reader->load($outfile);
        unlink($outfile);
        $worksheet = $spreadsheet->getActiveSheet();

        $conditionalStyle = $worksheet->getConditionalStyles('A2:A8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_DUPLICATES, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('B2:B8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_UNIQUEVALUES, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('C2:C8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_ABOVEAVERAGE, $conditionalRule->getConditionType());
        self::assertEquals('0', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('D2:D13');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_TOPTEN, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);

        $conditionalStyle = $worksheet->getConditionalStyles('E2:E8');
        self::assertNotEmpty($conditionalStyle);
        $conditionalRule = $conditionalStyle[0];
        $conditions = $conditionalRule->getConditions();
        self::assertNotEmpty($conditions);
        self::assertEquals(Conditional::CONDITION_COLORSCALE, $conditionalRule->getConditionType());
        self::assertEquals('', $conditions[0]);
    }
}
