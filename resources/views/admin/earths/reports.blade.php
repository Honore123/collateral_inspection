@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-6">
            <h4 class="ml-2"> Inspection </h4>
        </div>
        <div class="col-6">
            <a class="btn btn-success btn-sm float-right mr-2" href="{{ route('admin.earths.index') }}" data-toggle="modal" data-target=".addEarthModal">
                Add new
            </a>
            <a class="btn btn-secondary btn-sm float-right mr-4" href="{{ route('admin.earths.index') }}" data-toggle="modal" data-target=".addEarthModal">
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
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Inspection ID</th>
                        <th>Inspection Date</th>
                        <th>Property type</th>
                        <th>Inspected By</th>
                        <th>Property UPI</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($earth as $earths)
                    <tr>
                        <td>1</td>
                        <td><a href="pages/examples/invoice.html">{{ $earths->id ?? '' }}</a></td>
                        <td>{{ $earths->inspectionDate ?? '' }}</td>
                        <td>{{ $earths->propertyUPI ?? '' }}</td>
                        <td>
                            @foreach($users as $user)
                                @if( $earths->users_id != $user->id )
                                    {{ $user->name ?? ''}}
                                @else
                                    No user found
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $earths->propertyType ?? '' }}</td>
                        <td>
                            @if($earths->status == 0)
                                <span class="badge badge-warning">Unkown</span>
                            @elseif($earths->status == 1)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($earths->status == 2)
                                <span class="badge badge-success">Approved</span>
                            @elseif($earths->status == 3)
                                <span class="badge badge-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.earths.reviewAll', $earths->id) }}" class="btn btn-xs btn-info  ">Review</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text text-center">
                                No Inspection to Show now :(
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>

@endsection