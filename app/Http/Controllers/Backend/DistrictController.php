<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function index(){
        $district = DB::table('districts')->orderBy('id', 'desc')->paginate(3);
        return view('backend.district.index', compact('district'));
    }

    public function create(){
        return view('backend.district.create');
    }

    public function StoreDistrict(Request $request){
        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_hin' => 'required|unique:districts|max:255',
        ],[
            'district_en.required'=> 'Please Insert English District Name',
            'district_en.required'=> 'Please Insert Hindi District Name',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;
        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'District Added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('district')->with($notification);
    }

    public function EditDistrict($id){
        $dist = DB::table('districts')->where('id', $id)->first();
        return view('backend.district.edit', compact('dist'));
    }

    public function UpdateDistrict(Request $request, $id){
        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_hin' => 'required|unique:districts|max:255',
        ],[
            'district_en.required'=> 'Please Insert English District Name',
            'district_en.required'=> 'Please Insert Hindi District Name',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;
        DB::table('districts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'District Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('district')->with($notification);
    }

    public function DeleteDistrict($id){
        DB::table('districts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'District Delete successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('district')->with($notification);
    }
}
