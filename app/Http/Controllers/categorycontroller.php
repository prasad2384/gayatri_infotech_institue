<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\course;

class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=category::all();
        return view('admin.category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('admin.category_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'category_name'=>'required',
                'category_image'=>'required',
            ],
            [
                'category_name.required'=>'Please Enter Category Name',
                'category_image.required'=>'Please Upload Category Image'
            ],
        );
        
        $category_name=$request->get('category_name');
        $file=$request->file('category_image');
        $filename=$file->getClientOriginalName();
        $destinationpath="./assets/images";
        $data1=new category([
            "category_name"=>$category_name,
            "category_image"=>$filename,
        ]);
        $category_fetch=DB::table('categories')
        ->where('category_name','=',$category_name)
        ->count();  
            if($category_fetch==1)
            {          
                return redirect()->back()->with('message','You Enter Category Already Exits');
            }
            else
            {
                if($data1->save())
                {
                    $file->move($destinationpath,$filename);
                    return redirect('category')->with('message','Category Added Successfully');
                }
            }
        }
        
        // return view('category');
        // echo('hi');
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $fetch=category::find($id);
        return view('admin.category_edit',compact('fetch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'category_name'=>'required',
                // 'category_image'=>'required',
            ],
            [
                'category_name.required'=>'Please Enter Category Name',
                // 'category_image.required'=>'Please Upload Category Image'
            ],
        );
        $destinationpath='./assets/images';
        $category_name=$request->get('category_name');
        $file=$request->file('category_image');
        $data=category::find($id);
        $data->category_name=$category_name;
        if($file!='')
        {
            $filename=$file->getClientOriginalName();
            $file->move($destinationpath,$filename);
            $data->category_image=$filename;
        }  
        if($data->update())
        {
                return redirect('category')->with('message',"Category Updated Successfully");
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data1=category::find($id);
        $data1->delete();
        DB::table('courses')->where('category_id', $id)->delete();
        return redirect()->back()->with('message',"Category Deleted Successfully");      
    }
}
