<table class="table table-bordered" id="" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
           @foreach ($query->criterias as $item)
               <th>{{ $item->name }}</th>
           @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($query->students as $student)
            <tr>
                <td>{{ $student->full_name }}</td>
                @foreach ($student->normalizations as $normalization)
                    <th>{{ $normalization }}</th>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>