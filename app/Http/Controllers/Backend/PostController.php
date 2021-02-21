<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function AddPost(){
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.create',compact('category', 'district'));
    }

    public function getSubcategory($category_id){
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    public function getSubdsitrict($district_id){
        $subdist = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($subdist);
    }


    public function StorePost(Request $request){

        $validated = $request->validate([
            'title_en' => 'required|unique:posts|max:255',
            'title_hin' => 'required|unique:posts|max:255',
        ],[
            'title_en.required'=> 'Please Insert English Title Name',
            'title_hin.required'=> 'Please Insert Hindi Title Name',
        ]);

        $data = array();

        $data['title_en'] = $request->title_en;
        $data['title_hin'] = $request->title_hin;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_hin'] = $request->tags_hin;
        $data['details_en'] = $request->details_en;
        $data['details_hin'] = $request->details_hin;
        $data['headline'] = $request->headline;
        $data['big_thumbnail'] = $request->big_thumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        $image = $request->image;
        if($image){
            $one_image = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('images/postimg/'.$one_image);
            $data['image'] = 'images/postimg/'.$one_image;
            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('addpost')->with($notification);
        }else{
            return redirect()->back();
        }

    }
}
