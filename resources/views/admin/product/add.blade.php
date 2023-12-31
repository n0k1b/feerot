@extends('admin.layout.app')
 @section('page_css')

<link rel="stylesheet" href="{{asset('assets')}}/admin/css/single_and_multiple_image_preview.css?{{time()}}" />
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/select2.min.css?{{time()}}" />
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/select2_custom.css?{{time()}}" />



@endsection
 @section('content')
<div class="container-fluid">
    @if (count($errors)>0)
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger" >
        <ul>
            @foreach($errors->all() as $error)
                <li style="display: list-item;list-style-type:disc">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add Product</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Product</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if(strtolower(auth()->guard('admin')->user()->role) == 'admin')
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Select Retailerr</label>
                                    <select class="form-control select2" id="retailer" name="retailer_id">
                                        <option selected disabled>Select Retailer</option>
                                        @foreach($retailers as $retailer)
                                            <option value="{{ $retailer->user_id }}">{{ $retailer->shop_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" id="category" name="category_id">

                                    </select>
                                </div>
                            </div>

                        
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select class="form-control select2" id="sub_category" name="sub_category_id">
                                        <option>Select Category First</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control select2" id="brand" name="brand_id">
                                        <option>Select Category First</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product Unit Selling Price</label>
                                    <input type="number" class="form-control" name="price" placeholder="100" value="{{ old('price') }}" />
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Discount Price(Optional)</label>
                                    <input type="number" class="form-control" name="discount_price" placeholder="100" value="{{ old('discount_price') }}" />
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="field" align="left">
                                        <label class="form-label">Product Thumbnail Image</label>
                                        <input type="file" id="single_files" name="thumbnail_image"  />
                                    </div>
                                </div>
                            </div>

                            

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product Size(Optional)</label>
                                    <input type="text" class="form-control" name="size" value="{{ old('size') }}" />
                                </div>
                            </div>
                            

                        
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product Color(Optional)</label>
                                    <input type="text" class="form-control" name="color" value="{{ old('color') }}" />
                                </div>
                            </div>
                            

                           
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product Details(Optional)</label>
                                    <textarea type="text" class="form-control" name="product_details"  rows='6'></textarea>
                                </div>
                            </div>
                          

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product Look After Me(Optional)</label>
                                    <textarea type="text" class="form-control" name="product_look_after_me"  rows='6'></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Product About Me(Optional)</label>
                                    <textarea type="text" class="form-control" name="product_about_me"  rows='6'></textarea>
                                </div>
                            </div>
                            
                            

                           
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="field" align="left">
                                        <label class="form-label">Product Detail Image(Optional)</label>
                                        <input type="file" id="multiple_files" name="detail_image[]" multiple />
                                    </div>
                                </div>
                            </div> -->
                            

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('page_js')
<script src="{{asset('assets')}}/admin/js/single_and_multiple_image_preview.js?{{time()}}"></script>
{{-- <script src="{{asset('assets')}}/admin/js/bootstrap-select.js"></script> --}}
<script src="{{asset('assets')}}/admin/js/select2.full.js"></script>
<script src="{{asset('assets')}}/admin/js/advanced-form-element.js"></script>

<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>

@endsection
