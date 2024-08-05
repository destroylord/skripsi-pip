<div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Sub-Kriteria</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p>Tambahkan sesuai kriteria yang diinginkan sehingga menjadikan kriteria tersebut menjadi akurat dalam perhitungan.
                        </p>
                    </div>
                
                    <button class="btn btn-primary w-50" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#exampleModalCenter">+ Tambah Sub Kriteria</button>

                    <div class="col-lg-12 mt-4">
                        <form action="#">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Sub Kriteria</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach ($subCriterias as $criteriaGroup)
                                        @php $firstRow = true; @endphp
                                        @foreach ($criteriaGroup as $subCriteria)
                                        <tr>
                                            <td>{{ $loop->iteration == 1 ? $subCriteria->criteria->name : '' }}</td>
                                            <td>{{ $subCriteria->name }}</td>
                                            <td>{{ $subCriteria->value }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning" 
                                                            wire:click="editSubCriteria({{ $subCriteria->id }})"><i class='bx bxs-edit' ></i></a>
                                                <a href="#" class="btn btn-sm btn-danger"
                                                            wire:click="deleteSubCriteria({{ $subCriteria->id }})"><i class='bx bxs-trash' ></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                            </table>
                        </form>
                    </div>


                    {{-- Modal --}}
                    @include('livewire.pages.parameter.sub-criteria.modal')
                    
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            Livewire.on('show-modal', () => {
                $('#exampleModalCenter').modal('show');
            });
            Livewire.on('hide-modal', () => {
                $('#exampleModalCenter').modal('hide');
            });
            
            Livewire.on('.btn-close', () => {
                alert('close');
            })
        </script>
    @endpush
</div>
