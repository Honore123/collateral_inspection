<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Elevation;
use App\Models\Foundation;
use App\Models\Property;
use App\Models\Earth;
use App\Models\Roof;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StorePropertyRequest $request)
    {
        $property = new Property();
        $property->area = $request->area;
        $property->acc_b = $request->acc_b;
        $property->foundation = $request->foundation;
        $property->elevation = $request->elevation;
        $property->roof = $request->roof;
        $property->pavement = $request->pavement;
        $property->ceiling = $request->ceiling;
        $property->door_win = $request->door_win;
        $property->in_finish = $request->finish1;
        $property->fence_len = $request->fence_len;
        $property->gate = $request->gate;
        $property->s_water = $request->s_water;
        $property->s_elect = $request->s_elect;
        $property->s_gas = $request->s_gas;
        $property->s_internet = $request->s_internet;
        $property->picture = $request->picture;
        $property->value = $request->value;
        $property->earth_id = $request->earth_id;

        $property->save();
        return ["msg"=>"Data saved"];

    }

    public function show(Property $property)
    {
        //
    }

    // api for the mobile application
    public function indexApi(Request $request, $id)
    {
        return Property::where('earth_id',$id)->get();
    }
    public function storeApi(Request $request, $id)
    {

        $path =  $request->file('photo')->store('buildings');

        $buildingData = json_decode($request->info, true);
        $buildingData['image'] = $path;

        return Property::create($buildingData);
    }
    public function foundation(){
        return Foundation::all();
    }
    public function elevation(){
        return Elevation::all();
    }
    public function roof(){
        return Roof::all();
    }
}
