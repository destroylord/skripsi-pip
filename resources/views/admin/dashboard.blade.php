<x-app-layout>
    <div class="row">
        
        @foreach ($data as $item)
        <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
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
                <span class="fw-medium d-block mb-1">{{ $item['name'] }}</span>
                <h3 class="card-title mb-2">{{ $item['title'] }}</h3>
            </div>
            </div>
        </div>
        @endforeach
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    @endpush
</x-app-layout>