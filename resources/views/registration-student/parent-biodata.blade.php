<section class="mt-4">
    <h4>Registrasi Peserta Didik</h4>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <label class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" placeholder="Nama Ayah" name="father_name" value="{{ old('father_name') }}">
                <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label class="form-label">Pekerjaan Ayah</label>
                <input type="text" class="form-control" placeholder="Contoh: Wiraswasta" name="father_occupation" value="{{ old('father_occupation') }}">
                <x-input-error :messages="$errors->get('father_occupation')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="birth_place" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="father_birth_place" placeholder="Contoh: Bondowoso" value="{{ old('father_birth_place') }}"/>
                <x-input-error :messages="$errors->get('father_birth_place')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="father_birth_date" value="{{ old('father_birth_date') }}">
                <x-input-error :messages="$errors->get('father_birth_date')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label>Alamat Ayah</label>
                <textarea name="father_address" id="" placeholder="Tulis alamat lengkap sesuai KK" cols="30" rows="2" class="form-control">{{ old('father_address') }}</textarea>
                <x-input-error :messages="$errors->get('father_address')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="distance" class="form-label">Pekerjaan</label>
                <select class="form-select" name="subcriteria_id[]">
                    <option selected disabled>Pilih Jenis Pekerjaan</option>
                    @foreach ( $typeWorks as $subCriteria)
                        <option value="{{ $subCriteria->id }}" {{ old('distance') == $subCriteria->id ? 'selected' : '' }}>{{ $subCriteria->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('distance')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="distance" class="form-label">Penghasilan</label>
                <select class="form-select" name="subcriteria_id[]">
                    <option selected disabled>Pilih Jenis Penghasilan</option>
                    @foreach ( $incomes as $subCriteria)
                        <option value="{{ $subCriteria->id }}" {{ old('distance') == $subCriteria->id ? 'selected' : '' }}>{{ $subCriteria->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('distance')" class="mt-2" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mt-4">
                <label for="mother_name" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name') }}" placeholder="Nama Ibu"/>
                <x-input-error :messages="$errors->get('mother_name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label class="form-label">Pekerjaan Ibu</label>
                <input type="text" class="form-control" value="{{ old('mother_occupation') }}" placeholder="Contoh: Ibu Rumah Tangga" name="mother_occupation">
                <x-input-error :messages="$errors->get('mother_occupation')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="birth_place" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="mother_birth_place" value="{{ old('mother_birth_place') }}" placeholder="Bondowoso"/>
                <x-input-error :messages="$errors->get('mother_birth_place')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="mother_birth_date" value="{{ old('mother_birth_date') }}" placeholder="State"/>
                <x-input-error :messages="$errors->get('mother_birth_date')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label class="form-label">Alamat Ibu</label>
                <textarea name="mother_address" id="" value="{{ old('mother_address') }}" placeholder="Tulis alamat lengkap sesuai KK" cols="30" rows="2" class="form-control"></textarea>
                <x-input-error :messages="$errors->get('mother_address')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label>Pekerjaan Ibu</label>
                <div class="mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" checked id="flexSwitchCheckDefault"
                            onchange="toggleIbu(this)">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Ibu Rumah tangga</label>
                    </div>
                </div>
            </div>

            <div id="pekerjaan-ibu" class="{{ old('mother_occupation') ? '' : 'd-none' }}">
                <div class="mt-4">
                    <label for="distance" class="form-label">Pekerjaan</label>
                    <select class="form-select" name="subcriteria_id[]">
                        <option selected disabled>Pilih Jenis Pekerjaan</option>
                        @foreach ( $typeWorks as $subCriteria)
                            <option value="{{ $subCriteria->id }}"
                                {{ old('subcriteria_id') == $subCriteria->id ? 'selected' : '' }}>{{ $subCriteria->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('subcriteria_id[]')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="distance" class="form-label">Penghasilan</label>
                    <select class="form-select" name="subcriteria_id[] }}]">
                        <option selected disabled>Pilih Jenis Penghasilan</option>
                        @foreach ( $incomes as $subCriteria)
                            <option value="{{ $subCriteria->id }}"
                                {{ old('distance') == $subCriteria->id ? 'selected' : '' }}>{{ $subCriteria->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                </div>
            </div>
            <script>
                function toggleIbu(switchIbu) {
                    const pekerjaanIbu = document.getElementById("pekerjaan-ibu");
                    if (switchIbu.checked) {
                        pekerjaanIbu.classList.add("d-none");
                    } else {
                        pekerjaanIbu.classList.remove("d-none");
                    }
                }
            </script>

        </div>
    </div>
</section>
