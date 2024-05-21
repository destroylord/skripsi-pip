@extends('templates.app')

@push('styles')
    <style>

.filterDiv {
float: left;
background-color: #2196F3;
color: #ffffff;
width: 500px;
line-height: 100px;
text-align: center;
margin: 2px;
display: none;
}

.show {
  display: block;
}
        /* Style the buttons */
.btn-category {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn-category:hover {
  background-color: #ddd;
}

.btn-category.active {
  background-color: #666;
  color: white;
}
    </style>
@endpush

@section('content')
    <section class="facility pt-200 pb-100">

     <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="myBtnContainer">
                    <button class="btn-category active" onclick="filterSelection('all')"> Semua</button>
                    <button class="btn-category" onclick="filterSelection('perpus')"> Perpustakaan</button>
                    <button class="btn-category" onclick="filterSelection('labkom')"> Lab Komputer</button>
                    {{-- <button class="btn-category" onclick="filterSelection('fruits')"> Fruits</button>
                    <button class="btn-category" onclick="filterSelection('colors')"> Colors</button> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                    <div class="filterDiv perpus">
                        <img src="{{ asset('img/fasilitas/perpus-1.jpg') }}" alt="Avatar" style="width:100%">
                    </div>
                    <div class="filterDiv perpus">
                        <img src="{{ asset('/img/fasilitas/perpus-2.jpg') }}" alt="Avatar"   style="width:100%">
                    </div>
                    <div class="filterDiv perpus">
                         <img src="{{ asset('/img/fasilitas/perpus-3.jpg') }}" alt="Avatar"  style="width:100%">
                    </div>
                    <div class="filterDiv perpus">
                        <img src="{{ asset('/img/fasilitas/perpus-4.jpg') }}" alt="Avatar" style="width:100%">
                    </div>

                    <div class="filterDiv labkom">
                        <img src="{{ asset('/img/fasilitas/labkom-1.jpg') }}" alt="Avatar" style="width:100%">
                    </div>
                    <div class="filterDiv labkom">
                        <img src="{{ asset('/img/fasilitas/labkom-2.jpg') }}" alt="Avatar" style="width:100%">
                    </div>
                    <div class="filterDiv labkom">
                        <img src="{{ asset('/img/fasilitas/labkom-3.jpg') }}" alt="Avatar" style="width:100%">
                    </div>
            </div>
        </div>
    </section>

    </section>

@push('scripts')
    <script>
        filterSelection("all")
        function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
        }

        function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
        }

        function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
        }
        element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn-category");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        }
    </script>
   
@endpush

@endsection