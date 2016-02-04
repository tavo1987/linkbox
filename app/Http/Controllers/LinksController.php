<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

use App\Http\Requests\SiteRequest;
use App\Entities\Site;
use Illuminate\Support\Facades\Auth;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        $sites = Site::where('user_id','=',$user)->orderBy('id','DESC')->paginate(5);

        return view('admin.sites.index', compact('sites'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        $site = new Site($request->all());

        $user = Auth::user();

        $site = $user->sites()->save($site);

        return redirect()->route('admin.sites.index')->with('message','site creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $sitios = Url::with('user')->findOrFail($id);

        //dd($sitios);

        return view('admin.show',['site'=>$sitios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::findOrFail($id);

        return view('admin.sites.edit',compact('site'));
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
        $site = Site::findOrFail($id);

        $site->fill($request->all());
        $site->save();
        
        return redirect()->route('admin.sites.index')->with('message','Sitio '.$user->name.' Actualizado éxitosamente');
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

}
