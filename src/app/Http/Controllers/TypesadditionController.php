<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typesaddition;

class TypesadditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesadd = Typesaddition::all();

        return view('typesaddition', ['allTypesadd' => $typesadd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Typesaddition::create([
            'name' => $request->get('name'),
            'value_unit' => $request->get('value_unit'),
            'time_interval' => $request->get('time_interval'),
          ]);
        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Typesaddition::find($id);
        return response()->json($types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $types = Typesaddition::find($id);
        $types->update($request->all());
        return response()->json($types);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = Typesaddition::find($id);
        $types->delete();
        return redirect('/typesadd');
    }
}
