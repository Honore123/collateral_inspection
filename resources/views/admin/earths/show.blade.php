@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-6">
                <h4 class="ml-2"> Review report </h4>
            </div>
    <div class="col-6">
                <button class="btn btn-success btn-sm float-right mr-2" data-toggle="modal" data-target="#addPropertyModal">
                    Add new
                </button>
                <a class="btn btn-secondary btn-sm float-right mr-4" href="{{ route('admin.earths.index') }}" >
                    Back
                </a>
                <span class="help-block" id="message"></span>
                <div id="message"></div>
            </div>
</div>

<div class="modal fade" id="addPropertyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title">Modal Heading</p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

{{--        method="POST" action="{{ route('admin.properties.store') }}" --}}
            <!-- Modal body -->

            <div class="modal-body">
                <form id="addPropertyForm"  enctype="multipart/form-data" class="inpt">
                    @csrf
                    <div class="form-row form-horizontal">

                        <div class="form-group col-md-6">
                            <label class="required col-sm-3 col-form-label col-form-label-sm" for="area">Area</label>
                            <input class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', '') }}" required>
                            @if($errors->has('area'))
                                <span class="text-danger">{{ $errors->first('area') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required col-sm-6 col-form-label col-form-label-sm" for="acc_b">Ac / building</label>
                            <input class="form-control form-control-sm {{ $errors->has('acc_b') ? 'is-invalid' : '' }}" type="text" name="acc_b" id="acc_b" value="{{ old('acc_b', '') }}" required>
                            @if($errors->has('acc_b'))
                                <span class="text-danger">{{ $errors->first('acc_b') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row form-horizontal">

                        <div class="form-group col-md-6">
                            <label class="required col-sm-4 col-form-label col-form-label-sm" for="foundation">Foundation</label>
                            <input class="form-control form-control-sm {{ $errors->has('foundation') ? 'is-invalid' : '' }}" type="text" name="foundation" id="foundation" value="{{ old('foundation', '') }}" required>
                            @if($errors->has('foundation'))
                                <span class="text-danger">{{ $errors->first('foundation') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required col-sm-6 col-form-label col-form-label-sm" for="elevation">elevation</label>
                            <input class="form-control form-control-sm {{ $errors->has('elevation') ? 'is-invalid' : '' }}" type="text" name="elevation" id="elevation" value="{{ old('elevation', '') }}" required>
                            @if($errors->has('elevation'))
                                <span class="text-danger">{{ $errors->first('elevation') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row form-horizontal">

                        <div class="form-group col-md-6">
                            <label class="required col-sm-3 col-form-label col-form-label-sm" for="roof">Roof</label>
                            <input class="form-control form-control-sm {{ $errors->has('roof') ? 'is-invalid' : '' }}" type="text" name="roof" id="roof" value="{{ old('roof', '') }}" required>
                            @if($errors->has('roof'))
                                <span class="text-danger">{{ $errors->first('roof') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required col-sm-6 col-form-label col-form-label-sm" for="pavement">Pavement</label>
                            <input class="form-control form-control-sm {{ $errors->has('pavement') ? 'is-invalid' : '' }}" type="text" name="pavement" id="pavement" value="{{ old('upi', '') }}" required>
                            @if($errors->has('pavement'))
                                <span class="text-danger">{{ $errors->first('pavement') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row form-horizontal mb-o">
                        <div class="form-group col-sm-4">
                            <label class="required col-sm-6 col-form-label col-form-label-sm" for="ceiling">ceiling</label>
                            <div class="checkbox ml-1">
                                <label><input type="radio" name="ceiling" value="1"> Yes</label>
                                &nbsp;
                                <label><input type="radio" name="ceiling" value="0"> No</label>
                            </div>
                            @if($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="required col-sm-6 col-form-label col-form-label-sm" for="door_win">door_win</label>
                            <div class="checkbox ml-1">
                                <label class=""><input type="radio" name="door_win" value="1"> Yes</label>
                                &nbsp;
                                <label><input type="radio" name="door_win" value="0"> No</label>
                            </div>
                            @if($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="required col-sm-6 col-form-label col-form-label-sm" for="finish1">Plastered</label>
                            <div class="checkbox ml-1">
                                <label class=""><input type="radio" name="finish1" value="1"> Maram road</label>
                                &nbsp;
                                <label><input type="radio" name="finish1" value="2"> Tarmac road</label>
                            </div>
                            @if($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-row form-horizontal">
                        <div class="form-group col-md-6">
                            <label class="col-sm-5 col-form-label col-form-label-sm" for="fence_len">Building type</label>
                            <select class="form-control form-control-xs select2" name="fence_len" id="fence_len" style="width: 100%">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            @if($errors->has('fence_len'))
                                <span class="text-danger">{{ $errors->first('fence_len') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required col-sm-3 col-form-label col-form-label-sm" for="gate">Gate</label>
                            <select class="form-control form-control-sm select2 {{ $errors->has('gate') ? 'is-invalid' : '' }}" name="gate" id="gate" style="width: 100%" required>
                                <option value="1">Available</option>
                                <option value="2">Not Available</option>
                            </select>
                            @if($errors->has('gate'))
                                <span class="text-danger">{{ $errors->first('gate') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row form-horizontal">
                        <div class="form-group col-md-6">
                            <label class="required col-sm-3 col-form-label col-form-label-sm" for="s_water">s_water</label>
                            <select class="form-control form-control-sm select2 {{ $errors->has('s_water') ? 'is-invalid' : '' }}" name="s_water" id="s_water" style="width: 100%" required>
                                <option value="1">North</option>
                                <option value="2">South</option>
                                <option value="3">East</option>
                                <option value="4">West</option>
                            </select>
                            @if($errors->has('s_water'))
                                <span class="text-danger">{{ $errors->first('s_water') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-3 col-form-label col-form-label-sm" for="s_elect">s_electr</label>
                            <select class="form-control form-control-xs select2" name="s_elect" id="s_elect" style="width: 100%">
                                <option value="1">North</option>
                                <option value="2">South</option>
                                <option value="3">East</option>
                                <option value="4">West</option>
                            </select>
                            @if($errors->has('s_elect'))
                                <span class="text-danger">{{ $errors->first('s_elect') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row form-horizontal">
                        <div class="form-group col-md-6">
                            <label class="required col-sm-3 col-form-label col-form-label-sm" for="s_gas">s_gas</label>
                            <select class="form-control form-control-sm select2 {{ $errors->has('s_gas') ? 'is-invalid' : '' }}" name="s_gas" id="s_gas" style="width: 100%" required>
                                <option value="1">North</option>
                                <option value="2">South</option>
                                <option value="3">East</option>
                                <option value="4">West</option>
                            </select>
                            @if($errors->has('s_gas'))
                                <span class="text-danger">{{ $errors->first('s_gas') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-3 col-form-label col-form-label-sm" for="s_internet">s_internet</label>
                            <select class="form-control form-control-xs select2" name="s_internet" id="s_internet" style="width: 100%">
                                <option value="1">North</option>
                                <option value="2">South</option>
                                <option value="3">East</option>
                                <option value="4">West</option>
                            </select>
                            @if($errors->has('s_internet'))
                                <span class="text-danger">{{ $errors->first('s_internet') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <input type="hidden" name="earth_id" id="earth_id" value="{{ $earth->id }}">
                    <div class="form-group mt-3">
                        <button type="submit" id="btnSave" class="btn btn-sm btn-secondary float-left">Close</button>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" id="btnSave" class="btn btn-sm btn-primary float-right">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="card card-primary card-outline" id="card">


    <div class="card-body">
        <div class="form-group">
            <div class="attachment-block clearfix">
                <div class="attachment-img">
                    <span class="float-right badge bg-danger mt-2">New property for :</span>
                </div>
                <div class="attachment-pushed">
                    <h4 class="attachment-heading">
                        <a href="#">{{ $earth->upi }}</a></h4>
                    <div class="attachment-text">
                        {{ $earth->owner }} > {{ $earth->property_type }} <a href="#">more</a>
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
                    <th scope="col">Area</th>
                    <th scope="col">Roof</th>
                    <th scope="col">Value</th>
                    <th> &nbsp; </th>
                </tr>
                </thead>
                <tbody>
                @foreach($properties as $prop)
                    @if($earth->id == $prop->earth_id)
                        <tr>
                            <th scope="row">1</th>
                            <td><img src="{{ asset('assets/img/adminLTELogo.png') }}" width="40" height="30" class="img-responsive img-thumbnail"></td>
                            <td> {{ $prop->area ?? '' }} </td>
                            <td> {{ $prop->roof ?? '' }} </td>
                            <td> {{ $prop->value ?? 'N/A' }} </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.earths.show', $earth->id) }}">
                                    View
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.earths.index', $earth->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('admin.earths.destroy', $earth->id) }}" method="POST" onsubmit="return confirm('Are you Sure');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                </form>

                            </td>
                        </tr>
                    @else

                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="form-group mr-2">
                <button class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#addPropertyModal">
                    <i class="fas fa-plus"></i> Add new
                </button>
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
    @parent
    <script>
        jQuery('#addPropertyForm').submit(function(e){
            e.preventDefault();
            jQuery('#btnSave').attr('disable', true);
            jQuery('#btnSave').attr('value', "Wait ...");
            jQuery.ajax({
                url: "{{ route('admin.properties.store') }}",
                data: jQuery('#addPropertyForm').serialize(),
                type: "POST",
                success:function(result)
                {
                    toastr.success(result.msg);
                    jQuery("#addPropertyForm")[0].reset();
                    jQuery('#btnSave').attr('disable', false);
                    //jQuery('.datatable').DataTable().ajax.reload();
                    //jQuery('#addPropertyT').ajax.reload();
                    jQuery("#addPropertyT").load("{{route('admin.earths.show', $earth->id)}} #addPropertyT");
                    jQuery('#btnSave').attr('value', "Save");
                    jQuery("#addPropertyModal").modal('hide');
                }
            });
        });
    </script>
@endsection