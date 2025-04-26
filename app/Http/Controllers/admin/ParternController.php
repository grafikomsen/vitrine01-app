<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partern;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ParternController extends Controller
{
    public function parterns(Request $request){

        $parterns = Partern::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $parterns->where('name','like','%'.$request->keyword.'%');
        }

        $parterns = $parterns->paginate(5);
        Session::put('page', 'parterns');
        return view('admin.parterns.parterns', compact('parterns'));
    }

    public function create(){

        return view('admin.parterns.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $partern = new Partern;
            $partern->name        = $request->name;
            $partern->description = $request->description;
            $partern->short_desc  = $request->short_desc;
            $partern->status      = $request->status;
            $partern->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'partern'.'-'.$partern->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;
                $desPath = './uploads/parterns/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $partern->image = $newFileName;
                $partern->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Partenaire crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Partenaire crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($parternId, Request $request){

        $partern = Partern::find($parternId);
        if (empty($partern)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.parterns.edit', compact('partern'));
    }

    public function updated($parternId, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $partern = Partern::find($parternId);
            if (empty($partern)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $partern->image;

            $partern->name        = $request->name;
            $partern->description = $request->description;
            $partern->short_desc  = $request->short_desc;
            $partern->status      = $request->status;
            $partern->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'partern'.'-'.strtotime('now').'-'.$partern->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/parterns/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/parterns/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $partern->image = $newFileName;
                $partern->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Partenaire modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Partenaire modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy($parternId, Request $request){

        $partern = Partern::find($parternId);
        if (empty($partern)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        $path = './uploads/parterns/'.$partern->image;
        File::delete($path);

        Partern::where('id', $parternId)->delete();
        Session()->flash('success','Partenaire supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Partenaire supprimé avec succéss',
        ]);
    }
}
