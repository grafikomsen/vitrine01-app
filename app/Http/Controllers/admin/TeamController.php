<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function teams(Request $request){

        $teams = Team::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $teams->where('name','like','%'.$request->keyword.'%');
        }

        $teams = $teams->paginate(5);
        return view('admin.teams.teams', compact('teams'));
    }

    public function create(){
        return view('admin.teams.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $team = new Team;
            $team->name         = $request->name;
            $team->designation  = $request->designation;
            $team->url_fb       = $request->url_fb;
            $team->url_ins      = $request->url_ins;
            $team->url_tw       = $request->url_tw;
            $team->url_in       = $request->url_in;
            $team->status       = $request->status;
            $team->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'team'.'-'.$team->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;
                $desPath = './uploads/teams/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $team->image = $newFileName;
                $team->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Team crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Team crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($teamId, Request $request){

        $team = Team::find($teamId);
        if (empty($team)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.teams.edit', compact('team'));
    }

    public function updated($teamId, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $team = Team::find($teamId);
            if (empty($team)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $team->image;

            $team->name         = $request->name;
            $team->designation  = $request->designation;
            $team->url_fb       = $request->url_fb;
            $team->url_ins      = $request->url_ins;
            $team->url_tw       = $request->url_tw;
            $team->url_in       = $request->url_in;
            $team->status       = $request->status;
            $team->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'team'.'-'.strtotime('now').'-'.$team->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/teams/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/teams/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $team->image = $newFileName;
                $team->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','Team modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Team modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function destroy($teamId, Request $request){

        $team = team::find($teamId);
        if (empty($team)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        $path = './uploads/teams/'.$team->image;
        File::delete($path);

        team::where('id', $teamId)->delete();
        Session()->flash('success','Team supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'Team supprimé avec succéss',
        ]);
    }
}
