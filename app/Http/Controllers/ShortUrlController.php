<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use App\Http\Requests\ShortRequest;

class ShortUrlController extends Controller
{
    public function short(ShortRequest $request){
        if($request -> original_url){
            $new_url = ShortUrl::create([
                'original_url' => $request -> original_url
            ]);

            if($new_url){
                $short_url = base_convert($new_url->id, 10, 36);
                $new_url->update([
                    'short_url'=> $short_url
                ]);

                return redirect() -> back()-> with('success_message', 'Your Short URL is: <a class="text-green-500" href="' . url($short_url) .'">'. url($short_url) .'</a>');
            }
        }

        return back();
    }

    public function show($code){
        
        dd($code);

    }
}
