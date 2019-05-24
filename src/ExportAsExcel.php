<?php

namespace App;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportAsExcel{

    private $spreadsheet;
    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
    }


    public function export($data){
        $sheet = $this->spreadsheet->getActiveSheet();
        $allData = [];
        foreach ($data as $data){
            array_push($allData,(array) $data);
        }
        $sheet->fromArray($allData);
        $writer = new Xlsx($this->spreadsheet);
        $writer->save('90Pixel-Cem.xlsx');
    }

}