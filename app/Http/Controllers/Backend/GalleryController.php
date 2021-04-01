<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function PhotoGallery(){
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.photos', compact('photo'));
    }

    public function AddPhoto(){
        return view('backend.gallery.ceratephoto');
    }

    public function StorePhoto(Request $request){

        $data = array();

        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $image = $request->photo;
        if($image){
            $one_image = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('images/PhotoGallery/'.$one_image);
            $data['photo'] = 'images/PhotoGallery/'.$one_image;
            DB::table('photos')->insert($data);

            $notification = array(
                'message' => 'Photo Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('photo.gallery')->with($notification);
        }else{
            return redirect()->back();
        }
    }

    public function EditPhoto($id){
        $edit = DB::table('photos')->where('id', $id)->first();
        return view('backend.gallery.edit', compact('edit'));
    }

    public function UpdatePhoto(Request $request, $id){
        $data = array();

        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $oldImage = $request->oldimage;
        $image = $request->photo;
        if($image){
            $one_image = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('images/PhotoGallery/'.$one_image);
            $data['photo'] = 'images/PhotoGallery/'.$one_image;
            DB::table('photos')->where('id', $id)->update($data);
            unlink($oldImage);

            $notification = array(
                'message' => 'Photo Updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('photo.gallery')->with($notification);
        }else{
            $data['photo'] = $oldImage;
            DB::table('photos')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Photo Updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('photo.gallery')->with($notification);
        }
    }
}
