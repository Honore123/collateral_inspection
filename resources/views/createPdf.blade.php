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
</style>
<h2 class="header-title">INSPECTION REPORT</h2>
<table>
    <tbody>
    <tr>
        <td class="key-align">Inspection Date:</td>
        <td class="value">{{$inspection->inspectionDate}}</td>
        <td class="location">Province:</td>
        <td class="value">{{$inspection->province}}</td>
    </tr>
    <tr>
        <td class="key-align">Property UPI:</td>
        <td class="value">{{$inspection->propertyUPI}}</td>
        <td class="location">District:</td>
        <td class="value">{{$inspection->propertyUPI}}</td>
    </tr>
    <tr>
        <td class="key-align">Owner:</td>
        <td class="value">{{$inspection->propertyOwner}}</td>
        <td class="location"> Sector:</td>
        <td class="value">{{$inspection->sector}}</td>
    </tr>
    <tr>
        <td class="key-align">Plot Size:</td>
        <td class="value">{{$inspection->plotSize}}</td>
        <td class="location"> Cell:</td>
        <td class="value">{{$inspection->cell}}</td>
    </tr>
    <tr>
        <td class="key-align">Tenure Type:</td>
        <td class="value">{{$inspection->tenureType}}</td>
        <td class="location"> Village:</td>
        <td class="value">{{$inspection->village}}</td>
    </tr>
    <tr>
        <td class="key-align">Property Type:</td>
        <td class="value">{{$inspection->propertyType}}</td>
        <td class="location"> Property Served By:</td>
        <td class="value">{{$inspection->servedBy}}</td>
    </tr>
    <tr>
        <td class="key-align">Encumbranes:</td>
        <td class="value">{{$inspection->encumbranes?'Yes':'No'}}</td>
    </tr>
    <tr>
        <td class="key-align">Mortgaged:</td>
        <td class="value">{{$inspection->mortgaged?'Yes':'No'}}</td>
    </tr>
    <tr>
        <td class="key-align">Number of Buildings:</td>
        <td class="value">{{$inspection->property->count()}}</td>
    </tr>
    @forelse($inspection->property as $property)
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
            <td class="location">Picture:</td>
            <td class="value">Image</td>
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
            <td class="value">{{$property->internal}}</td>
        </tr>
        <tr>
            <td class="key-align">External Finishing:</td>
            <td class="value">{{$property->external}}</td>
        </tr>
        <tr>
            <td class="last-row"></td>
        </tr>
        @empty
        <tr></tr>
    @endforelse
    </tbody>
</table>