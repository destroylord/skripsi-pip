<?php

namespace App\Livewire\Forms;

use App\Models\Period;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PeriodForm extends Form
{

    public $name;

    public $period = null;
    

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function setPeriod(Period $period)
    {
        $this->fill($period->only([
            'name'
        ]));

    }
    public function save()
    {
        $this->validate();

        (is_null($this->period)) ? 
            Period::create($this->only(['name'])) : 
            $this->period->update($this->only(['name']));

        $this->reset();
    }
}
