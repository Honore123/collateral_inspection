<style>
    .header-title{
        text-align: center;
        border-bottom: 1px solid black;
    }
    h4,table{
        font-family: "SF Pro Text";
    }
    .key-align{
        text-align: right;
        font-weight: bold;
        padding: 0 5px;
    }
    .location{
        text-align: right;
        padding: 5px 0 5px 100px;
        font-weight: bold;
    }
    .value{
        padding: 5px 0 5px 20px;
    }
    .building-title{
        padding-top: 10px;
        text-align: center;
        font-weight: bold;
        border-top: 1px solid black;
    }
    .last-row{
        padding-bottom: 10px;
    }
    .btn {
        /*display: inline-block;*/
        /*font-weight: 300;*/
        color: #000000;
        text-align: center;
        vertical-align: middle;
        background-color: rgba(147, 225, 238, 0.45);
        border: 1px solid transparent;
        padding: .4rem;
        font-size: 1rem;
        line-height: 1.3;
        border-radius: 1rem;
    }
    .txt{
        color: #6c757d!important;
    }
</style>
<h2 class="header-title">INSPECTION REPORT</h2>
<table>
    @if($earth->propertyType == 'Land with Building' )
        <tbody>
        <tr>
            <td class="key-align">Inspection Date:</td>
            <td class="value">{{$earth->inspectionDate}}</td>
            <td class="location">Province:</td>
            <td class="value">{{$earth->province}}</td>
        </tr>
        <tr>
            <td class="key-align">Property UPI:</td>
            <td class="value">{{$earth->propertyUPI}}</td>
            <td class="location">District:</td>
            <td class="value">{{$earth->district}}</td>
        </tr>
        <tr>
            <td class="key-align">Owner:</td>
            <td class="value">{{$earth->propertyOwner}}</td>
            <td class="location"> Sector:</td>
            <td class="value">{{$earth->sector}}</td>
        </tr>
        <tr>
            <td class="key-align">Plot Size:</td>
            <td class="value">{{$earth->plotSize}}</td>
            <td class="location"> Cell:</td>
            <td class="value">{{$earth->cell}}</td>
        </tr>
        <tr>
            <td class="key-align">Tenure Type:</td>
            <td class="value">{{$earth->tenureType}}</td>
            <td class="location"> Village:</td>
            <td class="value">{{$earth->village}}</td>
        </tr>
        <tr>
            <td class="key-align">Property Type:</td>
            <td class="value">{{$earth->propertyType}}</td>
            <td class="location"> Property Served By:</td>
            <td class="value">{{$earth->servedBy}} road</td>
        </tr>
        <tr>
            <td class="key-align">Encumbranes:</td>
            <td class="value">{{$earth->encumbranes?'Yes':'No'}}</td>
        </tr>
        <tr>
            <td class="key-align">Mortgaged:</td>
            <td class="value">{{$earth->mortgaged?'Yes':'No'}}</td>
        </tr>
        <tr>
            <td class="key-align">Number of Buildings:</td>
            <td class="value">{{$earth->property->count()}}</td>
        </tr>
        <tr>
            <td class="key-align">Estimated Value:</td>
            <td colspan="3"><button class="btn">{{number_format($earth->value,0,'.',',')}} RWF</button></td>
        </tr>
        @forelse($earth->property as $property)
            <tr class="building-underline">
                <td colspan="4" class="building-title">BUILDING {{$loop->iteration++}}</td>
            </tr>
            <tr>
                <td class="key-align">Building Type:</td>
                <td class="value">{{$property->buildingType}}</td>
                <td class="location">Fence Length:</td>
                <td class="value">{{$property->fenceLength}}</td>
            </tr>
            <tr>
                <td class="key-align">Building Accommodation:</td>
                <td class="value">{{$property->accommodation}}</td>
                <td class="location">Secured By Gate:</td>
                <td class="value">{{$property->securedByGate?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td class="key-align">Foundation:</td>
                <td class="value">{{$property->foundation}}</td>
                <td class="location">Service Attached:</td>
                <td class="value">
                    @forelse($property->serviceAttached as $key=>$value)
                        @if($value)
                            <li>{{$key}}</li>
                        @endif
                    @empty
                        None
                    @endforelse
                </td>
            </tr>
            <tr>
                <td class="key-align">Elevation:</td>
                <td class="value">{{$property->elevation}}</td>
                {{--    Photo    --}}
            </tr>
            <tr>
                <td class="key-align">Roof:</td>
                <td class="value">{{$property->roof}}</td>
            </tr>
            <tr>
                <td class="key-align">Pavement:</td>
                <td class="value">{{$property->pavement}}</td>
            </tr>
            <tr>
                <td class="key-align">Ceiling:</td>
                <td class="value">{{$property->ceiling}}</td>
            </tr>
            <tr>
                <td class="key-align">Windows and Doors:</td>
                <td class="value">{{$property->doorAndWindows}}</td>
            </tr>
            <tr>
                <td class="key-align">Internal Finishing:</td>
                <td class="value">
                    <ul>
                        @forelse($property->internal as $key=>$value)
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
                <td class="key-align">External Finishing:</td>
                <td class="value">
                    <ul>
                        @forelse($property->external as $key=>$value)
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
                <td class="last-row"></td>
            </tr>

            <tr>
                <td class="location">Picture:</td>
            </tr>
            <tr>
                <td class="value float-left" style="float: left; width: 100%" colspan="5" >
                    @if ($property->image1 != NULL)
                        <img src="{{ public_path('storage/'.$property->image1) }}" width="320">
                    @else
                    @endif
                    @if ($property->image2 != NULL)
                        <img src="{{ public_path('storage/'.$property->image2) }}" width="320">
                    @else
                    @endif
                    @if ($property->image3 != NULL)
                        <img src="{{ public_path('storage/'.$property->image3) }}" width="320">
                    @else
                    @endif
                    @if ($property->image4 != NULL)
                        <img src="{{ public_path('storage/'.$property->image4) }}" width="320">
                    @else
                    @endif
                </td>
            </tr>
        @empty
            {{-- <tr>
                <td colspan="2"> No properties to show </td>
            </tr> --}}
        @endforelse
        <tr>
            <td class="key-align">Location Map:</td>
        </tr>
        <tr>
            <td colspan="4">
                <img src="{{ public_path('storage/'.$earth->map) }}" alt="map" width="100%">
            </td>
        </tr>
        </tbody>
    @else
        <tbody>
        <tr>
            <td class="key-align">Inspection Date:</td>
            <td class="value">{{$earth->inspectionDate}}</td>
            <td class="location">Province:</td>
            <td class="value">{{$earth->province}}</td>
        </tr>
        <tr>
            <td class="key-align">Property UPI:</td>
            <td class="value">{{$earth->propertyUPI}}</td>
            <td class="location">District:</td>
            <td class="value">{{$earth->district}}</td>
        </tr>
        <tr>
            <td class="key-align">Owner:</td>
            <td class="value">{{$earth->propertyOwner}}</td>
            <td class="location"> Sector:</td>
            <td class="value">{{$earth->sector}}</td>
        </tr>
        <tr>
            <td class="key-align">Plot Size:</td>
            <td class="value">{{$earth->plotSize}}</td>
            <td class="location"> Cell:</td>
            <td class="value">{{$earth->cell}}</td>
        </tr>
        <tr>
            <td class="key-align">Tenure Type:</td>
            <td class="value">{{$earth->tenureType}}</td>
            <td class="location"> Village:</td>
            <td class="value">{{$earth->village}}</td>
        </tr>
        <tr>
            <td class="key-align">Property Type:</td>
            <td class="value">{{$earth->propertyType}}</td>
            <td class="location"> Property Served By:</td>
            <td class="value">{{$earth->servedBy}} road</td>
        </tr>
        <tr>
            <td class="key-align">Encumbranes:</td>
            <td class="value">{{$earth->encumbranes?'Yes':'No'}}</td>
        </tr>
        <tr>
            <td class="key-align">Mortgaged:</td>
            <td class="value">{{$earth->mortgaged?'Yes':'No'}}</td>
        </tr>
        <tr>
            <td class="key-align">Number of Buildings:</td>
            <td class="value">{{$earth->property->count()}}</td>
        </tr>
        @forelse($earth->land as $land)
            <tr class="building-underline">
                <td colspan="4" class="building-title">LAND {{$loop->iteration++}}</td>
            </tr>
            <tr>
                <td class="key-align">Land current Usage:</td>
                <td class="value">{{$land->currentUsage}}</td>
                <td class="location">Plot Size:</td>
                <td class="value">{{$earth->plotSize}}</td>
            </tr>
            <tr>
                <td class="last-row"></td>
            </tr>

            <tr>
                <td class="key-align">Estimated Value:</td>
                <td colspan="3"><button class="btn">{{number_format($earth->value,0,'.',',')}} RWF</button></td>
            </tr>
            <tr>
                <td class="key-align">Picture</td>
                <td class="value">:</td>
            </tr>
            <tr>
                <td class="value float-left" style="float: left; width: 100%" colspan="5" >
                    @if ($land->image1 != NULL)
                        <img src="{{ public_path('storage/'.$land->image1) }}" width="320">
                    @else
                    @endif
                    @if ($land->image2 != NULL)
                        <img src="{{ public_path('storage/'.$land->image2) }}" width="320">
                    @else
                    @endif
                    @if ($land->image3 != NULL)
                        <img src="{{ public_path('storage/'.$land->image3) }}" width="320">
                    @else
                    @endif
                    @if ($land->image4 != NULL)
                        <img src="{{ public_path('storage/'.$land->image4) }}" width="320">
                    @else
                    @endif
                </td>
            </tr>
        @empty
            {{-- <tr>
                <td colspan="2"> No properties to show </td>
            </tr> --}}
        @endforelse
        <tr>
            <td class="key-align">Location Map:</td>
        </tr>
        <tr>
            <td colspan="4">
                <img src="{{ public_path('storage/'.$earth->map) }}" alt="map" width="100%">
            </td>
        </tr>

        <tr>
            <td class="key-align">Review:</td>
            <td class="value">
                @if($earth->comment != NULL)
                    <i class="txt">{{$earth->comment}}</i>
                @else
                    <i class="txt"> N/A </i>
                @endif
            </td>
        </tr>

        </tbody>
    @endif
</table>