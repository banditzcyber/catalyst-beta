<table id="viewdata" class="table table-bordered tx-12 table-hover">
    <thead class="thead-primary">
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Started at</th>
            <th>Finished at</th>
            <th>Comment</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $view)
            @php

                if ($view->status == 1) {
                    $color = 'bg-success';
                    $text = 'Approved';
                } elseif ($view->status == 2) {
                    $color = 'bg-danger';
                    $text = 'Rejected';
                } else {
                    $color = 'bg-warning';
                    $text = 'Submitted';
                }
            @endphp
            <tr>
                <td>{{ $view->employee_id }}</td>
                <td>{{ $view->employee_name }}</td>
                <td>{{ $view->item_id }}</td>
                <td>{{ $view->item_name }}</td>
                <td>{{ $view->started_at }}</td>
                <td>{{ $view->finished_at }}</td>
                <td>{{ $view->status }}</td>
                <td class="{{ $color }} tx-center" style="cursor: pointer" onclick="show({{ $view->id }})">
                    {{ $text }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- 
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#viewdata").DataTable();
        });
    </script>
@endpush --}}
