<?php

namespace App\Http\Controllers;

use App\Models\TShirt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TShirtController extends Controller
{
    public function store(Request $request)
    {
        $tshirt = new TShirt();
        $tshirt->tshirt_type = $request->input('tshirt_type');
        $tshirt->tshirt_length = $request->input('tshirt_length');
        $tshirt->color1 = $request->input('color1');
        $tshirt->color2 = $request->input('color2');
        $tshirt->color3 = $request->input('color3');
        $tshirt->print_positions = implode(',', $request->input('print_position'));

        $uploadPath = 'uploads/customtshirt/';

        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/customtshirt/', $filename);
            $tshirt->image = $uploadPath.$filename;
        }

        $tshirt->user_text = $request->input('user_text');
        $tshirt->save();

        // Redirect or perform additional actions as needed
    }
    public function showForm()
        {
            
            return view('tshirts.upload');
        }
}
