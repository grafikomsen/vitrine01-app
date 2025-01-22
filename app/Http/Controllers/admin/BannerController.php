<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function banners(Request $request){

        $banners = Banner::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $banners->where('name','like','%'.$request->keyword.'%');
        }

        $banners = $banners->paginate(5);
        return view('admin.banners.banners', compact('banners'));
    }

    public function create(){
        return view('admin.banners.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $banner = new Banner;
            $banner->name       = $request->name;
            $banner->content    = $request->content;
            $banner->status     = $request->status;
            $banner->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'banner'.'-'.$banner->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;
                $desPath = './uploads/banners/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $banner->image = $newFileName;
                $banner->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Banner crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Banner crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($bannerId, Request $request){

        $banner = Banner::find($bannerId);
        if (empty($banner)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.banners.edit', compact('banner'));
    }

    public function updated($bannerId, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $banner = banner::find($bannerId);
            if (empty($banner)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $banner->image;

            $banner->name       = $request->name;
            $banner->content    = $request->content;
            $banner->status     = $request->status;
            $banner->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'banner'.'-'.strtotime('now').'-'.$banner->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/banners/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/banners/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $banner->image = $newFileName;
                $banner->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Banner modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Banner modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy($bannerId){

        $banner = banner::find($bannerId);
        if (empty($banner)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        $path = './uploads/banners/'.$banner->image;
        File::delete($path);

        banner::where('id', $bannerId)->delete();
        Session()->flash('success','Banner supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Banner supprimé avec succéss',
        ]);
    }
}
