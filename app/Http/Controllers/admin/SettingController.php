<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function settings(Request $request){

        $settings = Settings::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $settings->where('name','like','%'.$request->keyword.'%');
        }

        $settings = $settings->paginate(5);
        Session::put('page', 'settings');
        return view('admin.settings.settings', compact('settings'));
    }

    public function create(){
        return view('admin.settings.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'question' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $setting = new Settings();
            $setting->question  = $request->question;
            $setting->answer    = $request->answer;
            $setting->status    = $request->status;
            $setting->save();

        Session()->flash('success','setting crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'setting crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function edit($settingId, Request $request){

        $setting = Settings::find($settingId);
        if (empty($setting)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.settings.edit', compact('setting'));
    }

    public function updated($settingId, Request $request){

        $validator = Validator::make($request->all(),[
            'website_title' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $setting = Settings::find($settingId);
            if (empty($setting)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $oldImageName = $setting->image;

            $setting->website_title = $request->website_title;
            $setting->description   = $request->description;
            $setting->keyword       = $request->keyword;
            $setting->og_locale     = $request->og_locale;
            $setting->og_type       = $request->og_type;
            $setting->og_image_type = $request->og_image_type;
            $setting->twitter_card  = $request->twitter_card;
            $setting->email         = $request->email;
            $setting->address       = $request->address;
            $setting->phone         = $request->phone;
            $setting->article_modified_time     = $request->article_modified_time;
            $setting->url_canonique             = $request->url_canonique;
            $setting->url_googleSearchConsole   = $request->url_googleSearchConsole;
            $setting->url_googleMaps            = $request->url_googleMaps;
            $setting->url_googleMaps            = $request->url_googleMaps;
            $setting->url_facebook              = $request->url_facebook;
            $setting->url_twintter  = $request->url_twintter;
            $setting->url_instagram = $request->url_instagram;
            $setting->url_tictok    = $request->url_tictok;
            $setting->copyright     = $request->copyright;
            $setting->status        = $request->status;
            $setting->save();

            if ($request->image_id > 0) {
                # code...
                $tempImage = TempFile::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $extension = end($imageArray);

                $newFileName = 'setting'.'-'.strtotime('now').'-'.$setting->id.'.'.$extension;
                $sourcePath = './uploads/temp/'.$tempFileName;

                // Delete
                $sourcePathOlder = './uploads/settings/'.$oldImageName;
                File::delete($sourcePathOlder);

                $desPath = './uploads/settings/'.$newFileName;
                File::copy($sourcePath,$desPath);

                $setting->image = $newFileName;
                $setting->save();

                File::delete($sourcePath);
            }

        Session()->flash('success','setting modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'setting modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy($settingId){

        $setting = Settings::find($settingId);
        if (empty($setting)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        Settings::where('id', $settingId)->delete();
        Session()->flash('success','setting supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'setting supprimé avec succéss',
        ]);
    }
}
