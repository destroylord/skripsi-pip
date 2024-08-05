<?php

namespace App\Livewire\Forms;

use App\Imports\StudentImport;
use App\Models\Period;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;


class ImportForm extends Form
{
    // public $period;
    public $file;
    public $period;

    public function upload()
    {
        $import = new StudentImport();
        $import->period = Period::find($this->period);
        Excel::import($import, $this->file);
    }
}
