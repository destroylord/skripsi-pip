<?php

use function Livewire\Volt\{state, layout, computed, rules, title, form, on};
use App\Livewire\Forms\PeriodForm;
use App\Models\Period;

layout('layouts.app');
form(PeriodForm::class);
title('Periode');

$savePeriod = function() {
   $this->form->save();
   $this->form->reset();

   $this->dispatch('period-saved');
   $this->dispatch('updated-period');
};

$editPeriod = function($id) {
    $period = Period::find($id);

    $this->form->setPeriod($period);
    $this->dispatch('show-modal');
    $this->dispatch('updated-period');
};

$deletePeriod = function (Period $period) {
    $period->delete();
    $this->dispatch('period-deleted');
    $this->dispatch('updated-period');
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
        <div class="card-body" wire:ignore>
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
            table.ajax.reload();
        })

        Livewire.on('period-deleted', () => {
            alert('Periode Terhapus');
            table.ajax.reload();
        })

       
    </script>
    @endpush
</div>
