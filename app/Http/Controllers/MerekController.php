<?php

namespace App\Http\Controllers;

use App\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mereks = Merek::latest()->paginate(5);
  
        return view('mereks.index',compact('mereks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mereks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            
        ]);
  
        Merek::create($request->all());
   
        return redirect()->route('mereks.index')
                        ->with('success','Merek created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show(Merek $merek)
    {
        return view('mereks.show',compact('merek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit(Merek $merek)
    {
        $level = Auth::user()->level;

        return view('mereks.edit',compact('merek','level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merek $merek)
    {
        $request->validate([
            'merek' => 'required',
            
        ]);
  
        $merek->update($request->all());
  
        return redirect()->route('mereks.index')
                        ->with('success','Merek updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {
        $merek->delete();
  
        return redirect()->route('mereks.index')
                        ->with('success','Merek deleted successfully');
    }
}
