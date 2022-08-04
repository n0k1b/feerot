<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Storage;

class ResizeController extends Controller
{
    //
    public function index()
    {
    	return view('welcome');
    }
    public function resizeImage(Request $request)
    {
	    $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/thumbnail');
        $imgFile = Image::make($image->getRealPath());
        
        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['file']);
        return back()
        	->with('success','Image has successfully uploaded.')
        	->with('fileName',$input['file']);
    }
    public function convert_all_image()
    {
        //$image = file_get_contents('uploads/1659502430.jpg');
     
        //$response->header("Content-Type", $type);

      $destinationPath = public_path('/thumbnail');
      $img = imagecreatefromjpeg('uploads/1659502430.jpg');
      $image = Image::make('uploads/1659502430.jpg')->resize(300, 200);
      Storage::disk('public')->put('123.webp', (string) $image->encode());
     // $image->save( 'test/1659502430.jpg');
      //$img->move($destinationPath,imagecreatefromjpeg('uploads/1659502430.jpg'));

      //return gettype($img);
    //   $imgFile = Image::make($img->getRealPath());
        
    //     $imgFile->resize(150, 150, function ($constraint) {
	// 	    $constraint->aspectRatio();
	// 	})->save($destinationPath.'/'.$img);
     
    //    $img->resize(150, 150, function ($constraint) {
	// 	    $constraint->aspectRatio();
	// 	});
    //     $img->save($destinationPath,F('uploads/1659502430.jpg'));
    
       // return $response;

       
        
    }
}
