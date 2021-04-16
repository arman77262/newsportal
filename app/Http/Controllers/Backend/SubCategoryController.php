<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index(){
        $subcat = DB::table('subcategories')
        ->join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->paginate(3);
        return view('backend.subcategory.index', compact('subcat'));
    }

    public function create(){
        $category = DB::table('categories')->get();
        return view('backend.subcategory.create', compact('category'));
    }

    public function StoreSubcat(Request $request){
        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_hin' => 'required|unique:subcategories|max:255',
        ],[
            'subcategory_en.required'=> 'Please Insert English Category Name',
            'subcategory_hin.required'=> 'Please Insert Hindi Category Name',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hin'] = $request->subcategory_hin;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'Subcategory Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subcategory')->with($notification);
    }

    public function EditSubcat($id){
        $cat = DB::table('categories')->get();
        $subcat = DB::table('subcategories')->where('id', $id)->first();
        return view('backend.subcategory.edit', compact('cat', 'subcat'));
    }

    public function UpdateSubcat(Request $request, $id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hin'] = $request->subcategory_hin;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Subcategory Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subcategory')->with($notification);
    }

    public function DeleteSubcat($id){
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Subcategory Delete successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('subcategory')->with($notification);
    }
}
