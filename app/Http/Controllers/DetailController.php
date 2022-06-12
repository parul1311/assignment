<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::with('user')->paginate(10);
       return view('details.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:8',
            'image_file' => 'required|max:5000',
        ]);
        try{
            $name = $request->file('image_file')->getClientOriginalName();
  
             #this enables us to assign a new name to our image
             $imageName = time().'.'.$request->image_file->extension();
  
             #this moves our image into the folder we have assigned it
             $request->image_file->move(storage_path('app/public/uploads/details'), $imageName);
             $request['image'] = $imageName;
             $request['added_by'] = auth()->id();
             Detail::create($request->all());
           return redirect(route('details.index'))->with('success',"Saved Successfully!");

        }catch(Exception $e){
          return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        if($detail){
            return view('details.show',compact('detail'));
        }else{
            return back()->with('error',"Records not found!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        if($detail){
            return view('details.edit',compact('detail'));
        }else{
            return back()->with('error',"Records not found!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $this->validate($request, [
            'name' => 'required|min:8',
            'image_file' => 'sometimes|max:5000',
        ]);
        try{
            if($detail){
                if($request->file('image_file')){
                    $file = storage_path() . "/app/public/uploads/details/".$detail->image;
                    if (file_exists($file)) {
                        unlink($file);
                    }
                    $name = $request->file('image_file')->getClientOriginalName();
          
                     #this enables us to assign a new name to our image
                     $imageName = time().'.'.$request->image_file->extension();
          
                     #this moves our image into the folder we have assigned it
                     $request->image_file->move(storage_path('app/public/uploads/details'), $imageName);
                     $request['image'] = $imageName;
                }else{
                    $request['image'] = $detail->image;
                }
                 $detail->update($request->all());
               return redirect(route('details.index'))->with('success',"Saved Successfully!");
            }else{
                return back()->with('error', 'Record not Found!');
            }
        }catch(Exception $e){
          return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        if($detail){
            try{
                $file = storage_path() . "/app/public/uploads/details/".$detail->image;
                if (file_exists($file)) {
                    unlink($file);
                }
                $detail->delete();
                return back()->with('success',"Record Deleted!");
            }catch(Exception $e){
                return back()->with('error', 'Error: ' . $e->getMessage());
            }
        }else{
            return back()->with('error',"Record not found!");
        }
    }
}
