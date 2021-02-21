<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index(){
        $category = DB::table('categories')->orderBy('id', 'desc')->paginate(3);
        return view('backend.category.index',compact('category'));
    }

    public function create(){
        return view('backend.category.create');
    }

    public function StoreCategory(Request $request){
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_hin' => 'required|unique:categories|max:255',
        ],[
            'category_en.required'=> 'Please Insert English Category Name',
            'category_hin.required'=> 'Please Insert Hindi Category Name',
        ]);

        $data = array();

        $data['category_en'] = $request->category_en;
        $data['category_hin'] = $request->category_hin;

        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category')->with($notification);
    }


    public function EditCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit',compact('category'));
    }

    public function UpdateCategory(Request $request, $id){
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_hin' => 'required|unique:categories|max:255',
        ],[
            'category_en.required'=> 'Please Insert English Category Name',
            'category_hin.required'=> 'Please Insert Hindi Category Name',
        ]);

        $data = array();

        $data['category_en'] = $request->category_en;
        $data['category_hin'] = $request->category_hin;

        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Category Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category')->with($notification);
    }

    public function DeleteCategory($id){
        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Category Delete successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('category')->with($notification);
    }

}
