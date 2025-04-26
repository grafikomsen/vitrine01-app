<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function faqs(Request $request){

        $faqs = Faq::orderBy('created_at','DESC');
        if (!empty($request->keyword)) {
            # code...
            $faqs->where('question','like','%'.$request->keyword.'%');
        }

        $faqs = $faqs->paginate(5);
        Session::put('page', 'faqs');
        return view('admin.faqs.faqs', compact('faqs'));
    }

    public function create(){
        return view('admin.faqs.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'question' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $faq = new faq;
            $faq->question  = $request->question;
            $faq->answer    = $request->answer;
            $faq->status    = $request->status;
            $faq->save();

        Session()->flash('success','faq crée avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'faq crée avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function edit($faqId, Request $request){

        $faq = faq::find($faqId);
        if (empty($faq)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }
        return view('admin.faqs.edit', compact('faq'));
    }

    public function updated($faqId, Request $request){

        $validator = Validator::make($request->all(),[
            'question' => 'required'
        ]);

        if ($validator->passes()) {
            # code...
            $faq = faq::find($faqId);
            if (empty($faq)) {
                # code...
                Session()->flash('error','Element non disponible');
                return response()->json([
                    'status' => 0
                ]);
            }

            $faq->question  = $request->question;
            $faq->answer    = $request->answer;
            $faq->status    = $request->status;
            $faq->save();

        Session()->flash('success','faq modifié avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'faq modifié avec succéss',
        ]);

        } else {
            # code...
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy($faqId){

        $faq = faq::find($faqId);
        if (empty($faq)) {
            # code...
            Session()->flash('error','Element non disponible');
            return response()->json([
                'status' => 0
            ]);
        }

        faq::where('id', $faqId)->delete();
        Session()->flash('success','faq supprimé avec succéss');
        return response()->json([
            'status' => 200,
            'message' => 'faq supprimé avec succéss',
        ]);
    }
}
