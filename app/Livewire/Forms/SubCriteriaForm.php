<?php

namespace App\Livewire\Forms;

use App\Models\Subcriteria;
use Illuminate\Validation\Rule;
use Livewire\Form;


class SubCriteriaForm extends Form
{

   
    public $parent_id;

    public $name;
    public $value;

    public $subCriteria = null;

    public function rules()
    {
        return [
            'parent_id' => 'required',
            'name' => 'required',
            'value' => 'required',
                    Rule::unique('subcriterias')->ignore($this->parent_id)
        ];
    }

     protected $messages = [
        'name.required' => 'The name field is required.',
    ];

    public function setSubcriteria($subCriteria)
    {
        $this->subCriteria = $subCriteria;
        $this->parent_id = $subCriteria->parent_id;
        $this->name = $subCriteria->name;
        $this->value = $subCriteria->value;
    }

    public function save()
    {

        $this->validate();

        $data = [
            'parent_id' => $this->parent_id,
            'name' => $this->name,
            'value' => $this->value
        ];

        isset($this->subCriteria) ?
            $this->subCriteria->update($data) :
            $this->subCriteria = Subcriteria::create($data);
    }

}
