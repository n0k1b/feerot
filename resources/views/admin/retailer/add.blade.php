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
                            <h4>Add Retailer</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Retailer</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">

							<div class="card-body">
                                <form action="{{route('add-retailer')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row">


                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
													<label>Retailer Name</label>
													<select class="form-control select2" id="sel1" name="user_id" required>
                                                        <option selected disabled>Select Retailer</option>
														@foreach($datas as $data)
														<option value="{{$data->id}}">{{$data->name}}</option>
													   @endforeach
													</select>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Shop/Brand Name</label>
												<input type="text" class="form-control" name="shop_name" required>
											</div>
										</div>


                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="field" align="left">
                                                    <label class="form-label">Shop Thumbnail Image</label>
                                                    <input type="file" id="single_files" name="thumbnail_image" required />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="field" align="left">
                                                    <label class="form-label">Shop Banner Image</label>
                                                    <input type="file" id="multiple_files" name="banner_image"  required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Shop Address(Optional)</label>
                                                <textarea type="text" class="form-control" name="product_about_me"  rows='6'></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Website Address(Optional,if you have website)</label>
												<input type="text" class="form-control" name="website_address">
											</div>
										</div>


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
@endsection
@section('page_js')
<script src="{{asset('assets')}}/admin/js/single_and_multiple_image_preview.js?{{time()}}"></script>
<script src="{{asset('assets')}}/admin/js/select2.full.js"></script>
<script src="{{asset('assets')}}/admin/js/advanced-form-element.js"></script>
<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>
@endsection
