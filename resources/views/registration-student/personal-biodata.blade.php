<section>  
    <h4>Data diri</h4>
    <div class="row">
        <div class="col-md-6 mt-4">
            <label for="full_name" class="form-label">Nama Lengkap</label>
            <input id="full_name" class="form-control" placeholder="Nama Lengkap" type="text" name="full_name" value="{{ old('full_name') }}" autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-4">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input type="radio" name="gender" value="L" class="form-check-input" {{ old('gender') == 'L' ? 'checked' : '' }}>
                <label class="form-check-label">Laki-laki</label>
            </div>
            <div class="form-check">
                <input type="radio" name="gender" value="P" class="form-check-input" {{ old('gender') == 'P' ? 'checked' : '' }}>
                <label class="form-check-label">Perempuan</label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="birth_place" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="birth_place" value="{{ old('birth_place') }}" placeholder="Contoh: Bondowoso"/>
            <x-input-error :messages="$errors->get('birth_place')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="birth_date" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" placeholder="State"/>
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="religion" class="form-label">Agama</label>
            <select class="form-select" name="religion">
                <option selected disabled>Pilih sesuai keyakinan</option>
                <option value="1" {{ old('religion') == '1' ? 'selected' : '' }}>Islam</option>
                <option value="2" {{ old('religion') == '2' ? 'selected' : '' }}>Khatolik</option>
                <option value="3" {{ old('religion') == '3' ? 'selected' : '' }}>Hindu</option>
                <option value="4" {{ old('religion') == '4' ? 'selected' : '' }}>Budha</option>
                <option value="5" {{ old('religion') == '5' ? 'selected' : '' }}>Konghucu</option>
            </select>
            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="kindergarten" class="form-label">Asal TK</label>
            <input type="text" class="form-control" placeholder="Contoh: TK Al mawaddah Bondowoso" name="kindergarten" value="{{ old('kindergarten') }}" />
            <x-input-error :messages="$errors->get('asal_tk')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="kindergarten_address" class="form-label">Alamat TK</label>
            <textarea name="kindergarten_address" id="" placeholder="Tulis alamat lengkap" cols="30" rows="3" class="form-control">{{ old('kindergarten_address') }}</textarea>
            <x-input-error :messages="$errors->get('kindergarten_address')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="address" class="form-label">Alamat Siswa</label>
            <textarea class="form-control" id="address" rows="3" placeholder="Tulis alamat lengkap sesuai KK" name="home_address">{{ old('home_address') }}</textarea>
            <x-input-error :messages="$errors->get('home_address')" class="mt-2" />
        </div>
        <div class="col-md-6 mt-3">
            <label for="distance" class="form-label">Jarak Tempuh*</label>
            <small class="text-danger">Pilih berdasarkan jarak tempuh ke sd kotakulon 3</small>
            <select class="form-select" name="subcriteria_id[{{ $criterias[1] }}]">
                <option selected disabled>Pilih jarak tempuh ke sekolah</option>
                @foreach (  $mileages as $subCriteria)
                    <option value="{{ $subCriteria->id }}" {{ old('subcriteria_id') == $subCriteria->id ? 'selected' : '' }}>{{ $subCriteria->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('subcriteria_id[]')" class="mt-2" />
        </div>
    </div>
</section>
