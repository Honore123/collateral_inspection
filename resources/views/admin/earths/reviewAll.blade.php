@extends('layouts.admin')
@section('content')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-6">
                <h4 class="ml-2"> Inspection <small class="text-small text-muted">[ #{{$earth->propertyUPI}} ]</small> </h4>
            </div>
            <div class="col-6">
                <a class="btn btn-secondary btn-sm float-right mr-2" href="{{ route('admin.earths.reports') }}">
                    Back
                </a>
                <span class="help-block" id="message"></span>
                <div id="message"></div>
            </div>
        </div>

    <form method="POST" action="{{ route("admin.earths.update", [$earth->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

    <div class="card card-outline card-primary" id="card">
        <div class="card-header">
            Full Inspection list
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
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('inspectionDate') ? 'is-invalid' : '' }}" name="inspectionDate" id="inspectionDate" value="{{ old('inspectionDate', $earth->inspectionDate) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property UPI:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('propertyUPI') ? 'is-invalid' : '' }}" readonly name="propertyUPI" id="propertyUPI" value="{{ old('propertyUPI', $earth->propertyUPI) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Owner:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('propertyOwner') ? 'is-invalid' : '' }}" name="propertyOwner" id="propertyOwner" value="{{ old('propertyOwner', $earth->propertyOwner) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property size:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('plotSize') ? 'is-invalid' : '' }}" name="plotSize" id="plotSize" value="{{ old('plotSize', $earth->plotSize) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Tenature type:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('tenureType') ? 'is-invalid' : '' }}" name="tenureType" id="tenureType" value="{{ old('tenureType', $earth->tenureType) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property type:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('propertyType') ? 'is-invalid' : '' }}" name="propertyType" id="propertyType" value="{{ old('propertyType', $earth->propertyUPI) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Encumbrance:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('encumbranes') ? 'is-invalid' : '' }}" name="encumbranes" id="encumbranes" value="@if($earth->encumbranes == 1){{ old('encumbranes', $earth->encumbranes) ? 'Yes' : '' }} @else No @endif " >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Mortgaged:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('mortgaged') ? 'is-invalid' : '' }}" name="mortgaged" id="mortgaged" value="@if($earth->mortgaged == 1){{ old('mortgaged', $earth->mortgaged) ? 'Yes' : '' }} @else No @endif " >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Building type:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('buildingType') ? 'is-invalid' : '' }}" name="buildingType" id="buildingType" value="*" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Number of building:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('nb') ? 'is-invalid' : '' }}" name="nb" id="nb" value="{{ old('nb', $earth->property->count()) }}" >
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
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province" value="{{ old('province', $earth->province) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">District:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district" id="district" value="{{ old('district', $earth->district) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Sector:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector" id="sector" value="{{ old('sector', $earth->sector) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Cell:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('cell') ? 'is-invalid' : '' }}" name="cell" id="cell" value="{{ old('cell', $earth->cell) }}" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property served by:</th>
                                    <td>
                                        <input type="text" class="form-control form-control-plaintext form-control-sm {{ $errors->has('servedBy') ? 'is-invalid' : '' }}" name="servedBy" id="servedBy" value="{{ old('servedBy', $earth->servedBy) }}" >
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                @if($earth->property->count() == 0)
                    <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody><tr>
                                        <td class="float-right"><b>0 Building</b></td>
                                        <td></td>
                                    </tr></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($property as $properties )
                        <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody><tr>
                                        <td class="float-right"><b>BUILDING 1</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Build up area:</th>
                                        <td>{{ $properties->builtUpArea }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">ACC per building:</th>
                                        <td style="padding-right: 0px; margin-right: 0px">{{ $properties->accommodation }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Foundation:</th>
                                        <td>{{ $properties->foundation }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Elevation:</th>
                                        <td>{{ $properties->elevation }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Roof:</th>
                                        <td>{{ $properties->roof }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Pavement:</th>
                                        <td>{{ $properties->pavement }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Ceiling:</th>
                                        <td>
                                            {{ $properties->ceiling }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Door and window:</th>
                                        <td>
                                            {{ $properties->doorAndWindows }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Plastered, Rendered and painted:</th>
                                        <td>
                                            <div class="form-check-inline">
                                                <label class="form-check-label" for="radio1">
                                                    <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1"  >Internal
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label" for="radio2">
                                                    <input type="checkbox" class="form-check-input" id="radio2" name="optradio" value="option2" checked>External
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Number of building:</th>
                                        <td>3 building(s) in compound</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>.</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Fence lenght:</th>
                                        <td>{{ $properties->fenceLength }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Secured by gate:</th>
                                        <td>
                                            {{ $properties->securedByGate }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Service attached:</th>
                                        <td>
                                            {{ $properties->otherAttachedServices }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Picture:</th>
                                        <td><img src="{{ asset(".$properties->image.") ?? asset('assets/img/screen.png') }}" width="250" alt=""></td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                @endforeach
                @endif




                <!-- /. B1 -->

                <div class="row">
                    <div class="col-6">
                        <div class="form-group form-inline">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                    <td class="float-right">
                                        <label class="">Estimated value (Total): </label>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm {{ $errors->has('servedBy') ? 'is-invalid' : '' }}" name="value" id="servedBy" value="{{ old('value', $earth->value) }}">
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="float-right">
{{--                                            <label class="">Inspector: </label>--}}
                                        </td>
                                        <td>
                                            <input class="form-control form-control-sm" value="{{ Auth::user()->id }}" name="user_id" placeholder="Honore" type="hidden">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <input type="hidden" id="status" class="{{ $errors->has('servedBy') ? 'is-invalid' : '' }}" name="status" id="status" value="2">
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row p-3 justify-content-center" style="">
                    <a class="btn btn-danger btn-sm  mr-2" href="{{ route('admin.earths.reject', $earth->id) }}" >
                        Reject
                    </a>
                    @if($earth->status == 2)
                        <button class="btn btn-success btn-sm mr-2" type="submit" disabled >
                            <i class="fas fa-thumbs-up"></i> &nbsp; Approved
                        </button>
                    @else
                        <button class="btn btn-primary btn-sm mr-2" type="submit">
                            Approve
                        </button>
                    @endif
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary btn-sm float-right" style="margin: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </form>

@endsection