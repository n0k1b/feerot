@extends('admin.layout.app')
@section('page_css')
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/single_and_multiple_image_preview.css?{{time()}}" />
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/select2.min.css?{{time()}}" />
<link rel="stylesheet" href="{{asset('assets')}}/admin/css/select2_custom.css?{{time()}}" />
@endsection
@section('content')
<div class="container-fluid">

				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit Retailer Image</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Retailer</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Image</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Content Image</h5>
							</div>
							<div class="card-body">
                                <form action="{{route('update_retailer_image')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<div class="field" align="left">
                                                    <label class="form-label">Shop Thumbnail Image</label>
                                                    <input type="file" id="single_files" name="thumbnail_image" />
                                                    <input name="id" type="hidden" value="{{$data->id}}">
												  </div>
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
												<div class="field" align="left">
                                                    <label class="form-label">Banner Image</label>
                                                    <input type="file" id="multiple_files" name="banner_image" />
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
<script src="{{asset('assets')}}/admin/js/single_and_multiple_image_preview.js?{{time()}}"></script>
<script src="{{asset('assets')}}/admin/js/select2.full.js"></script>
<script src="{{asset('assets')}}/admin/js/advanced-form-element.js"></script>
<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>
@endsection
