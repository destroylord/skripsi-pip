<x-app-layout>
    <div class="row">      
        <div class="col-12 col-lg-3 col-md-6">
            <div class="card"> 
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Siswa</h6>
                            <h6 class="font-extrabold mb-0">{{  \App\Models\Student::count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Siswa
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Asal Sekolah</th>
                                <th>Alamat Sekolah</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <script type="text/javascript">
                    $(function() {
                        $('#table1').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax": "{{ url('api/get-student') }}",
                            "columns": [
                                { "data": "full_name" },
                                { "data": "gender" },
                                { "data": "birth_place" },
                                { "data": "birth_date" },
                                { "data": "religion" },
                                { "data": "kindergarten" },
                                { "data": "kindergarten_address" }
                            ]
                        });
                    });
                </script>
            </div>
        </div>

    </section>
        </div>
    </div>
</x-app-layout>