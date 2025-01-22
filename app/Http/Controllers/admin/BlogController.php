<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function blogs(Request $request){

        $blogs = Blog::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $blogs->where('name','like','%'.$request->keyword.'%');
        }

        $blogs = $blogs->paginate(5);
        return view('admin.blogs.blogs', compact('blogs'));
    }

    public function create(){
        return view('admin.blogs.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $blog = new Blog;
            $blog->name        = $request->name;
            $blog->description = $request->description;
            $blog->short_desc  = $request->short_desc;
            $blog->status      = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'blog'.'-'.$blog->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;
                $desPath = './uploads/blogs/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $blog->image = $newFileName;
                $blog->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','blog crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'blog crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($blogId, Request $request){

        $blog = Blog::find($blogId);
        if (empty($blog)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.blogs.edit', compact('blog'));
    }

    public function updated($blogId, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $blog = Blog::find($blogId);
            if (empty($blog)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $blog->image;

            $blog->name        = $request->name;
            $blog->description = $request->description;
            $blog->short_desc  = $request->short_desc;
            $blog->status      = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'blog'.'-'.strtotime('now').'-'.$blog->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/blogs/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/blogs/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $blog->image = $newFileName;
                $blog->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','blog modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'blog modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy($blogId, Request $request){

        $blog = Blog::find($blogId);
        if (empty($blog)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        $path = './uploads/blogs/'.$blog->image;
        File::delete($path);

        Blog::where('id', $blogId)->delete();
        Session()->flash('success','blog supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'blog supprimé avec succéss',
        ]);
    }
}
