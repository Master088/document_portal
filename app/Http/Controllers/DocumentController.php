<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDocumentRequest;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;

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

     /**Wil use normal create folder function */
    public function createRootFolder(StoreDocumentRequest $request)
    {   

    /**Validate Request */
    $request->validated();
    $user = auth()->user();


    /*Check if year is already exist */
    $checkDocument = DB::table('documents')
    ->where('name', '=', $request->name)
    ->where('created_by', '=', $user->id)
    ->count();

    // dump($checkDocument);
    if($checkDocument){
        return $this->error('', 'Record already exist', 404);
    }
    
    $id =  DB::table('documents')->insertGetId([
            'name' =>  $request->name,
            'type' => $request->type,
            'created_by'=>$user->id,
            'last_modified_id'=>$user->id,
            'parent'=>$request->parent,
            'doc_left'=>1,
            'doc_right'=>2,
            'date_modified'=>now(),
            'created_at'=>now(),
        ]);

        if($id!=0){
            $document = DB::table('documents')->where('id', '=',$id)->get();
            
            return $this->success(["document" =>  $document], "", 200);
        }

        return $this->error('', 'Record not found', 404);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createFolder(StoreDocumentRequest $request)
    {   
        // dump( $request);
       
    /**Validate Request */
    $request->validated();
  
    /**Get auth user */
    $user = auth()->user();
 
    /**Get parent data */
    $parentData = DB::table('documents')
    ->where('id', '=', $request->parent)
    ->get();

 
    /**Check if parent data is exist */
    if(!$parentData){
        return $this->error('', 'Record not found', 404);
    }
 
 
    /**Check if parent is folder */
    if($parentData[0]->type == "file"){
        return $this->error('', 'Bad request', 400);
    }

    /**Check if directory already exist */
    $checkDocument = DB::table('documents')
    ->where('name', '=', $request->name)
    ->where('created_by', '=', $user->id)
    ->where('parent', '=', $parentData[0]->id)
    ->where('type', '=', 'folder')
    ->count();

    // dump($checkDocument);
    if($checkDocument){
        return $this->error('', 'Record already exist', 404);
    }

    /**Update  right */
    DB::table('documents')
            ->where('created_by', $user->id)
            ->where('doc_right','>=', $parentData[0]->doc_right)
            ->increment('doc_right', 2);
            // ->update(['doc_right' => +2]);

    /**Update  left */
    DB::table('documents')
    ->where('created_by', $user->id)
    ->where('doc_left','>=', $parentData[0]->doc_right)
    ->increment('doc_left', 2);


    /**Insert data */
    $id =  DB::table('documents')->insertGetId([
        'name' =>  $request->name,
        'type' => $request->type,
        'created_by'=>$user->id,
        'last_modified_id'=>$user->id,
        'parent'=>$parentData[0]->id,
        'doc_left'=>$parentData[0]->doc_right,
        'doc_right'=>$parentData[0]->doc_right+1,
        'date_modified'=>now(),
        'created_at'=>now(),
    ]);

    if($id!=0){
            $document = DB::table('documents')->where('id', '=',$id)->get();
            
            return $this->success(["document" =>  $document[0]], "", 200);
    }

        return $this->error('', 'Record not found', 404);
    }


    

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(StoreDocumentRequest $request)
    {  
        
        
      $fileName="";
    /**Check if file exist in the request */
    if ($request->hasFile('name')) {
        $fileName= $request->file('name')->getClientOriginalName();
    }else{
        return $this->error('', 'Please upload file', 404);
    }
  
    /**Validate Request */
    $request->validated();
 
    /**Get auth user */
    $user = auth()->user();

  /**Get parent data */
      $parentData = DB::table('documents')
    ->where('id', '=', $request->parent)
    ->get();


    /**Check if parent data is exist */
    if(!$parentData){
        return $this->error('', 'Record not found', 404);
    }

   /**Check if parent is folder */
   if($parentData[0]->type == "file"){
    return $this->error('', 'Bad request', 400);
    }

    /**Check if directory already exist[refactor this later] */
    $checkDocument = DB::table('documents')
    ->where('name', '=', $fileName)
    ->where('created_by', '=', $user->id)
    ->where('parent', '=', $parentData[0]->id)
    ->where('type', '=', 'file')
    ->count();

    // dump($checkDocument);
    if($checkDocument){
        return $this->error('', 'Record already exist', 404);
    }
    
    /**Update  right */
    DB::table('documents')
            ->where('created_by', $user->id)
            ->where('doc_right','>=', $parentData[0]->doc_right)
            ->increment('doc_right', 2);
            // ->update(['doc_right' => +2]);

    /**Update  left */
    DB::table('documents')
    ->where('created_by', $user->id)
    ->where('doc_left','>=', $parentData[0]->doc_right)
    ->increment('doc_left', 2);


    /**Insert data */
    $id =  DB::table('documents')->insertGetId([
        'name' =>  $fileName,
        'type' => "file",
        'created_by'=>$user->id,
        'last_modified_id'=>$user->id,
        'parent'=>$parentData[0]->id,
        'doc_left'=>$parentData[0]->doc_right,
        'doc_right'=>$parentData[0]->doc_right+1,
        'date_modified'=>now(),
        'created_at'=>now(),
    ]);

    if($id!=0){

        $file = $request->file('name');

        $document = DB::table('documents')->where('id', '=',$id)->get();
        $rawName=explode(".",  $fileName);

        Storage::disk('local')->putFileAs(
            'documents/',
            $file,  
           $rawName[0]."_".$id.".".end($rawName)
          );
            
        return $this->success(["document" =>  $document[0]], "", 200);
    }

        return $this->error('', 'Record not found', 404);
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function renameDirectory(Request $request, $id)
    {
        /**Get auth user */
        $user = auth()->user();

    /**Get data */
        $document = DB::table('documents')
        ->where('id', '=', $id)
        ->get();
        
      /**Check if parent data is exist */
      if(!$document){
          return $this->error('', 'Record not found', 404);
      }

      /**Get new directory name */
      $newName=$request->new_name;

      /**Check if  new name exist in the parent directory */
      $checkDocument = DB::table('documents')
      ->where('name', '=', $newName)
      ->where('created_by', '=', $user->id)
      ->where('parent', '=',  $document[0]->parent)
      ->where('type', '=', 'file')
      ->count();
  
      // dump($checkDocument);
      if($checkDocument){
          return $this->error('', 'Record already exist', 404);
      }

      /**Set user and date modified */
      /**Update */
      DB::table('documents')
            ->where('id', $id)
            ->update([
                        'name' => $newName,
                        'last_modified_id' => $user->id,
                        'date_modified' => now(),
                    ]);

      /**Return updated data */
      return $this->success([], "", 201);
    }

    public function renameFile(Request $request, $id)
    {
    /**Get auth user */
    $user = auth()->user();

    /**Get data */
        $document = DB::table('documents')
        ->where('id', '=', $id)
        ->get();
        
      /**Check if parent data is exist */
      if(!$document){
          return $this->error('', 'Record not found', 404);
      }

      /**Get new directory name */
      $newName=$request->new_name;

      /**Check if  new name exist in the parent directory */
      $checkDocument = DB::table('documents')
      ->where('name', '=', $newName)
      ->where('created_by', '=', $user->id)
      ->where('parent', '=',  $document[0]->parent)
      ->where('type', '=', 'file')
      ->count();
  
      // dump($checkDocument);
      if($checkDocument){
          return $this->error('', 'Record already exist', 404);
      }

      /**Set user and date modified */
      /**Update */
      DB::table('documents')
            ->where('id', $id)
            ->update([
                        'name' => $newName,
                        'last_modified_id' => $user->id,
                        'date_modified' => now(),
                    ]);

    /**Rename file */
    $rawOldName=explode(".",  $document[0]->name);  
    $oldName= $rawOldName[0]."_".$id.".".end($rawOldName);

    $rawNewName=explode(".",  $newName);
    $newName= $rawNewName[0]."_".$id.".".end($rawNewName);

 
    Storage::disk('local')->move('documents/'.$oldName, 'documents/'.$newName);
      /**Return updated data */
      return $this->success([], "", 201);
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
     * @param  string  $search
     * @return \Illuminate\Http\Response
     */
    public function searchDocuments(Request $request,$id)
    {
        /**Get auth user */
          $user = auth()->user();

          /**Get search string */
        $search=$request->search;

        if(!$search){
            return $this->error('', 'Please enter some text', 400);
        }

        /**Get parent data */
        $parentData = DB::table('documents')
        ->where('id', '=',$id)
        ->get();
       
        /**Check if parent data is exist [CHANGE THIS]*/
        if(empty($parentData)){
                return $this->error('', 'Record not found', 404);
        }
        
        /**Check if parent is folder */
        if($parentData[0]->type == "file"){
            return $this->error('', 'Bad request', 400);
        }
    

        /**Get all folder and file match in the pattern inside parent left right */
        $documents = DB::table('documents')
                ->where('created_by', '=', $user->id) // user id = office id
                ->where('name', 'like','%' . $search .'%')
                ->whereBetween('doc_left', [ $parentData[0]->doc_left, $parentData[0]->doc_right])
                ->get();


        /**Return data */
        return $this->success(["document" =>  $documents], "", 200);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $search
     * @return \Illuminate\Http\Response
     */
    public function getDocuments(Request $request,$left)
    {
        /**Get auth user */
          $user = auth()->user();
        
          /**Get parent data */
        $parentData = DB::table('documents')
        ->where('doc_left', '=',$left)
        ->get();

        /**Check if parent data is exist */
            if(!$parentData){
                return $this->error('', 'Record not found', 404);
            }

        /**Check if parent is folder */
            if($parentData[0]->type == "file"){
                return $this->error('', 'Bad request', 400);
            }
       
           
        $limit = $request->input('limit');
        $type = $request->input('type');
           
        
        /**Get all folder and file match in the pattern inside parent left right */
        $documents = DB::table('documents')
                ->where('created_by', '=', $user->id) // user id = office id
                ->where('parent', '=',$parentData[0]->id)
                ->when($limit, function ($query) use ($limit) {
                    return $query->take($limit);
                })
                ->when($type, function ($query) use ($type) {
                    return $query->where('type', '=',$type);
                })
                ->orderBy('created_at', 'desc')
                ->get();
 
        
        /**Return data */
        return $this->success(["document" =>  $documents,"parentData"=> $parentData[0]], "", 200);
    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFile($id)
    {
        /**Get data */

        /**Check if file */
        
        /**Adjust left and right */

        /**Delete file */

        /**Set the name */

        /**Remove file in the directory */

        /**Return data */
    }

            /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteFolder($id)
    {
        /**Get data */

        /**Check if folder */

        /**Adjust left and right */

        /**Delete folder */

        /**Return data */
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
