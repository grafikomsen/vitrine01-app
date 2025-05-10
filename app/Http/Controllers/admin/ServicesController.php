<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function services(Request $request){

        $services = Service::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $services->where('name','like','%'.$request->keyword.'%');
        }

        $services = $services->paginate(5);
        Session::put('page', 'services');
        return view('admin.services.services', compact('services'));
    }

    public function create(){
        return view('admin.services.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $service = new Service;
            $service->name        = $request->name;
            $service->slug        = Str::slug($request->name);
            $service->icon        = $request->icon;
            $service->short_desc  = Str::limit($request->description, 150);
            $service->description = $request->description;
            $service->status      = $request->status;
            $service->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'service'.'-'.$service->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;
                $desPath = './uploads/services/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $service->image = $newFileName;
                $service->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Service crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Service crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($serviceId, Request $request){

        $service = Service::find($serviceId);
        if (empty($service)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.services.edit', compact('service'));
    }

    public function updated($serviceId, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $service = Service::find($serviceId);
            if (empty($service)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $service->image;

            $service->name        = $request->name;
            $service->slug        = Str::slug($request->name);
            $service->icon        = $request->icon;
            $service->short_desc  = Str::limit($request->description, 150);
            $service->description = $request->description;
            $service->status      = $request->status;
            $service->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'service'.'-'.strtotime('now').'-'.$service->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/services/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/services/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $service->image = $newFileName;
                $service->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Service modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Service modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function destroy($serviceId, Request $request){

        $service = Service::find($serviceId);
        if (empty($service)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        $path = './uploads/services/'.$service->image;
        File::delete($path);

        Service::where('id', $serviceId)->delete();
        Session()->flash('success','Service supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Service supprimé avec succéss',
        ]);
    }
}
