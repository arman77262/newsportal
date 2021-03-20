<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index(){
        $website = DB::table('websites')->orderBy('id', 'desc')->paginate(5);
        return view('backend.website.index', compact('website'));
    }

    public function AddLink(){
        return view('backend.website.create');
    }

    public function StoreLink(Request $request){
        $validated = $request->validate([
            'website_name' => 'required|unique:websites|max:255',
            'website_address' => 'required|unique:websites|max:255',
        ],[
            'website_name.required'=> 'Please Insert Website Name',
            'website_address.required'=> 'Please Insert Website Link',
        ]);

        $data = array();

        $data['website_name'] = $request->website_name;
        $data['website_address'] = $request->website_address;

        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('website.link')->with($notification);
    }

    public function EditLink($id){
        $website = DB::table('websites')->where('id', $id)->first();
        return view('backend.website.edit', compact('website'));
    }

    public function UpdateLink(Request $request, $id){
        $validated = $request->validate([
            'website_name' => 'required|unique:websites|max:255',
            'website_address' => 'required|unique:websites|max:255',
        ],[
            'website_name.required'=> 'Please Insert Website Name',
            'website_address.required'=> 'Please Insert Website Link',
        ]);

        $data = array();

        $data['website_name'] = $request->website_name;
        $data['website_address'] = $request->website_address;

        DB::table('websites')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Website Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('website.link')->with($notification);
    }

    public function DeleteLink($id){
        DB::table('websites')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Website Delete successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
