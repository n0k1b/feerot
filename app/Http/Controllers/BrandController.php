<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_brand;
use App\Models\category;
use App\Models\sub_category;

class BrandController extends Controller
{
    //

    public function show_all_brand()
    {

        $datas = product_brand::where('sub_category_id','!=',NULL)->get();
        $i=1;
        foreach($datas as $data)
        {
            $data['sl_no'] = $i++;
        }
        return view('admin.brand.all',['datas'=>$datas]);


    }

    public function add_brand_ui()
    {
        $datas = sub_category::get();
        return view('admin.brand.add',['datas'=>$datas]);
    }
    public function add_brand(Request $request)
    {
        if($request->image)
        {
        $image = time() . '.' . request()->image->getClientOriginalExtension();

    $request
        ->image
        ->move(public_path('image/brand_image') , $image);
    $image = "image/brand_image/" . $image;
    product_brand::create(['brand_name'=>$request->name,'image'=>$image,'category_id'=>$request->category_id,'sub_category_id'=>$request->sub_category_id,'brand_details'=>$request->brand_details]);
        }
        else{
            product_brand::create(['brand_name'=>$request->name,'category_id'=>$request->category_id,'sub_category_id'=>$request->sub_category_id,'brand_details'=>$request->brand_details]);
        }
       //file_put_contents('test.txt',$request->name." ".$request->image);


        return redirect()->route('show-all-brand')->with('success','Brand Added Successfully');


    }

    public function brand_active_status_update(Request $request)
    {
        $id = $request->id;
        $status =product_brand::where('id', $id)->first()->status;
        if ($status == 1)
        {
            product_brand::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            product_brand::where('id', $id)->update(['status' => 1]);
        }
    }
    public function edit_brand_content_ui(Request $request)
    {
        $id = $request->id;
        $content = product_brand::where('id',$id)->first();
        $datas = category::get();
        return view('admin.brand.edit_content',['content'=>$content,'datas'=>$datas]);

    }
    public function edit_brand_image_ui(Request $request)
    {
        $id = $request->id;
        $data = product_brand::where('id',$id)->first();
        return view('admin.brand.edit_image',['data'=>$data]);

    }
    public function update_brand_content(Request $request)
    {
        $id = $request->id;

        product_brand::where('id', $id)->update(['brand_name' => $request->brand_name,'sub_category_id'=>$request->sub_category_id]);

        return redirect()
            ->route('show-all-brand')
            ->with('success', "Data Updated Successfully");
    }
    public function update_brand_image(Request $request)
    {
        $id = $request->id;
        $previous_image = product_brand::where('id',$id)->first()->image;
        if($previous_image)
        {
           if(file_exists($previous_image))
           {
                unlink( base_path($previous_image));
           }
        }
        $image = time() . '.' . request()->image->getClientOriginalExtension();

        $request->image->move(public_path('image/brand_image') , $image);
        $image = "image/brand_image/" . $image;

        product_brand::where('id',$id)->update(['image'=>$image]);
        return redirect()->route('show-all-brand')->with('success','Image Updated Successfully');

    }

    public function brand_content_delete(Request $request)
    {
        $id = $request->id;
        product_brand::where('id', $id)->delete();

    }

}
