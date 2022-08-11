<?php
  $with_domain_status = 0;
  $user_id = Auth::guard('admin')->user()->id;
  $user_role = Auth::guard('admin')->user()->role;
  $role_id = DB::table('roles')->where('name',$user_role)->first()->id;
  $role_permission = DB::table('role_permisiions')->where('role_id',$role_id)->pluck('content_name')->toArray();
 // file_put_contents('role.txt',json_encode($role_permission));


?>

<div class="dlabnav">


            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                   
                <li><a class="ai-icon" href="{{url('admin')}}" aria-expanded="false">
                        <i class="la la-bar-chart"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
              
				
				
					<li><a class="ai-icon" href="{{ route('show-all-category') }}" aria-expanded="false">
							<i class="la la-list"></i>
							<span class="nav-text">Category</span>
						</a>
					</li>
                   
               

					<li><a class="ai-icon" href="{{ route('show-all-sub-category') }}" aria-expanded="false">
							<i class="la la-list-alt"></i>
							<span class="nav-text">Sub Category</span>
						</a>
					</li>
                  


					
                  
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
						<i class="la la-dropbox"></i>
						<span class="nav-text">Product</span>
					</a>
					<ul aria-expanded="false">
						{{-- <li><a href="{{ route('show-all-product-field')}}">Product Field</a></li> --}}
						<li><a href="{{ route('get_all_product')}}">All Products</a></li>
                        <li><a href="{{ route('add-product')}}">Add Product</a></li>

					</ul>
				</li>
               


              
                <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dropbox"></i>
                    <span class="nav-text">Purchase</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('show-all-purchase')}}">All Purchase</a></li>
                    <li><a href="{{ route('add-purchase')}}">Add Purchase</a></li>

                </ul>
                 </li> -->
<!-- 
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dropbox"></i>
                    <span class="nav-text">Package</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('show_all_package')}}">All Package</a></li>
                    <li><a href="{{ route('add-package')}}">Add Package</a></li>


                </ul>
                 </li> -->
           
					<li><a class="ai-icon" href="{{ route('show-all-homepage_section') }}" aria-expanded="false">
							<i class="la la-home"></i>
							<span class="nav-text">Homepage Content</span>
						</a>
                    </li>
                  
                    <li><a class="ai-icon" href="{{ route('show-all-banner') }}" aria-expanded="false">
                        <i class="la la-image"></i>
                        <span class="nav-text">Banner</span>
                    </a>
                     </li>
                     
                 	<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
						<i class="la la-shopping-cart"></i>
						<span class="nav-text">Order</span>
					    </a>
                        <ul aria-expanded="false">
                           
                            <li><a href="{{ route('new-order')}}">New Order</a></li>
                           
                            <li><a href="{{ route('all-order')}}">All Order</a></li>
                           

                        </ul>
			    	</li>
                  
                    




              
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-shopping-cart"></i>
                    <span class="nav-text">Report</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{url('admin/report/order')}}">Order Report</a></li>
                        {{-- <li><a href="#">Purchase Report</a></li>
                        <li><a href="#">Exense Report</a></li> --}}



                    </ul>
                </li>
                




               
                  <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-gear"></i>
                    <span class="nav-text">Settings</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('show-all-role')}}">Role</a></li>
                        <li><a href="{{ route('show-all-user')}}">User</a></li>
                        <li><a href="{{ route('show-all-company-info')}}">Company Information</a></li>
                        <li><a href="{{ route('show-all-terms')}}">Terms and Condition</a></li>
                        <li><a href="{{ route('show-all-delivery-charge')}}">Delivery Charge</a></li>




                    </ul>
                </li>
               



				</ul>
            </div>
        </div>
