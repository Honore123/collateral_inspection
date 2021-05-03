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
                                <tbody>
                                    <tr>
                                        <th class="float-right">Inspection date:</th>
                                        <td>
                                             {{  $earth->inspectionDate }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Property UPI:</th>
                                        <td>
                                             {{ $earth->propertyUPI }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Owner:</th>
                                        <td>
                                             {{ $earth->propertyOwner}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Plot size:</th>
                                        <td>
                                            {{  $earth->plotSize }} <label style="font-size: 1.2em; margin: 0">&#13217</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Tenure type:</th>
                                        <td>
                                             {{  $earth->tenureType }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Property type:</th>
                                        <td>
                                             {{  $earth->propertyType }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Encumbrance:</th>
                                        <td>
                                             {{  $earth->encumbranes }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Mortgaged:</th>
                                        <td>
                                             {{  $earth->mortgaged }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Number of building:</th>
                                        <td>
                                             {{  $earth->property->count() }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 invoice-col">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="float-right">Province:</th>
                                        <td>
                                            {{  $earth->province }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">District:</th>
                                        <td>
                                           {{  $earth->district }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Sector:</th>
                                        <td>
                                             {{  $earth->sector }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Cell:</th>
                                        <td>
                                             {{  $earth->cell }}</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Village:</th>
                                        <td>
                                             {{  $earth->village }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Property served by:</th>
                                        <td>
                                            {{ $earth->servedBy }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Latitude:</th>
                                        <td>
                                             {{  $earth->latitude }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Longitude:</th>
                                        <td>
                                             {{  $earth->longitude }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Accuracy:</th>
                                        <td>
                                           {{ number_format($earth->accuracy,0,'.',',').' meters' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    <tbody>
                                        <tr>
                                            <td class="float-right"><b>0 Building</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($property as $properties )
                        <div class="row">
                            <div class="col-12">
                                <div style="border-bottom: 2px solid black">
                                    <h5 class="text-center">BUILDING {{ $loop->iteration++ }}</h5>
                                </div>
                            </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th class="float-right">Building Type:</th>
                                        <td>{{ $properties->buildingType }}</td>
                                    </tr>
                                    <tr>
                                        <th class="float-right">Build up area:</th>
                                        <td>{{ $properties->builtUpArea }} <label style="font-size: 1.2em; margin: 0">&#13217</label></td>
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
                                            <ul style="padding-left:20px">
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
                                            <ul style="padding-left:20px">
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
                                    </tbody>
                                </table>
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
                                        <th class="float-right">Fence length:</th>
                                        <td>{{ $properties->fenceLength }} <label style="font-size: 1.2em;margin: 0">&#13217</label></td>
                                    </tr>
                                    <tr>
                                        <th class="text-right" width="50%">Secured by gate:</th>
                                        <td>
                                            {{ $properties->securedByGate?'Yes':'No' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Service attached:</th>
                                        <td>
                                            <ul style="padding-left:20px">
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
                                        <td style="padding-left: 0; padding-right: 0;">
                                                @if($properties->image1)
                                                <a class="venobox" href="{{ asset("storage/".$properties->image1) }}" data-gall="myGallery">
                                                    <img src="{{ asset("storage/".$properties->image1) }}" class="p-sm-1" width="180" alt="Image 1">
                                                </a>
                                                @endif
                                                @if($properties->image2)
                                                <a class="venobox" href="{{ asset("storage/".$properties->image2) }}" data-gall="myGallery">
                                                    <img src="{{ asset("storage/".$properties->image2) }}" class="p-sm-1" width="180" alt="Image 2">
                                                </a>
                                                @endif
                                        </td>
                                        <td style="padding-left: 0; padding-right: 0;">
                                                @if($properties->image3)
                                                <a class="venobox" href="{{ asset("storage/".$properties->image3) }}" data-gall="myGallery">
                                                    <img src="{{ asset("storage/".$properties->image3) }}" class="p-sm-1" width="180" alt="Image 3">
                                                </a>
                                                @endif
                                                @if($properties->image4)
                                                <a class="venobox" href="{{ asset("storage/".$properties->image4) }}" data-gall="myGallery">
                                                    <img src="{{ asset("storage/".$properties->image4) }}" class="p-sm-1" width="180" alt="Image 4">
                                                </a>
                                                @endif
                                        </td>

                                                @if(!$properties->image1 && !$properties->image2 &&!$properties->image3 &&!$properties->image4)
                                                <span class="text text-md">No Images</span>
                                                @endif
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center"><span class="text text-sm">Click to zoom</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                @endforeach
                @endif
            @else
                    @foreach($land as $lands )
                        <div class="row">
                            <div class="col-12">
                                <div style="border-bottom: 2px solid black">
                                    <h5 class="text-center">LAND INFORMATION</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th class="float-right">Current Usage:</th>
                                                <td>{{ $lands->currentUsage }}</td>
                                            </tr>
                                            <tr>
                                                <th class="float-right">Plot Size:</th>
                                                <td>{{ $earth->plotSize }} Sqm</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                            <td style="padding-left: 0; padding-right: 0;">
                                                    @if($lands->image1)
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image1) }}" data-gall="myGallery">
                                                        <img src="{{ asset("storage/".$lands->image1) }}" class="p-sm-1" width="180" alt="Image 1">
                                                    </a>
                                                    @endif
                                                    @if($lands->image2)
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image2) }}" data-gall="myGallery">
                                                        <img src="{{ asset("storage/".$lands->image2) }}" class="p-sm-1" width="180" alt="Image 2">
                                                    </a>
                                                        @endif
                                            </td>
                                            <td style="padding-left: 0; padding-right: 0;">
                                                        @if($lands->image3)
                                                    <a class="venobox" href="{{ asset("storage/".$lands->image3) }}" data-gall="myGallery">
                                                        <img src="{{ asset("storage/".$lands->image3) }}" class="p-sm-1" width="180" alt="Image 3">
                                                    </a>
                                                        @endif
                                                        @if($lands->image4)

                                                    <a class="venobox" href="{{ asset("storage/".$lands->image4) }}" data-gall="myGallery">
                                                        <img src="{{ asset("storage/".$lands->image4) }}" class="p-sm-1" width="180" alt="Image 4">
                                                    </a>
                                                            @endif
                                            </td>
                                                        @if(!$lands->image1 && !$lands->image2 &&!$lands->image3 &&!$lands->image4)
                                                            <span class="text text-md">No Images</span>
                                                        @endif
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center"><span class="text text-sm">Click to zoom</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                                        <label class="required" for="value">Estimated value (Total): </label>
                                    </td>
                                    <td>
                                        @if($earth->value != null)
                                             {{number_format($earth->value,0,'.',',')}} RWF
                                        @else
                                            <input class="form-control form-control-sm {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" id="value" value="{{ old('value', $earth->value) }}" placeholder="Amount" type="number" required>
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
                                            <label class="required">Comment: </label>
                                        </td>
                                        <td>
                                            @if($earth->comment != null)
                                                <i> {{ $earth->comment }} </i>
                                                <input type="hidden" class="{{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment" value="{{ old('comment', $earth->comment) }}">
                                            @else
                                                @can('admin')
                                                <textarea class="form-control form-control-sm" name="comment" id="comment" placeholder="Comment" style="margin: 0px;width: 410px;height: 110px;"></textarea>
                                                    <br>
                                                    @if($earth->status != 2)
                                                        <button class="btn btn-outline-info btn-sm  mt-3" type="button" data-toggle="modal" data-target="#modifyModal">
                                                            Click Here to ask to 'Modify'
                                                        </button>
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
                        <a class="btn btn-danger btn-sm  mr-2" href="{{ route('admin.earths.reject', $earth->id) }}" >
                            Reject
                        </a>
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

        <!-- Modal -->
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
@endsection
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