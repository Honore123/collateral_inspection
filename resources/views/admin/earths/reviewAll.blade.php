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
                @else
                    <span class="badge badge-warning mr-2">
                        <i class="fas fa-clock"></i> &nbsp; Pending
                    </span>
                @endif
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
            Full Inspection report
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
                                        <label class="rep"> {{ old('inspectionDate', $earth->inspectionDate) }} </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property UPI:</th>
                                    <td>
                                        <label class="rep"> {{ old('propertyUPI', $earth->propertyUPI) }} </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Owner:</th>
                                    <td>
                                        <label class="rep"> {{ old('propertyOwner', $earth->propertyOwner) }} </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property size:</th>
                                    <td>
                                        <label class="rep"> {{ old('plotSize', $earth->plotSize) }} </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Tenature type:</th>
                                    <td>
                                        <label class="rep"> {{ old('tenureType', $earth->tenureType) }} </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property type:</th>
                                    <td>
                                        <label class="rep"> {{ old('propertyType', $earth->propertyType) }} </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Encumbrance:</th>
                                    <td>
                                        <label class="rep"> @if($earth->encumbranes == 1){{ old('encumbranes', $earth->encumbranes) ? 'Yes' : '' }} @else No @endif </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Mortgaged:</th>
                                    <td>
                                        <label class="rep"> @if($earth->mortgaged == 1){{ old('mortgaged', $earth->mortgaged) ? 'Yes' : '' }} @else No @endif </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Number of building:</th>
                                    <td>
                                        <label class="rep"> {{ old('nb', $earth->property->count()) }} </label>
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
                                        <label class="rep"> {{ old('province', $earth->province) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">District:</th>
                                    <td>
                                       <label class="rep"> {{ old('district', $earth->district) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Sector:</th>
                                    <td>
                                        <label class="rep"> {{ old('sector', $earth->sector) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Cell:</th>
                                    <td>
                                        <label class="rep"> {{ old('cell', $earth->cell) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="float-right">Property served by:</th>
                                    <td>
                                        <label class="rep"> {{ old('servedBy', $earth->servedBy) }}
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
            @if($earth->propertyType == 'Land with Building')
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
                                    <tbody><tr style="border-top: 2px solid black">
                                        <td class="float-right"><b>BUILDING {{ $loop->iteration++ }}</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Building Type:</th>
                                        <td>{{ $properties->buildingType }}</td>
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
                                        <th class="float-right">Internal finishing:</th>
                                        <td>
                                            <ul>
                                                @forelse($properties->internal as $key=>$value)
                                                    @if($value)
                                                        <li>{{$key}}</li>
                                                    @endif
                                                @empty
                                                    None
                                                @endforelse
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">External finishing:</th>
                                        <td>
                                            <ul>
                                                @forelse($properties->external as $key=>$value)
                                                    @if($value)
                                                        <li>{{$key}}</li>
                                                    @endif
                                                @empty
                                                    None
                                                @endforelse
                                            </ul>
                                        </td>
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
                                            {{ $properties->securedByGate?'Yes':'No' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Service attached:</th>
                                        <td>
                                            <ul>
                                                @forelse($properties->serviceAttached as $key=>$value)
                                                    @if($value)
                                                   <li>{{$key}}</li>
                                                    @endif
                                                @empty
                                                    None
                                                @endforelse
                                            </ul>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Picture:</th>
                                        <td>
                                            <div class="containerZoom float-left">
                                                <a class="venobox" href="{{ asset("storage/".$properties->image1) }}" data-gall="myGallery">
                                                    @if (File::exists(public_path("storage/".$properties->image1)) && $properties->image1 != NULL)
                                                        <img src="{{ asset("storage/".$properties->image1) }}" class="p-sm-1" width="180" alt="Image 1">
                                                    @else

                                                    @endif
                                                </a>
                                                <a class="venobox" href="{{ asset("storage/".$properties->image2) }}" data-gall="myGallery">
                                                    @if (File::exists(public_path("storage/".$properties->image2)) && $properties->image2 != NULL)
                                                        <img src="{{ asset("storage/".$properties->image2) }}" class="p-sm-1" width="180" alt="Image 2">
                                                    @else

                                                    @endif
                                                </a>
                                                <a class="venobox" href="{{ asset("storage/".$properties->image3) }}" data-gall="myGallery">
                                                    @if (File::exists(public_path("storage/".$properties->image3)) && $properties->image3 != NULL)
                                                        <img src="{{ asset("storage/".$properties->image3) }}" class="p-sm-1" width="180" alt="Image 3">
                                                    @else

                                                    @endif
                                                </a>
                                                <a class="venobox" href="{{ asset("storage/".$properties->image4) }}" data-gall="myGallery">
                                                    @if (File::exists(public_path("storage/".$properties->image4)) && $properties->image4 != NULL)
                                                        <img src="{{ asset("storage/".$properties->image4) }}" class="p-sm-1" width="180" alt="Image 4">
                                                    @else

                                                    @endif
                                                </a>
                                                <br>
                                                <span class="text text-sm">Click to zoom</span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                @endforeach
                @endif
            @else
                    @foreach($land as $lands )
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody><tr style="border-top: 2px solid black">
                                            <td class="float-right"><b>LAND {{ $loop->iteration++ }}</b></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="float-right">Current Usage:</th>
                                            <td>{{ $lands->currentUsage }}</td>
                                        </tr>
                                        <tr>
                                            <th class="float-right">Plot Size:</th>
                                            <td>{{ $earth->plotSize }} Sqm</td>
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
                                            <th class="float-right">Picture:</th>
                                            <td>
                                                <div class="containerZoom float-left">
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image1) }}" data-gall="myGallery">
                                                        @if (File::exists(public_path("storage/".$lands->image1)) && $lands->image1 != NULL)
                                                            <img src="{{ asset("storage/".$lands->image1) }}" class="p-sm-1" width="180" alt="Image 1">
                                                        @else

                                                        @endif
                                                    </a>
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image2) }}" data-gall="myGallery">
                                                        @if (File::exists(public_path("storage/".$lands->image2)) && $lands->image2 != NULL)
                                                            <img src="{{ asset("storage/".$lands->image2) }}" class="p-sm-1" width="180" alt="Image 2">
                                                        @else

                                                        @endif
                                                    </a>
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image3) }}" data-gall="myGallery">
                                                        @if (File::exists(public_path("storage/".$lands->image3)) && $lands->image3 != NULL)
                                                            <img src="{{ asset("storage/".$lands->image3) }}" class="p-sm-1" width="180" alt="Image 3">
                                                        @else

                                                        @endif
                                                    </a>
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image4) }}" data-gall="myGallery">
                                                        @if (File::exists(public_path("storage/".$lands->image4)) && $lands->image4 != NULL)
                                                            <img src="{{ asset("storage/".$lands->image4) }}" class="p-sm-1" width="180" alt="Image 4">
                                                        @else

                                                        @endif
                                                    </a>
                                                    <br>
                                                    <span class="text text-sm">Click to zoom</span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    @endforeach
            @endif

                <!-- /. B1 -->
                @can('admin')
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group form-inline border-top">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                    <td class="float-right">
                                        <label class="required">Estimated value (Total): </label>
                                    </td>
                                    <td>
                                        @if($earth->value != null)
                                             {{number_format($earth->value,0,'.',',')}} RWF
                                        @else
                                            <input class="form-control form-control-sm {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" id="value" value="{{ old('value', $earth->value) }}" placeholder="Cash" required>
                                        @endif
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="float-right">
                                            <label class="required">Map: </label>
                                        </td>
                                        @if($earth->map == NULL)
                                        <td>
                                            <input type="file" class="form-control form-control-sm {{ $errors->has('map') ? 'is-invalid' : '' }}" name="map" id="map" required>
                                        </td>
                                        @else
                                        <td>
                                            <a class="venobox" href="{{ asset("storage/".$earth->map) }}">
                                                <img src="{{ asset("storage/".$earth->map) }}" id="imageZoom" width="250" alt="">
                                            </a> <br>
                                            <span class="text text-sm">Click to zoom</span>
                                        </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="float-right">
                                        @if($earth->comment != null)
                                            <label class="required">Comment: </label>
                                        </td>
                                        <td>

                                                <i> {{ $earth->comment }} </i>
                                                <input type="hidden" class="{{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment" value="{{ old('comment', $earth->comment) }}">
                                            @else
                                                @can('admin')
{{--                                                <textarea class="form-control form-control-sm" name="comment" id="comment" placeholder="Comment" style="margin: 0px;width: 410px;height: 110px;"></textarea>--}}
{{--                                                    <br>--}}
                                                    @if($earth->status != 2)
                                                        <td>
                                                        <button class="btn btn-outline-info btn-sm  mt-3" type="button" data-toggle="modal" data-target="#modifyModal">
                                                            Click Here to ask to 'Modify'
                                                        </button>
                                                        </td>
                                                    @endif
                                                @endcan
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-right">
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
                        <input type="hidden" id="status" class="{{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" value="2">
                    </div>
                    <!-- /.col -->
                </div>
                @endcan
                <div class="row p-3 justify-content-center" style="">
                @can('admin')
                    @if($earth->status != 2)
                        <button class="btn btn-danger btn-sm  mr-2" type="button" data-toggle="modal" data-target="#rejectModal" >
                            Reject
                        </button>
                        <button class="btn btn-primary btn-sm mr-2" type="submit">
                            Approve
                        </button>
                    @endif
                @endcan
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{ route('admin.earths.reports') }}" class="btn btn-default btn-sm float-left" style="margin: 5px;">
                            Back
                        </a>
                        @if($earth->reportFile != NULL)
                            <a href="{{ asset("storage/generatedPdf/".$earth->reportFile) }}" class="btn btn-primary btn-sm float-right" style="margin: 5px;" target="_blank" download >
                                <i class="fas fa-download"></i> Download PDF
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    </form>

        <!-- Modal modify -->
        <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route("admin.earths.modify", [$earth->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="comment" class="col-form-label">Message:</label>
                                <textarea name="comment" class="form-control" placeholder="Tell a user where to modify" id="comment"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal reject -->
        <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Reject an Inspection</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route("admin.earths.reject", [$earth->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="comment" class="col-form-label">Message:</label>
                                <textarea name="comment" class="form-control" placeholder="Tell a user why rejected" id="comment"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-danger btn-sm">Reject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@section('styles')
    <link href="{{ asset('vendors/venobox/venobox.min.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('vendors/venobox/venobox.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.venobox').venobox({
                framewidth : '',                                // default: ''
                frameheight: '',                                // default: ''
                border     : '8px',                             // default: '0'
                infinigall : true,                               // default: false
            });
        });
    </script>
@endsection

@endsection