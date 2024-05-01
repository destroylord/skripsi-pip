<table class="table table-bordered" id="" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
           @foreach ($query->criterias as $item)
               <th>{{ $item->name }}</th>
           @endforeach
           <th>Hasil</th>
           <th>Rangking</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($query->students as $student)
            <tr>
                <td>{{ $student->full_name }}</td>
                @foreach ($student->rangkings as $rangking)
                    <th>{{ $rangking }}</th>
                @endforeach
                <th>{{ $student->result }}</th>
                <th>{{ $loop->iteration }}</th>
            </tr>
        @endforeach
    </tbody>
</table>