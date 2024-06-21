<table class="table table-bordered table-responsive" id="table-comparison" wid cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Rangking</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ number_format($student->result, 4) }}</td>
                <td>{{ $student->ranking <= 39 ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $student->ranking }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
<script>

    $(document).ready( function () {
            let comparisonDatatable = $('#table-comparison').DataTable();;

            $('#table-rangking').DataTable();

            $('#comparison-tab').click(function (){
                comparisonDatatable.destroy();
                comparisonDatatable = $('#table-comparison').DataTable();
            });
        });

    var options = {
        chart: {
            type: 'donut'
            },
            series: [
                    {{ $students->filter(fn($student) => $student->ranking <= 39)->count() }},
                    {{ $students->filter(fn($student) => $student->ranking > 39)->count() }}
                ],
            labels: ['Data yang sama', 'Data yang berbeda'],
            plotOptions: {
                pie: {
                    expandOnClick: false
                }
            }
        }
        
        

    var chart = new ApexCharts(document.querySelector("#chart-donout"), options);

    chart.render();
</script>
@endpush
