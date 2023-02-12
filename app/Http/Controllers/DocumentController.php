<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDocumentRequest;
use App\Traits\HttpResponses;

class DocumentController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {   
    // $data=$request->all();
    // $name = $request->input('name');
    $request->validated();
     
    $user = auth()->user();
    // return $user->id;
      
    $id =  DB::table('documents')->insertGetId([
            'name' =>  $request->name,
            'type' => $request->type,
            'created_by'=>$user->id,
            'last_modified_id'=>$user->id,
            'parent'=>$request->parent,
            'doc_left'=>$request->doc_left,
            'doc_right'=>$request->doc_right,
            'date_modified'=>now(),
            'created_at'=>now(),
        ]);

        if($id!=0){
            $document = DB::table('documents')->where('id', '=',$id)->get();
            return $document;

        }

        return null;
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
}
