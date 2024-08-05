<?php

namespace App\Livewire;

use App\Livewire\Forms\CriteriaForm;
use App\Services\CriteriaService;
use Livewire\Component;
use App\Models\Criteria;

class CriteriaComponent extends Component
{

    public CriteriaForm $form;
    public $totalScore;
    public $totalBobot;
    public $selectedCriteriaId;

    protected CriteriaService $criteriaService;

    public $criterias;
    public $isEdit = false;


    public function mount(CriteriaService $criteriaService, $criterias, $period)
    {
    
        $this->form->period_id = $period;
        $this->criteriaService = $criteriaService;
        $this->criterias = $criterias;
        
    }


    public function processMark(Criteria $criteria)
    {

       $this->form->updateCheckedCriteria($criteria);
       $this->dispatch('criteria-updated');

    }

    public function saveCriteria()
    {
        
        $this->form->save();
        $this->dispatch('criteria-updated');
    }

    public function editCriteria($id)
    {        
        $this->form->setCriteria(Criteria::find($id));
        $this->selectedCriteriaId = $id;
        $this->isEdit = true;
    }

    public function deleteCriteria(Criteria $criteria)
    {
        $criteria->delete();
        $this->dispatch('criteria-updated');
    }

    public function render()
    {
        return view('livewire.pages.parameter.criteria.index',[
            'isEdit' => $this->isEdit,
            'selectedValue' => self::selectedValue()
        ]);
    }

    public static function selectedValue(): array
    {
        $data = [
                ['name' => 'Peserta didik dari keluarga yang terdaftar dalam Program Keluarga Harapan (PKH)' ],
                ['name' => 'Peserta didik dari keluarga pemegang Kartu Keluarga Sejahtera (KKS)' ],
                ['name' => 'Peserta didik yang berstatus yatim/piatu/yatim piatu dan berasal dari sekolah, panti sosial, atau panti asuhan' ],
                ['name' => 'Peserta didik yang terdampak bencana alam'],
                ['name' => 'Peserta didik yang putus sekolah (drop out) dan diharapkan dapat kembali bersekolah'],
                ['name' => 'Peserta didik yang memiliki kelainan fisik, korban musibah, anak dari orang tua yang terkena pemutusan hubungan kerja, tinggal di daerah konflik, berasal dari keluarga terpidana, berada di Lembaga Pemasyarakatan, atau memiliki lebih dari tiga saudara yang tinggal serumah'],
                ['name' => 'Peserta didik yang mengikuti kursus atau satuan pendidikan nonformal lainnya'],
                ['name' => 'Penghasilan Ayah'],
                ['name' => 'Pekerjaan Ayah'],
                ['name' => 'Penghasilan Ibu'],
                ['name' => 'Pekerjaan Ibu'],
                ['name' => 'Jarak Tempuh'],
                ['name' => 'Penerima KPS'],
                ['name' => 'Transportasi'],
                ['name' => 'Alasan Layak Pip'],
        ];

        return $data;
    }
}
