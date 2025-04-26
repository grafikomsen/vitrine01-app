<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function pages(Request $request){

        $pages = Page::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $pages->where('name','like','%'.$request->keyword.'%');
        }

        $pages = $pages->paginate(5);
        Session::put('page', 'pages');
        return view('admin.pages.pages', compact('pages'));
    }

    public function create(){

        return view('admin.pages.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $page = new Page;
            $page->name     = $request->name;
            $page->content  = $request->content;
            $page->url      = $request->url;
            $page->status   = $request->status;
            $page->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'page'.'-'.$page->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;
                $desPath = './uploads/pages/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $page->image = $newFileName;
                $page->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Page crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Page crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($pageId, Request $request){

        $page = page::find($pageId);
        if (empty($page)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.pages.edit', compact('page'));
    }

    public function updated($pageId, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $page = page::find($pageId);
            if (empty($page)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $page->image;

            $page->name     = $request->name;
            $page->content  = $request->content;
            $page->url      = $request->url;
            $page->status   = $request->status;
            $page->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'page'.'-'.strtotime('now').'-'.$page->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/pages/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/pages/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $page->image = $newFileName;
                $page->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Page modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Page modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function destroy($pageId){

        $page = page::find($pageId);
        if (empty($page)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        $path = './uploads/pages/'.$page->image;
        File::delete($path);

        page::where('id', $pageId)->delete();
        Session()->flash('success','Page supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Page supprimé avec succéss',
        ]);
    }
}
