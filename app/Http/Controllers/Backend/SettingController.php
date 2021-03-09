<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function SocialSetting(){
        $social = DB::table('socials')->first();
        return view('backend.setting.social',compact('social'));
    }

    public function Socialupdate(Request $request, $id){
        $data = array();

        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;

        DB::table('socials')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Social Link Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('social.setting')->with($notification);
    }

    public function SeoSetting(){
        $seo = DB::table('seos')->first();
        return view('backend.setting.seo', compact('seo'));
    }

    public function Seoupdate(Request $request, $id){
        $data = array();

        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytice'] = $request->google_analytice;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytice'] = $request->alexa_analytice;

        DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Social Link Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('seo.setting')->with($notification);
    }

    public function PrayerSetting(){
        $pray = DB::table('prayers')->first();
        return view('backend.setting.prayer',compact('pray'));
    }

    public function Prayerupdate(Request $request, $id){
        $data = array();

        $data['fajor'] = $request->fajor;
        $data['johor'] = $request->johor;
        $data['asor'] = $request->asor;
        $data['magrib'] = $request->magrib;
        $data['esha'] = $request->esha;
        $data['jummah'] = $request->jummah;

        DB::table('prayers')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Prayer Time Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('prayer.setting')->with($notification);
    }
}
