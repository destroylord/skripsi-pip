<div class="col-md-12">
    <form wire:submit.prevent="saveCriteria" method="POST" class="form" autocomplete="off">
        <div class="form-group col-form-label row align-items-center">
            <div class="col-lg-2 col-3">
                <label for="first-name">Nama Kriteria</label>
            </div>
            <div class="col-lg-10 col-9">
                <select wire:model="form.name" class="form-select" id="">
                    <option value="" selected disabled>Pilih</option>
                    @foreach ($selectedValue as $item)
                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                @error('form.name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-form-label row align-items-center">
            <div class="col-lg-2 col-3">
                <label for="last-name">Nilai</label>
            </div>
            <div class="col-lg-3 col-9">
                <input type="number" class="form-control" wire:model="form.score" placeholder="Contoh: 10">
                @error('form.score')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-7">
                <small>Nilai seluruh kriteria tidak boleh diinputkan lebih dari 100</small>
            </div>
        </div>

            <div class="form-group col-form-label row align-items-center">
            <div class="col-lg-2 col-3">
                <label for="last-name">Tipe</label>
            </div>
            <div class="col-lg-3 col-9">
                <select name="type" wire:model="form.type" class="form-control" id="">
                    <option value="0" selected>Pilih</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                </select>
                @error('form.type')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group col-form-label row align-items-center">
            <div class="col-lg-2 col-3">
                @if($isEdit == true)
                    <button class="btn btn-primary" wire:click="saveCriteria">Submit</button>
                @else
                    <button class="btn btn-primary" 
                        id="btn-save"  
                        wire:click="saveCriteria"
                        {{ $criterias->sum('score') >= 100 ? 'disabled' : '' }} >Submit</button>
                @endif
            </div>
        </div>
    </form>
</div>