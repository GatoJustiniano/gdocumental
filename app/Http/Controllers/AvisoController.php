<?php

namespace App\Http\Controllers;

use App\Events\AvisoEvent;
use App\Models\Aviso;
use App\Models\User;
use App\Notifications\AvisoNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avisoNotifications = auth()->user()->unreadNotifications;
        return view('aviso.notifications', compact('avisoNotifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aviso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $aviso = Aviso::create($data);

        event(new AvisoEvent($aviso));

        return redirect()->back()->with('message', 'Aviso creado correctamente');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
                      ->when($request->input('id'), function($query) use ($request){
                          return $query->where('id',$request->input('id'));
                      })->markAsRead();
        return response()->noContent();
    }
}
