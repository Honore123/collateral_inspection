@extends('layouts.admin')
@section('content')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-6">
                <h4 class="ml-2"> Inspection <small class="text-small text-muted">[ UPI: {{$earth->propertyUPI}} ]</small> </h4>
            </div>
            <div class="col-6">
                @if($earth->status == 2)
                    <span class="badge badge-success mr-2">
                        <i class="fas fa-thumbs-up"></i> &nbsp; Approved
                    </span>
                @elseif($earth->status == 1)
                    <span class="badge badge-warning mr-2">
                        <i class="fas fa-clock"></i> &nbsp; Pending
                    </span>
                @elseif($earth->status == 3)
                    <span class="badge badge-danger mr-2">
                        <i class="far fa-times-circle"></i> &nbsp; Rejected
                    </span>
                @elseif($earth->status == 4)
                    <span class="badge badge-info mr-2">
                        <i class="fas fa-edit"></i> &nbsp; Need to modified
                    </span>
                @endif
                <a class="btn btn-secondary btn-sm float-right mr-2" href="{{ route('admin.earths.reports') }}">
                    Back
                </a>
                <span class="help-block" id="message"></span>
                <div id="message"></div>
            </div>
        </div>

    <form method="POST" action="{{ route("admin.earths.editor", $earth->id) }}" enctype="multipart/form-data" onsubmit="return checkForm(this);">
            @method('PUT')
            @csrf

    <div class="card card-outline card-primary" id="card">
        <div class="card-header">
            Edit Inspection
        </div>

        <div class="card-body">

            <div class="invoice p-1">
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-6 invoice-col">
                        <div class="table-responsive">

                            <table class="table table-borderless">
                                <tbody><tr>
                                    <th class="float-right">Inspection date:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('inspectionDate') ? 'is-invalid' : '' }}" name="inspectionDate" id="inspectionDate" value="{{ old('inspectionDate', $earth->inspectionDate) }}" readonly >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property UPI:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('propertyUPI') ? 'is-invalid' : '' }}" name="propertyUPI" id="propertyUPI" value="{{ old('propertyUPI', $earth->propertyUPI) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Owner:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('propertyOwner') ? 'is-invalid' : '' }}" name="propertyOwner" id="propertyOwner" value="{{ old('propertyOwner', $earth->propertyOwner) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property size:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('plotSize') ? 'is-invalid' : '' }}" name="plotSize" id="plotSize" value="{{ old('plotSize', $earth->plotSize) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Tenature type:</th>
                                    <td>
                                        <select class="form-control  form-control-sm {{ $errors->has('tenureType') ? 'is-invalid' : '' }}" name="tenureType" id="tenureType">
                                            @foreach($tt as $id => $tti)
                                                <option value="{{ $tti }}" {{ ($earth->tenureType == $tti ? 'selected' : '') }}>{{ $tti }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tenureType'))
                                            <span class="text-danger">{{ $errors->first('tenureType') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property type:</th>
                                    <td>
                                        <select class="form-control  form-control-sm {{ $errors->has('propertyType') ? 'is-invalid' : '' }}" name="propertyType" id="propertyType">
                                            @foreach($pt as $id => $pti)
                                                <option value="{{ $pti }}" {{ ($earth->propertyType == $pti ? 'selected' : '') }}>{{ $pti }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('propertyType'))
                                            <span class="text-danger">{{ $errors->first('propertyType') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Encumbrance:</th>
                                    <td>
                                        <div class="form-group form-group-sm mb-0 clearfix">
                                            <div class="d-inline">
                                                <input type="radio" name="encumbranes" id="encumbranes" value="1" @if($earth->encumbranes == 1) checked @endif >
                                                <label for="encumbranes"> Yes</label>
                                            </div> &nbsp;&nbsp;
                                            <div class="d-inline">
                                                <input type="radio" name="encumbranes" id="encumbranes" value="0" @if($earth->encumbranes != "1") checked @endif >
                                                <label for="encumbranes"> No</label>
                                            </div>
                                        </div>
{{--                                        <input type="checkbox" class="form-control form-control-sm {{ $errors->has('encumbranes') ? 'is-invalid' : '' }}" name="encumbranes" id="encumbranes" @if($earth->encumbranes == 1){{ old('encumbranes', $earth->encumbranes) ? 'checked' : '' }} @else  @endif  >--}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Mortgaged:</th>
                                    <td>
                                        <div class="form-group form-group-sm mb-0 clearfix">
                                            <div class="d-inline">
                                                <input type="radio" name="mortgaged" id="mortgaged" value="1" @if($earth->mortgaged == 1) checked @endif >
                                                <label for="mortgaged"> Yes</label>
                                            </div> &nbsp;&nbsp;
                                            <div class="d-inline">
                                                <input type="radio" name="mortgaged" id="mortgaged" value="0" @if($earth->mortgaged != "1") checked @endif >
                                                <label for="mortgaged"> No</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 invoice-col">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody><tr>
                                    <th class="float-right">Province:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province" value="{{ old('province', $earth->province) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">District:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district" id="district" value="{{ old('district', $earth->district) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Sector:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector" id="sector" value="{{ old('sector', $earth->sector) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Cell:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('cell') ? 'is-invalid' : '' }}" name="cell" id="cell" value="{{ old('cell', $earth->cell) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Village:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-sm {{ $errors->has('village') ? 'is-invalid' : '' }}" name="village" id="village" value="{{ old('village', $earth->village) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property served by:</th>
                                    <td>
                                        <div class="form-group form-group-sm mb-0 clearfix">
                                            <div class="d-inline">
                                                <input type="radio" name="servedBy" id="servedBy" value="Maram" @if($earth->servedBy == "Maram") checked @endif >
                                                <label for="servedBy"> Maram</label>
                                            </div> &nbsp;
                                            <div class="d-inline">
                                                <input type="radio" name="servedBy" id="servedBy" value="Paved" @if($earth->servedBy == "Paved") checked @endif >
                                                <label for="servedBy"> Paved</label>
                                            </div> &nbsp;
                                            <div class="d-inline">
                                                <input type="radio" name="servedBy" id="servedBy" value="Tarmac" @if($earth->servedBy == "Tarmac") checked @endif >
                                                <label for="servedBy"> Tarmac</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Latitude:</th>
                                    <td>
                                        <label class="rep"> {{ old('Latitude', $earth->latitude) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Longitude:</th>
                                    <td>
                                        <label class="rep"> {{ old('Longitude', $earth->longitude) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Accuracy:</th>
                                    <td>
                                        <label class="rep"> {{ old('Accuracy', number_format($earth->accuracy,0,'.',',').' meters') }}
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /. B1 -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{ route('admin.earths.reports') }}" class="btn btn-secondary btn-sm float-left" style="margin: 5px;">
                            <i class="fas fa-arrow-circle-left"></i> Back
                        </a>
                            <input type="submit" class="btn btn-success btn-sm float-right" style="margin: 5px;" value="Save">
                    </div>
                </div>
            </div>

        </div>
    </div>

    </form>

@section('styles')
    <link href="{{ asset('vendors/venobox/venobox.min.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('vendors/venobox/venobox.min.js')}}"></script>
    <script type="text/javascript">

        function checkForm(form) // Submit button clicked
        {
            // alert('Hey');
            form.myButton.disabled = true;
            form.myButton.value = "Please wait...";
            return true;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.venobox').venobox({
                framewidth : '',
                frameheight: '',
                border     : '8px',
                infinigall : true,
            });
        });
    </script>
@endsection

@endsection