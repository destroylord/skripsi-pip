
<div>
    <div class="d-flex justify-content-center gap-2">
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
            <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-criteria"
                aria-controls="navs-pills-top-criteria"
                aria-selected="true">
                Kriteria
            </button>
            </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                id="comparison-tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-subcriteria"
                aria-controls="navs-pills-top-subcriteria"
                aria-selected="false">
                Sub-Kriteria
            </button>
            </li>
        </ul>
    </div>
    <div>
        <select class="form-select" 
            id="exampleFormControlSelect1"
            wire:model.live="period">
            <option selected="0">Pilih Periode </option>
            @foreach ($periods as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
 </div>

  <div class="tab-content">
    <div class="tab-pane fade show active" id="navs-pills-top-criteria" role="tabpanel">
        <livewire:CriteriaComponent :$criterias :$period key="{{ now() }}"/>
    </div>
     <div class="tab-pane fade" id="navs-pills-top-subcriteria" role="tabpanel">
        {{-- @livewire('pages.parameter.sub-criteria.index') --}}
    </div>
  </div>
</div>