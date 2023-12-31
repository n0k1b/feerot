@extends('admin.layout.app')
@section('page_css')
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/image_preview.css?{{time()}}">
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/select2.min.css?{{time()}}" />
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/select2_custom.css?{{time()}}" />
@endsection
@section('content')
<div class="container-fluid">

				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Brand</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Homepage Content</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Sub_category</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">

							<div class="card-body">
                                <form action="{{route('add-brand')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label>Category</label>
												<select class="form-control select2" id="category" name="category_id"> </select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label>Sub Category</label>
												<select class="form-control select2" id="sub_category" name="sub_category_id">
													<option>Select Category First</option>
												</select>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Brand Name</label>
												<input type="text" class="form-control" name="name">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												<label class="form-label">Brand Details(Optional)</label>
												<textarea type="text" class="form-control" name="brand_details"  row='6'></textarea>
											</div>
                           				</div>


										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">

												<div class="field" align="left">
													<label class="form-label">Brand Image(optional)</label>
													<input type="file" id="files" name="image" />
												  </div>
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
<script src="{{asset('assets')}}/admin/js/single_image_preview.js?{{time()}}"></script>
<script src="{{asset('assets')}}/admin/js/select2.full.js"></script>
<script src="{{asset('assets')}}/admin/js/advanced-form-element.js"></script>
<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>
@endsection
