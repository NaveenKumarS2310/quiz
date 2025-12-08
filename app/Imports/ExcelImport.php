<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelImport implements ToCollection
{
    public $to_import_data = array();
    public function collection(Collection $collection)
    {
        $this->to_import_data = $collection;
    }
    public function return_import_data()
    {
        dd($this->to_import_data);
        return $this->to_import_data;
    }
}
