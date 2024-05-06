<section class="mt-4">
    <h4>Upload Berkas Persyaratan</h4>
        <div class="row">
            <div class="col-md-4 mt-4">
                <label>Lembar fotokopi Akte Kelahiran</label>
                <input type="file" class="form-control" accept="application/pdf" name="birth_certificate">
                <x-input-error :messages="$errors->get('birth_certificate')" class="mt-2" />
            </div>
            <div class="col-md-4 mt-4">
                <label>Lembar fotokopi Kartu Keluarga</label>
                <input type="file" class="form-control" accept="application/pdf" name="family_card">
                <x-input-error :messages="$errors->get('family_card')" class="mt-2" />
            </div>
            <div class="col-md-4 mt-4">
                <label>1 Lembar fotokopi Ijazah TK</label>
                <input type="file" name="kindergarten_certificate" accept="application/pdf" id="" class="form-control">
                <x-input-error :messages="$errors->get('kindergarten_certificate')" class="mt-2" />
            </div>
        </div>
</section>
