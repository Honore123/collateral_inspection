@extends('layouts.admin')
@section('content')
@can('earth_access')
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
@endcan
<div class="card" id="card">
    <div class="card-header">
        Inspection list
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered stripe table-hover datatable datatable-Earth" style="width: 100%" id="earthTable">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Owner
                        </th>
                        <th>
                            Property UPI
                        </th>
                        <th>
                            Property type
                        </th>
                        <th>
                            Inspected by
                        </th>
                        <th>
                            Inspection date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            More
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($earths as  $earth)
                        <tr>
                            <td>
                                {{ $earth->id ?? '' }}
                            </td>
                            <td>
                                {{ $earth->propertyOwner }}
                            </td>
                            <td>
                                {{ $earth->propertyUPI ?? '' }}
                            </td>
                            <td>
                                {{ $earth->propertyType ?? '' }}
                            </td>
                            <td>
                                @foreach($users as $user)
                                    @if( $earth->users_id == $user->id )
                                        {{ $user->name ?? ''}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{ $earth->inspectionDate ?? '' }}
                            </td>
                            <td>
                                @if($earth->status == 1)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($earth->status == 2)
                                    <span class="badge badge-success">Approved</span>
                                @elseif($earth->status == 3)
                                    <span class="badge badge-danger">Rejected</span>
                                @elseif($earth->status == 4)
                                    <span class="badge badge-info">Modify</span>
                                @endif
                            </td>
                            <td style="width: max-content;">
                                <div class="dropdowns">
                                    <button onclick="myFunctions()" class="dropbtns">
                                        Action <i class="fas fa-caret-down"></i>
                                    </button>
                                    <div id="myDropdowns" class="dropdown-contents">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.earths.show', $earth->id) }}">
                                                <i class="fal fa-eye"></i> View
                                            </a>
                                            <a class="btn btn-sm btn-outline-info mt-1" href="{{ route('admin.earths.index', $earth->id) }}"
                                               data-toggle="modal" data-target="changeStatusModal">
                                                <i class="fal fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.earths.destroy', $earth->id) }}" method="POST" onsubmit="return confirm('Are you Sure');" style="display: inline-block; width: 100%">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-block mt-1"><i class="fal fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    
    <!-- Modal -->

    <div class="modal fade addEarthModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addEarthModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Inspection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                <!-- FORM -->

                <form id="addEarthForm" method="POST" enctype="multipart/form-data" class="inpt">
            @csrf
            <div class="form-row form-horizontal">
                <div class="form-group col-md-6">
                    <label class="required col-sm-3 col-form-label col-form-label-sm" for="inspectionDate">Date</label>
                    <input class="form-control form-control-sm {{ $errors->has('inspectionDate') ? 'is-invalid' : '' }}" type="date" name="inspectionDate" id="inspectionDate" value="{{ old('inspectionDate', '') }}" required>
                    @if($errors->has('inspectionDate'))
                        <span class="text-danger">{{ $errors->first('inspectionDate') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>
                <div class="form-group col-md-6">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="propertyUPI">Property UPI</label>
                <input class="form-control form-control-sm {{ $errors->has('propertyUPI') ? 'is-invalid' : '' }}" type="text" name="propertyUPI" id="propertyUPI" value="{{ old('propertyUPI', '') }}" placeholder="UPI/4565/983" required>
                @if($errors->has('propertyUPI'))
                    <span class="text-danger">{{ $errors->first('propertyUPI') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            </div>
            <div class="form-row form-horizontal">
                <div class="form-group col-md-6">
                    <label class="required col-sm-3 col-form-label col-form-label-sm" for="propertyOwner">Owner</label>
                    <input class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="propertyOwner" id="propertyOwner" value="{{ old('propertyOwner', '') }}" placeholder="Honore" required>
                    @if($errors->has('propertyOwner'))
                        <span class="text-danger">{{ $errors->first('propertyOwner') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>
                <div class="form-group col-md-6">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="plotSize">Plot size</label>
                <input class="form-control form-control-sm {{ $errors->has('plotSize') ? 'is-invalid' : '' }}" type="text" name="plotSize" id="plotSize" value="{{ old('plotSize', '') }}" placeholder="20 Sqm" required>
                @if($errors->has('plotSize'))
                    <span class="text-danger">{{ $errors->first('plotSize') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            </div>
            <div class="form-row form-horizontal">
                <div class="form-group col-md-6">
                <label class="required col-sm-3 col-form-label col-form-label-sm" for="tenureType">Tenure</label>
                    <select class="form-control form-control-sm select2 {{ $errors->has('tenureType') ? 'is-invalid' : '' }}" name="tenureType" id="tenureType" style="width: 100%" required>
                        @foreach($tt as $id => $tti)
                            <option value="{{ $tti }}">{{ $tti }}</option>
                        @endforeach
                    </select>
                @if($errors->has('tenureType'))
                    <span class="text-danger">{{ $errors->first('tenureType') }}</span>
                @endif
                <span class="help-block"></span>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="propertyType">Property type</label>
                    <select class="form-control form-control-xs select2" name="propertyType" id="propertyType" style="width: 100%">
                        @foreach($pt as $id => $pti)
                            <option value="{{ $pti }}">{{ $pti }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('propertyType'))
                        <span class="text-danger">{{ $errors->first('propertyType') }}</span>
                    @endif
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-row form-horizontal mb-o">
                <div class="form-group col-sm-4">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="encumbranes">Encumbranes</label>
                <div class="checkbox ml-1">
                    <label class="col-form-label-sm"><input type="radio" name="encumbranes" value="1"> Yes</label>
                    &nbsp;
                    <label class="col-form-label-sm"><input type="radio" name="encumbranes" value="0"> No</label>
                </div>
                @if($errors->has('encumbranes'))
                    <span class="text-danger">{{ $errors->first('encumbranes') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
                <div class="form-group col-sm-4">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="mortgaged">Mortgaged</label>
                <div class="checkbox ml-1">
                    <label class="col-form-label-sm"><input type="radio" name="mortgaged" value="1"> Yes</label>
                    &nbsp;
                    <label class="col-form-label-sm"><input type="radio" name="mortgaged" value="0"> No</label>
                </div>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
                <div class="form-group col-sm-4">
                <label class="required col-sm-8 col-form-label col-form-label-sm" for="servedBy">Served by (Road)</label>
                <div class="checkbox ml-1">
                    <label class="col-form-label-sm"><input type="radio" name="servedBy" value="Maram"> Maram </label>
                    &nbsp;
                    <label class="col-form-label-sm"><input type="radio" name="servedBy" value="Tarmac"> Tarmac </label>
                    &nbsp;
                    <label class="col-form-label-sm"><input type="radio" name="servedBy" value="Paved"> Parved </label>
                </div>
                @if($errors->has('servedBy'))
                    <span class="text-danger">{{ $errors->first('servedBy') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            </div>
            
            <div class="form-row form-horizontal">
                <div class="form-group col-md-6">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="building_type">Building type</label>
                <select class="form-control form-control-xs select2" name="village" id="village" style="width: 100%">
                    @foreach($bt as $id => $bti)
                        <option value="{{ $bti }}">{{ $bti }}</option>
                    @endforeach
                </select>
                @if($errors->has('building_type'))
                    <span class="text-danger">{{ $errors->first('building_type') }}</span>
                @endif
                <span class="help-block"></span>
                </div> 
                <div class="form-group col-md-6">
                <label class="required col-sm-3 col-form-label col-form-label-sm" for="status">Status</label>
                <select class="form-control form-control-sm select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" style="width: 100%" required>
                    <option>Status</option>
                    <option value="1">Pending</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            </div>
            <div class="form-row form-horizontal">
                <div class="form-group col-md-3">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="province">Province</label>
                <select class="form-control form-control-sm select2 {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province" style="width: 100%" required>
                    <option>Province</option>
                    <option value="North">North</option>
                    <option value="South">South</option>
                    <option value="East">East</option>
                    <option value="West">West</option>
                </select>
                @if($errors->has('province'))
                    <span class="text-danger">{{ $errors->first('province') }}</span>
                @endif
                <span class="help-block"></span>
                </div>
                <div class="form-group col-md-3">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="district">District</label>
                <select class="form-control form-control-xs select2" name="district" id="district" style="width: 100%">
                    <option>District</option>
                    <option value="Gasabo">Gasabo</option>
                    <option value="Nyarugenge">Nyarugenge</option>
                    <option value="Kicukiro">Kicukiro</option>
                </select>
                @if($errors->has('district'))
                    <span class="text-danger">{{ $errors->first('district') }}</span>
                @endif
                <span class="help-block"></span>
                </div>
                <div class="form-group col-md-3">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="sector">Sector</label>
                <select class="form-control form-control-sm select2 {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector" id="sector" style="width: 100%" required>
                    <option>Sector</option>
                    <option value="Nyamirambo">Nyamirambo</option>
                    <option value="Gitega">Gitega</option>
                    <option value="Biryogo">Biryogo</option>
                    <option value="Nyarugenge">Nyarugenge</option>
                </select>
                @if($errors->has('sector'))
                    <span class="text-danger">{{ $errors->first('sector') }}</span>
                @endif
                <span class="help-block"></span>
                </div>
                <div class="form-group col-md-3">
                <label class="required col-sm-6 col-form-label col-form-label-sm" for="cell">Cell</label>
                <select class="form-control form-control-xs select2" name="cell" id="cell" style="width: 100%">
                    <option>Cell</option>
                    <option value="Amahoro">Amahoro</option>
                    <option value="Umurimo">Umurimo</option>
                    <option value="Ubumwe">Ubumwe</option>
                </select>
                @if($errors->has('cell'))
                    <span class="text-danger">{{ $errors->first('cell') }}</span>
                @endif
                <span class="help-block"></span>
                </div>
            </div>
            <input type="hidden" name="users_id" id="users_id" value="{{ auth()->user()->id }}">
            <div class="form-group mt-3">
               <button class="btn btn-sm btn-secondary float-left" data-dismiss="modal">Close</button>
            </div>
            <div class="form-group mt-3">
                <button type="submit" id="btnSave" class="btn btn-sm btn-primary float-right">Save</button>
            </div>
        </form>

                <!-- END FORM -->

                </div>
            </div>
        </div>
    </div>

    <!-- End modal -->


{{--  For reload table after submit
                jQuery("#card").load("{{route('admin.earths.index')}} #card");  --}}

@endsection
@section('scripts')
@parent

<script>
    /* Action button JS*/
    function myFunctions() {
        document.getElementById("myDropdowns").classList.toggle("shows");
    }
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtns')) {
            var dropdowns = document.getElementsByClassName("dropdown-contents");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('shows')) {
                    openDropdown.classList.remove('shows');
                }
            }
        }
    }
</script>
<script>

    jQuery('#addEarthForm').submit(function(e){
        e.preventDefault();
        //alert('okay');
        jQuery('#btnSave').attr("disabled", "disabled");
        jQuery('#btnSave').attr("value", "Saving ...");

        jQuery.ajax({
            url: "{{ route('admin.earths.store') }}",
            data: jQuery('#addEarthForm').serialize(),
            type: "POST",
            success:function(result)
            {
                toastr.success(result.msg);
                jQuery("#addEarthForm")[0].reset();
                jQuery('#btnSave').attr('disable', false);
                //jQuery('.datatable').DataTable().ajax.reload();
                jQuery("#card").load("{{route('admin.earths.index')}} #card");
                jQuery('#btnSave').attr('value', "Save");
                jQuery("#addEarthModal").modal('hide');
            },
            failure:function (result) {
                alert('error');
            }
        });
    });
</script>
<script>
    $(function () {
  $.extend(false, $.fn.dataTable.defaults, {
    pageLength: 100,
  });
  let table = $('.datatable-Earth:not(.ajaxTable)').DataTable()

})

</script>
@endsection