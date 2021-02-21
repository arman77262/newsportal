<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{
    public function index(){
        $subdist = DB::table('subdistricts')
        ->join('districts', 'subdistricts.district_id', 'districts.id')
        ->select('subdistricts.*', 'districts.district_en')
        ->orderBy('id', 'desc')->paginate(3);
        return view('backend.subdistrict.index',compact('subdist'));
    }

    public function create(){
        $dist = DB::table('districts')->get();
        return view('backend.subdistrict.create', compact('dist'));
    }

    public function StoreSubDistrict(Request $request){
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_hin' => 'required|unique:subdistricts|max:255',
        ],[
            'subdistrict_en.required'=> 'Please Insert English Sub District Name',
            'subdistrict_hin.required'=> 'Please Insert Hindi Sub District Name',
        ]);

        $data = array();
        $data['district_id'] = $request->district_id;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_hin'] = $request->subdistrict_hin;
        DB::table('subdistricts')->insert($data);

        $notification = array(
            'message' => 'SubDistrict Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subdistrict')->with($notification);
    }

    public function EditSubDistrict($id){
        $rdist = DB::table('districts')->get();
        $subdist = DB::table('subdistricts')->where('id', $id)->first();
        return view('backend.subdistrict.edit', compact('rdist', 'subdist'));
    }

    public function UpdateSubDistrict(Request $request, $id){
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_hin' => 'required|unique:subdistricts|max:255',
        ],[
            'subdistrict_en.required'=> 'Please Insert English Sub District Name',
            'subdistrict_hin.required'=> 'Please Insert Hindi Sub District Name',
        ]);

        $data = array();
        $data['district_id'] = $request->district_id;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_hin'] = $request->subdistrict_hin;
        DB::table('subdistricts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SubDistrict Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subdistrict')->with($notification);
    }

    public function DeleteSubDistrict($id){
        DB::table('subdistricts')->where('id', $id)->delete();
        $notification = array(
            'message' => 'SubDistrict Delete successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('subdistrict')->with($notification);
    }
}
