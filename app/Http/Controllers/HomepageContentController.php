<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use DB;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\homepage_section;
use App\Models\homepage_product_list;
use App\Models\retailerDetails;

class HomepageContentController extends Controller
{
    //


    public function permission ()
{

    $user_id = Auth::guard('admin')->user()->id;
    $user_role = Auth::guard('admin')->user()->role;
    $role_id = DB::table('roles')->where('name',$user_role)->first()->id;
    $role_permission = DB::table('role_permisiions')->where('role_id',$role_id)->pluck('content_name')->toArray();
    return $role_permission;

}

    public function show_all_homepage_section()
    {
        //echo "hello";
                //
        $datas = homepage_section::orderBy('section_order')->get();
        //echo "hello";
        $i=1;
        $permission = $this->permission();
        foreach($datas as $data)
        {
            $data['sl_no'] = $i++;
        }
        //echo "hello";
        return view('admin.homepage_section.all',['datas'=>$datas,'permission'=>$permission]);


    }

    public function add_homepage_section_ui()
    {
        return view('admin.homepage_section.add');
    }


    public function add_homepage_section(Request $request)
    {
        $rules = [
            'name'=>'required',
        ];
        $customMessages = [
            'name.required' => 'Section name field is required.',

        ];

    $validator = Validator::make( $request->all(), $rules, $customMessages );


    if($validator->fails())
    {
        return redirect()->back()->withInput()->with('errors',collect($validator->errors()->all()));
    }

        $homepage_section = homepage_section::get();
        if(sizeof($homepage_section)>0)
        {
            $last_insert_id = homepage_section::orderBy('section_order','DESC')->first()->section_order;

        }
        else
        {
            $last_insert_id = 0;
        }
        if($request->image)
        {
        $image = time() . '.' . request()->image->getClientOriginalExtension();

    $request
        ->image
        ->move(public_path('image/homepage_section_image') , $image);
    $image = "image/homepage_section_image/" . $image;
    homepage_section::create(['section_name'=>$request->name,'image'=>$image,'section_order'=>$last_insert_id+1]);
        }
       //file_put_contents('test.txt',$request->name." ".$request->image);
        else

        {
            homepage_section::create(['section_name'=>$request->name,'section_order'=>$last_insert_id+1]);
        }

        return redirect()->route('show-all-homepage_section')->with('success','homepage_section Added Successfully');


    }

    public function homepage_section_active_status_update(Request $request)
    {
        $id = $request->id;
        $status =homepage_section::where('id', $id)->first()->status;
        if ($status == 1)
        {
            homepage_section::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            homepage_section::where('id', $id)->update(['status' => 1]);
        }
    }
    public function edit_homepage_section_content_ui(Request $request)
    {
        $id = $request->id;
        $data = homepage_section::where('id',$id)->first();
        return view('admin.homepage_section.edit_content',['data'=>$data]);

    }
    public function edit_homepage_section_image_ui(Request $request)
    {
        $id = $request->id;
        $data = homepage_section::where('id',$id)->first();
        return view('admin.homepage_section.edit_image',['data'=>$data]);

    }
    public function update_homepage_section_content(Request $request)
    {
        $id = $request->id;

        homepage_section::where('id', $id)->update(['section_name' => $request->name]);

        return redirect()
            ->route('show-all-homepage_section')
            ->with('success', "Data Updated Successfully");
    }
    public function update_homepage_section_image(Request $request)
    {
        $id = $request->id;
        $previous_image = homepage_section::where('id',$id)->first()->image;
        if($previous_image)
        {


                if(file_exists($previous_image))
           {
                unlink( base_path($previous_image));
           }



        }
        $image = time() . '.' . request()->image->getClientOriginalExtension();

        $request->image->move(public_path('image/homepage_section_image') , $image);
        $image = "image/homepage_section_image/" . $image;

        homepage_section::where('id',$id)->update(['image'=>$image]);
        return redirect()->route('show-all-homepage_section')->with('success','Image Updated Successfully');

    }

    public function homepage_section_content_delete(Request $request)
    {
        $id = $request->id;
        homepage_section::where('id', $id)->delete();

    }

    public function update_homepage_content_order(Request $request)
    {
        $position = $request->position;
        //file_put_contents('test.txt',$position[0]);
        $homepage_section = homepage_section::get();
        for($i = 0 ;$i<sizeof($position);$i++)
        {
            homepage_section::where('id',$position[$i])->update(['section_order'=>$i+1]);
        }

    }

    public function product_add_to_section_ui($id)
    {
        // $retailer_list = retailerDetails::get();
        // foreach($retailer_list as $retailer)
        // {
        //     $avail = homepage_product_list::where('homepage_section_id',$id)->where('retailer_id',$retailer->id)->first();
        //     if($avail)
        //     {
        //         $retailer['avail'] = 1;
        //     }
        //     else
        //     {
        //         $retailer['avail'] = 0;
        //     }
        // }
        return view('admin.homepage_section.product_section_all',compact('id'));
    }



    public function add_retailer_to_section(Request $request)
    {
            $retailer_id = $request->retailer_id;
            $homepage_section_id = $request->homepage_section_id;
            homepage_product_list::create(['homepage_section_id'=>$homepage_section_id,'retailer_id'=>$retailer_id]);

    }



    public function update_product_to_section(Request $request)
    {
            $product_id = $request->product_id;
            $product_percentage = $request->product_percentage;

            homepage_product_list::where('id',$product_id)->update(['discount_percentage'=>$product_percentage]);

            //homepage_product_list::update(['homepage_section_id'=>$homepage_section_id,'product_list'=>$product_id,'discount_percentage'=>$discount_percentage]);

    }

    public function update_retailer_order(Request $request)
    {
        $position = $request->position;
        
        // for($i = 0 ;$i<sizeof($position);$i++)
        // {
        //     homepage_product_list::where('homepage_section_id',$id)->orderBy('order')->get();
        //     banner::where('id',$position[$i])->update(['order'=>$i+1]);
        // }

    }


    public function change_retailer_priority($id)
    {
        $datas = homepage_product_list::where('homepage_section_id',$id)->orderBy('order')->get();
        $i=1;

        foreach($datas as $data)
        {
            $data['sl_no'] = $i++;
        }
        $permission = $this->permission();
        return view('admin.homepage_section.change_priority',['datas'=>$datas,'role_permission'=>$permission]);

        //return $id;
    }


    public function get_all_homepage_section_retailer($id)
    {
      $retailer_list =   homepage_product_list::where('homepage_section_id',$id)->get();
        $data = '';
        foreach($retailer_list as $retailer)
        {
            $data.='
            <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <img class="img" src="../public/'.$retailer->retailer->thumbnail_image.'" alt=""  height="200px">
                    <div class="card-body">
                        <h4>'.$retailer->retailer->shop_name.'</h4>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="delete_retailer_from_section('.$retailer->id.')"><i class="la la-trash-o"></i></a>
                    </div>
                </div>
            </div>
    ';
        }
        $all_retailer = '<label>Select Product</label>
        <select class="form-control select2" id="retailer_id" name="retailer_id">
            <option>Select Retailer</option>';
        $retailer_list = retailerDetails::get();
        foreach($retailer_list as $retailer)
        {
            $avail = homepage_product_list::where('homepage_section_id',$id)->where('retailer_id',$retailer->id)->first();
            if($avail)
            {
                $retailer['avail'] = 1;
            }
            else
            {
                $retailer['avail'] = 0;
            }
        }
        foreach($retailer_list as $retailer)
        {
            if($retailer->avail == 0){
                 $all_retailer.='


                <option value="'.$retailer->id.'">'. $retailer->shop_name.'</option>

       ';
            }
            else{
        $all_retailer.='


        <option value="'.$retailer->id .'" disabled>'.$retailer->shop_name.'</option>

       ';
        }
    }
        $all_retailer.=' </select>

        <script src="../../assets/admin/js/select2.full.js"></script>
        <script src="../../assets/admin/js/advanced-form-element.js"></script>

        ';


        echo json_encode(['section_retailer'=>$data,'all_retailer'=>$all_retailer]);

    }

    public function delete_retailer_from_section(Request $request)
    {
        $id = $request->id;
        homepage_product_list::where('id', $id)->delete();

    }

    public function get_all_retailer_list($id)
    {
        $retailer_list = product::get();
        foreach($retailer_list as $retailer)
        {
            $avail = homepage_product_list::where('homepage_section_id',$id)->where('retailer_id',$retailer->id)->first();
            if($avail)
            {
                $product['avail'] = 1;
            }
            else
            {
                $product['avail'] = 0;
            }
        }


    }
}
