<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLandRequest;
use App\Models\Earth;
use App\Models\Land;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LandController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreLandRequest $request)
    {
        $land = new Land();
        $land->currentUsage = $request->currentUsage;
        $land->image1 = NULL;
        $land->value = $request->value;
        $land->earth_id = $request->earth_id;

        $land->save();
        return ["msg"=>"Data saved"];

    }

    public function show(Land $land)
    {
        //
    }

    public function storeApi(Request $request, Earth $earth){

        $image1 =  null;
        $image2 = null;
        $image3 =  null;
        $image4 =  null;
        if ($request->file('image1') != null){
            $image1 =   $request->file('image1')->store('land');
        }
        if ($request->file('image2') != null){
            $image2 =   $request->file('image2')->store('land');
        }
        if($request->file('image3') != null){
            $image3 =   $request->file('image3')->store('land');
        }
        if($request->file('image4') != null){
            $image4 =   $request->file('image4')->store('land');
        }

        $landData = json_decode($request->usage, true);
        $landData['image1'] = $image1;
        $landData['image2'] = $image2;
        $landData['image3'] = $image3;
        $landData['image4'] = $image4;
        $earth->update(['status'=>1]);

        Land::create($landData);

        return $earth;
    }

}
