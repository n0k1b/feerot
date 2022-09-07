<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product_required_filed;
use App\Models\user;
use App\Models\role;
use App\Models\role_permisiion;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



        user::create([
            'name'=>'Admin',
            'email'=>'admin@feerot.com',
            'contact_no'=>'1234',
            'password'=>Hash::make('1234'),
            'role'=>'Admin'

        ]);

        role::create([
            'name'=>'Admin',
            'description'=>'Admin has all access'
        ]);
        role_permisiion::create([
            'content_name'=>'category_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'sub_category_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'sub_category_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'courier_man_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'area_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'area_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'category_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'category_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'sub_category_view',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'sub_category_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'product_view',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'product_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'product_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'product_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'homepage_content_view',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'homepage_content_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'homepage_content_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'homepage_content_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'banner_view',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'banner_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'banner_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'banner_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'new_order_view',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'new_order_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'new_order_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'new_order_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'all_order_view',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'all_order_add',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'all_order_edit',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'all_order_delete',
            'role_id'=>1
        ]);
        role_permisiion::create([
            'content_name'=>'dashboard_view',
            'role_id'=>1
        ]);
       
    


    }
}
