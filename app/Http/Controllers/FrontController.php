<?php

namespace App\Http\Controllers;

use App\Models\Front;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $request->validate([
            'front_name' => 'required',
        ]);
        $front = Front::query()->where('front_name', $request->front_name)->first();
            $success['front_name'] = $front->front_name;
            $success['text'] = $front->text;

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request)
    {
        $request->validate([
            'front_name' => 'required',
            'text' => 'required',
        ]);
        Front::where('front_name', $request->front_name)->update($request->all());
        $success['front_name'] = $request->front_name;
        $success['text'] = $request->text;

        return response()->json(['success' => $success], $this->successStatus);
    }
}
