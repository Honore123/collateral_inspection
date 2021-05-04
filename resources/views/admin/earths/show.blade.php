@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-6">
                <h5 class="ml-2"> Show report </h5>
            </div>
    <div class="col-6">
{{--                <button class="btn btn-success btn-sm float-right mr-2" data-toggle="modal" data-target="#addPropertyModal">--}}
{{--                    Add new--}}
{{--                </button>--}}
                <a class="btn btn-secondary btn-sm float-right mr-4" href="{{ route('admin.earths.index') }}" >
                    Back
                </a>
                <span class="help-block" id="message"></span>
                <div id="message"></div>
            </div>
</div>

<div class="card card-primary card-outline" id="card">

    <div class="card-body">
        <div class="form-group">
            <div class="attachment-block clearfix">
                <div class="attachment-img">
                    <span class="float-right badge bg-danger mt-2">Property for :</span>
                </div>
                <div class="attachment-pushed">
                    <h4 class="attachment-heading">
                        <a href="#">UPI: {{ $earth->propertyUPI }}</a></h4>
                    <div class="attachment-text">
                        {{ $earth->propertyOwner }} / {{ $earth->propertyType }} <a href="{{ route('admin.earths.reviewAll', $earth->id) }}"> more... </a>
                    </div>
                    <!-- /.attachment-text -->
                </div>
                <!-- /.attachment-pushed -->
            </div>
            <table class="table table-hover" id="addPropertyT">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Type</th>
                    <th scope="col">Size</th>
                    <th scope="col">Accom.</th>
                </tr>
                </thead>
                <tbody>
                @if($earth->propertyType == 'Land with Building')
                @forelse($properties as $prop)
                    @if($earth->id == $prop->earth_id)
                        <tr>
                            <th scope="row">
                                {{ $loop->iteration++ }}
                            </th>
                            <td><img src="{{ asset("storage/$prop->image1") }}" width="40" height="30" class="img-responsive img-thumbnail"></td>
                            <td> {{ $prop->buildingType ?? '' }} </td>
                            <td> {{ $prop->builtUpArea ?? '' }} </td>
                            <td> {{ $prop->accommodation ?? '' }} </td>
                        </tr>
                    @endif
                @empty
                        <tr>
                            <td colspan="4"> No data here </td>
                        </tr>
                @endforelse
                @else
                    @forelse($lands as $land)
                        @if($earth->id == $land->earth_id)
                            <tr>
                                <th scope="row">
                                    {{ $loop->iteration++ }}
                                </th>
                                <td><img src="{{ asset("storage/$land->image1") }}" width="40" height="30" class="img-responsive img-thumbnail"></td>
                                <td> {{ $land->currentUsage ?? '' }} </td>
                                <td> N/A </td>
                                <td> N/A </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4"> No data here </td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
{{--            <div class="form-group mr-2">--}}
{{--                <button class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#addPropertyModal">--}}
{{--                    <i class="fas fa-plus"></i> Add new--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
@endsection