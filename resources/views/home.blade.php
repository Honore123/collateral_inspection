@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row mb-3">
          <div class="col-sm-6">
            <h4 class="m-0">Dashboard</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $settings1['chart_title'] }}</span>
                        <span class="info-box-number">
                  {{ number_format($settings1['total_number']) }}
                  <small>%</small>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $settings4['chart_title'] }}</span>
                        <span class="info-box-number">{{ number_format($settings4['total_number']) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $settings3['chart_title'] }}</span>
                        <span class="info-box-number">{{ number_format($settings3['total_number']) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $settings2['chart_title'] }}</span>
                        <span class="info-box-number">{{ number_format($settings2['total_number']) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row pt-5">
            <!-- Left col -->
            <div class="col-md-7">

                <!-- TABLE: LATEST Inspection (report) -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Inspection</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive table-responsive-sm">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Inspection ID</th>
                                    <th>Inspection Date</th>
                                    <th>Property type</th>
{{--                                    <th>Inspected By</th>--}}
                                    <th>Property UPI</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($earths as $earth)
                                    <tr>
                                        <td><a href="{{ route('admin.earths.reviewAll', $earth->id) }}">#{{ $earth->id ?? '' }}</a></td>
                                        <td>{{ $earth->inspectionDate ?? '' }}</td>
                                        <td>{{ $earth->propertyUPI ?? '' }}</td>
{{--                                        <td>--}}
{{--                                            @foreach($users as $user)--}}
{{--                                                @if( $earth->users_id == $user->id )--}}
{{--                                                    {{ $user->name ?? ''}}--}}
{{--                                                @else--}}
{{--                                                    No user found--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
                                        <td>{{ $earth->propertyType ?? '' }}</td>
                                        <td>
                                            @if($earth->status == 0)
                                                <span class="badge badge-warning">Unkown</span>
                                            @elseif($earth->status == 1)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($earth->status == 2)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($earth->status == 3)
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.earths.reviewAll', $earth->id) }}" class="btn btn-xs btn-info  ">Review</a>
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
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-5">
                <!-- Calendar -->
                <div class="card bg-gradient-success">
                    <div class="card-header border-0">

                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Calendar
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0" style="width: 100%">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
@endsection

@section('fccss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
@endsection

@section('fcjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>

  $('#calendar').datepicker({
  todayHighlight: true,
  sideBySide: false,
  weekStart: 1,
});

</script>
@endsection