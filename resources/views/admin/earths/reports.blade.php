@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-6">
            <h4 class="ml-2"> Inspection </h4>
        </div>
        <div class="col-6">
            <a class="btn btn-secondary btn-sm float-right mr-5" href="#">
                Filter
            </a>
            <span class="help-block" id="message"></span>
            <div id="message"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Latest Inspection</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered stripe table-hover datatable datatable-report" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Inspection ID</th>
                        <th>Inspection Date</th>
                        <th>Property UPI</th>
                        <th>Property type</th>
                        <th>Inspected By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($earth as $earths)
                    <tr>
                        <td>{{$loop->iteration++}}</td>
                        <td>CIS000{{$earths->id}}</td>
                        <td>{{ $earths->inspectionDate ?? '' }}</td>
                        <td>UPI {{ $earths->propertyUPI ?? '' }}</td>
                        <td>{{ $earths->propertyType ?? '' }}</td>
                        <td>
                            @foreach($users as $user)
                                @if( $earths->users_id == $user->id )
                                    {{ $user->name ?? ''}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($earths->status == 0)
                                <span class="badge badge-warning">Unknown</span>
                            @elseif($earths->status == 1)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($earths->status == 2)
                                <span class="badge badge-success">Approved</span>
                            @elseif($earths->status == 3)
                                <span class="badge badge-danger">Rejected</span>
                            @elseif($earths->status == 4)
                                <span class="badge badge-info">Modify</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.earths.reviewAll', $earths->id) }}" class="btn btn-xs btn-info  ">Review</a>
                            @if($earths->status == 1)
                                <a href="{{ route('admin.earths.edit', $earths->id) }}" class="btn btn-xs btn-outline-warning">Edit</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>

@section('scripts')
    <script>
        $(function () {
            $.extend(false, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-report:not(.ajaxTable)').DataTable()

        })

    </script>
@endsection
@endsection