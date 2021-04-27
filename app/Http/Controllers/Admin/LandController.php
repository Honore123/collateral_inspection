<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLandRequest;
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

}
