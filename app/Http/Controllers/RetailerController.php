<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\retailerDetails;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Log;
use Auth;
use DB;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function permission ()
    {

        $user_id = Auth::guard('admin')->user()->id;
        $user_role = Auth::guard('admin')->user()->role;
        $role_id = DB::table('roles')->where('name',$user_role)->first()->id;
        $role_permission = DB::table('role_permisiions')->where('role_id',$role_id)->pluck('content_name')->toArray();
        return $role_permission;

    }

    public function show_all_retailer()
    {
        $datas = retailerDetails::get();
        $i=1;
        foreach($datas as $data)
        {
            $data['sl_no'] = $i++;
        }
        $permission = $this->permission();
        return view('admin.retailer.all',['datas'=>$datas,'role_permission'=>$permission]);


    }

    public function add_retailer_ui()
    {
        $datas = User::where('role','Retailer')->get();
        return view('admin.retailer.add',compact('datas'));
    }
    public function add_retailer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required','unique:retailer_details' ],
         ]);
    if($validator->fails())
    {
        return redirect()->back()->with('errors',collect($validator->errors()->all()));
    }
    
        $thumbnail_image = time() . '.' . request()->thumbnail_image->getClientOriginalExtension();
        $request
        ->thumbnail_image
        ->move(public_path('image/retailer') , $thumbnail_image);
        $thumbnail_image = "image/retailer/" . $thumbnail_image;

        $banner_image = time() . '.' . request()->banner_image->getClientOriginalExtension();
        $request
        ->banner_image
        ->move(public_path('image/retailer') , $banner_image);
        $banner_image = "image/retailer/" . $banner_image;


        
        $retailer_details = new retailerDetails;
        $retailer_details->user_id = $request->user_id;
        $retailer_details->shop_name = $request->shop_name;
        $retailer_details->thumbnail_image = $thumbnail_image;
        $retailer_details->banner_image = $banner_image;
        $retailer_details->address = $request->address;
        $retailer_details->website_address = $request->website_address;
        $retailer_details->save();
    
        return redirect()->route('show-all-retailer')->with('success','Retailer Added Successfully');


    }

    public function retailer_active_status_update(Request $request)
    {
        $id = $request->id;
        $status =retailerDetails::where('id', $id)->first()->status;
        if ($status == 1)
        {
            retailerDetails::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            retailerDetails::where('id', $id)->update(['status' => 1]);
        }
    }
    public function edit_retailer_content_ui(Request $request)
    {
        $id = $request->id;
        $content = retailerDetails::where('id',$id)->first();
        $datas = User::where('role','Retailer')->get();
        return view('admin.retailer.edit_content',['content'=>$content,'datas'=>$datas]);
    }

    public function edit_retailer_image_ui(Request $request)
    {
        $id = $request->id;
        $data = retailerDetails::where('id',$id)->first();
        return view('admin.retailer.edit_image',['data'=>$data]);

    }


    public function update_retailer_content(Request $request)
    {
        $id = $request->id;

        $retailer_details = retailerDetails::find($id);
        $retailer_details->user_id = $request->user_id;
        $retailer_details->shop_name = $request->shop_name;
        $retailer_details->address = $request->address;
        $retailer_details->website_address = $request->website_address;
        $retailer_details->update();

        return redirect()
            ->route('show-all-retailer')
            ->with('success', "Data Updated Successfully");
    }
    public function update_retailer_image(Request $request)
    {
        $id = $request->id;

        $thumbnail_image = time() . '.' . request()->thumbnail_image->getClientOriginalExtension();
        $request
        ->thumbnail_image
        ->move(public_path('image/retailer') , $thumbnail_image);
        $thumbnail_image = "image/retailer/" . $thumbnail_image;

        $banner_image = time() . '.' . request()->banner_image->getClientOriginalExtension();
        $request
        ->banner_image
        ->move(public_path('image/retailer') , $banner_image);
        $banner_image = "image/retailer/" . $banner_image;

        $retailer_details = retailerDetails::find($id);
        $retailer_details->thumbnail_image = $thumbnail_image;
        $retailer_details->banner_image = $banner_image;
        $retailer_details->update();

        return redirect()
            ->route('show-all-retailer')
            ->with('success', "Data Updated Successfully");
    }


    public function retailer_content_delete(Request $request)
    {
        $id = $request->id;
        retailerDetails::where('id', $id)->delete();

    }

}
