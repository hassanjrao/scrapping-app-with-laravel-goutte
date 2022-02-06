<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers=Developer::latest()->get();
        return view('admin.developers.index',compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "developer_name"=>"required",
            "developer_id"=>"required"
        ]);


        Developer::create($request->all());

        return redirect()->route('admin.developers.index')
                        ->withToastSuccess('Developer added successfully.');

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
        $developer=Developer::findorfail($id);

        return view("admin.developers.edit",compact('developer'));

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
        $developer=Developer::findorfail($id);

        $request->validate([
            "developer_name"=>"required",
            "developer_id"=>"required"
        ]);

        $developer->update($request->all());

        return redirect()->route('admin.developers.index')
                        ->withToastSuccess('Developer updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer=Developer::findorfail($id);

        $developer->delete();

        return redirect()->route('admin.developers.index')
                        ->withToastSuccess('Developer deleted successfully.');
    }
}
