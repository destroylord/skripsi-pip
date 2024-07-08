<?php

use function Livewire\Volt\{state, layout, computed, rules, title, form, on};
use App\Livewire\Forms\PeriodForm;
use App\Models\Period;

layout('layouts.app');
form(PeriodForm::class);
title('Periode');

// Criteria



// Checkbox
// $processMark = function(Criteria $criteria) {
//    $this->form->updateCheckedCriteria($criteria);
// };

// // On Create
// $saveCriteria = function () {
//     $this->form->save();
//     $this->form->reset([
//         'name', 'score', 'weight', 'type'
//     ]);

//     $this->dispatch('criteria-saved');
//     $this->dispatch('count-update');
// };

// $updateCriteria = function ($id) {
//     $criteria = Criteria::find($id);
     
//     $this->form->setCriteria($criteria);

// };

// // On Delete
// $deleteCriteria = function (Criteria $criteria) {
//     $criteria->delete();
// };



// ---

$savePeriod = function() {
   $this->form->save();
   $this->form->reset();

   $this->dispatch('period-saved');
};

$editPeriod = function($id) {
    $period = Period::find($id);

    $this->form->setPeriod($period);
    $this->dispatch('show-modal');
};

$deletePeriod = function (Period $period) {
    $period->delete();
    $this->dispatch('period-deleted');
};


?>

<div>
  <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#period-modal">+ Tambah Periode</button>
        </div>
        <div class="card-body">
            <table id="period-table" class="table table-responsive">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
  </div>
    
  @include('livewire.pages.period.modal')

    @push('scripts')
    <script>
        const modalElement = document.getElementById('period-modal');
        const modal = new bootstrap.Modal(modalElement);

        var table = $('#period-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('datatables.period.index') }}',
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false,},
                {data: 'name', name: 'name', searchable: true, sortable: true},
                {data: 'action',  searchable: false, sortable: false,}
            ]
        });

        Livewire.on('show-modal', () => {
            $('#period-modal').modal('show')
        })

        Livewire.on('period-saved', () => { 
            $('#period-modal').modal('hide');
            table.destroy();
            table.ajax.reload();
        })

        Livewire.on('period-deleted', () => {
            alert('Periode Terhapus');
        })
       
    </script>
    @endpush
</div>
