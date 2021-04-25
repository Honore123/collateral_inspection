<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEarthRequest;
use App\Http\Requests\UpdateEarthRequest;
use App\Models\Earth;
use App\Models\PropertyType;
use App\Models\TenureType;
use App\Models\User;
use App\Models\Property;
use Barryvdh\DomPDF\Facade as PDF;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EarthController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('earth_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $earths = Earth::where('status', '!=', 0)->orderBy('id', 'DESC')->get();

        return view('admin.earths.index', compact('earths'))->with('users', User::all());
    }

    public function store(StoreEarthRequest $request)
    {
    	$earth = new Earth();
        $earth->inspectionDate = $request->inspectionDate;
    	$earth->propertyUPI = $request->propertyUPI;
        $earth->province = $request->province;
        $earth->district = $request->district;
        $earth->sector = $request->sector;
        $earth->cell = $request->cell;
        $earth->village = $request->village;
    	$earth->propertyOwner = $request->propertyOwner;
    	$earth->tenureType = $request->tenureType;
    	$earth->propertyType = $request->propertyType;
    	$earth->plotSize = $request->plotSize;
    	$earth->encumbranes = $request->encumbranes;
    	$earth->mortgaged = $request->mortgaged;
    	$earth->servedBy = $request->servedBy;
    	$earth->latitude = 0;
    	$earth->longitude = 0;
    	$earth->status = 1;
        $earth->users_id = $request->users_id;
        $earth->map = NULL;
        $earth->value = NULL;
        $earth->reportFile = NULL;
        $earth->comment = NULL;
    	$earth->accuracy = 0;
    	$earth->save();
    	return ["msg"=>"Inspection Data saved"];
    	
    }

    public function show(Earth $earth)
    {
        abort_if(Gate::denies('earth_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earths.show', compact('earth'))->with('earth', $earth)->with('properties', Property::all());
    }

    public function edit(Earth $earth)
    {
        abort_if(Gate::denies('earth_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earths.edit', compact('earth'));
    }

    public function update(UpdateEarthRequest $request, Earth $earth)
    {
        $earth->update([
            'status' => $request->status,
            'value' => $request->value,
            'comment' => $request->comment,
            'map' => $request->map->store('maps'),
        ]);
        //   Save pdf
        $pdf = PDF::loadView('createPdf',array('earth'=>$earth));
        $pdf->setOptions(['isPhpEnabled'=>true, 'isRemoteEnabled'=>true, 'chroot'=>public_path('/storage')]);
        $filename = time().'_'.$earth->propertyOwner.'.pdf';
        $pdf->save(public_path('storage/generatedPdf/'.$filename));

        $earth->update([
            'reportFile' => $filename,
        ]);
        return redirect()->route('admin.earths.reports')->with('msg', 'Inspection Approved');
    }

    public function viewProperty(Property $property)
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earths.show')->with('property', $property)->with('earths', Earth::all());
    }


    public function reviewAll($id)
    {
        $earth = Earth::find($id);

        return view('admin.earths.reviewAll', compact('earth'))->with('property', Property::where('earth_id', $earth->id)->get());
    }

    public function reject(Earth $earth)
    {
        $earth->update([
            'status' => 3
        ]);

        return redirect()->route('admin.earths.reports')->with('msg', 'Inspection rejected');
    }

    public function modify(Earth $earth)
    {
        $earth->update([
            'status' => 4
        ]);

        return redirect()->route('admin.earths.reports')->with('msg', 'Review sent successfully');
    }

    public function destroy(Earth $earth)
    {
        abort_if(Gate::denies('earth_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $earth->delete();

        return back()->with('msg', 'Inspection Deleted');
    }


    public function reports(Earth $earth)
    {
        //$earth = Earth::orderBy('id', 'DESC')->get();
        return view('admin.earths.reports', compact('earth'))->with('earth', Earth::where('status', '!=' ,0)->get())->with('users', User::all());
    }

    // apis For mobile application
    public function indexApi($userId)
    {
        return Earth::select('id','inspectionDate','propertyUPI','province','district','sector','cell','village','propertyOwner',
            'tenureType','propertyType','plotSize','encumbranes','mortgaged','servedBy','latitude','longitude','accuracy','status','users_id','reportFile')
            ->where('users_id',$userId)->get();
    }
    public function storeApi(Request $request){
        return Earth::create($request->all('inspectionDate','propertyUPI','province','district','sector','cell','village','propertyOwner',
            'tenureType','propertyType','plotSize','encumbranes','mortgaged','servedBy','latitude','longitude','accuracy','status','users_id'));
    }
    public function updateStatusApi(Request $request,Earth $earth)
    {
        $earth->update($request->all());
        return $earth;
    }

    public function province(){
        return DB::table('rwanda_adus')->groupBy('province')->get(['province as name']);
    }
    public function district($province){
        return DB::table('rwanda_adus')->where('province',$province)->groupBy('district')->get(['district as name']);
    }
    public function sector($district){
        return DB::table('rwanda_adus')->where('district',$district)->groupBy('sector')->get(['sector as name']);
    }
    public function cell($sector){
        return DB::table('rwanda_adus')->where('sector',$sector)->groupBy('cell')->get(['cell as name']);
    }
    public function village($cell){
        return DB::table('rwanda_adus')->where('cell',$cell)->groupBy('village')->get(['village as name']);
    }
    public function tenure(){
        return TenureType::all();
    }
    public function propertyType(){
        return PropertyType::all();
    }

}
