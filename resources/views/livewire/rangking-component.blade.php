<div>
    <table class="table table-bordered table-responsive" id="table-rangking" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
           @foreach ($criterias as $item)
               <th>{{ $item->name }}</th>
           @endforeach
           <th>Hasil</th>
           <th>Rangking</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr {!! $loop->iteration <= 39 ? 'style="background-color: yellow;"' : '' !!}>
                
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->full_name }}</td>
                @foreach ($student->rangkings as $rangking)
                    <th>{{ $rangking }}</th>
                @endforeach
                <th>{{ $student->result }}</th>
                <th>{{ $student->ranking }}</th>
            </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
    <script>
        $(document).ready( function () {  
            // $('#table-rangking').DataTable();
        })
    </script>
@endpush
</div>
