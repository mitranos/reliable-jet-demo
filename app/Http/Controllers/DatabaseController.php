<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qb = new QuickBaseController();
        $result = $qb->getDatabases();
        $databases = $result['databases'];
        return view('/databases')->with('databases', $databases);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats()
    {
        $qb = new QuickBaseController();
        $result = $qb->getDatabases();
        $databases = $result['databases'];
        return view('/statistics')->with('databases', $databases);
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
        $qb = new QuickBaseController();
        $qb->createDatabase($request->name, $request->description);
        return redirect('/databases');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qb = new QuickBaseController();
        $result = $qb->getDatabases();
        $databases = $result['databases'];
        $schema = $qb->getDatabaseInfo($id);
        //return $schema;
        return view('database')->with('databases', $databases)->with('schema', $schema);
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
        $qb = new QuickBaseController();
        $qb->deleteDatabase($id);
        return redirect('/databases');
    }
}
