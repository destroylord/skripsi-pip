<?php

namespace App\Livewire;

use App\Imports\StudentImport;
use App\Livewire\Forms\ImportForm;
use App\Models\Period;
use Livewire\WithFileUploads;
use Livewire\Component;

class UploadedStudentComponent extends Component
{

    use WithFileUploads;

    public ImportForm $form;
    protected StudentImport $studentImport;
    public function mount()
    {
        $this->studentImport = new StudentImport();
    }

    public function uploadFile()
    {
        $this->form->upload();
    }
    public function render()
    {
        return view('livewire.pages.upload.index',[
            'periods' => Period::all(),
        ])->layout('layouts.app');
    }
}
