<x-app-layout>
    <div class="row">      
        <div class="col-lg-3 col-md-12 col-3 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img
                        src="../admin/assets/img/icons/unicons/chart-success.png"
                        alt="chart success"
                        class="rounded" />
                    </div>
                </div>
                <span class="fw-medium d-block mb-1">Total Siswa</span>
                <h3 class="card-title mb-2">{{  \App\Models\Student::count() }}</h3>
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