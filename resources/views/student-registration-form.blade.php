@extends('templates.app')

@section('content')

<div style="padding-top: 150px">
<div class="container">
  <div class="text-center mb-4">
    <h3>Formulir Pendaftaran Peserta Didik Baru (PPDB)</h3>
    <p>UPTD SPF SDN Kotakulon 3 Bondowoso</p>
  </div>

  <div class="row">
    <div class="col-lg-12">        
        <form method="POST" enctype="multipart/form-data" class="my-2 py-2" action="{{ route('registration.student.store') }}" autocomplete="off">
         @csrf
         
          @include('registration-student.personal-biodata')
          @include('registration-student.parent-biodata')
          @include('registration-student.files-biodata')

          <div class="mt-4">
            <div class="form-check">
              <input type="checkbox" name="" class="form-check-input" id="checkSubmit" required="required">
              <label class="form-check-label" for="checkSubmit">Saya yang bertandatangan dibawah ini menyatakan bahwa data yang tertera diatas adalah yang sebenarnya.</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-lg radius mt-2 w-10" disabled="disabled">Simpan Formulir Pendaftaran</button>
          </div>
        </form>
    </div>
  </div>
</div>

</div>

     
@endsection

@include('registration-student.scripts')