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
                            <h4>Edit category</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Category</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">

							<div class="card-body">
                                <form action="{{route('update_retailer_content')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Retailer Name</label>
                                                <select class="form-control select2" id="sel1" name="user_id">
                                                    @foreach($datas as $data)
                                                    @if($data->id == $content->id)
                                                    <option value="{{$data->id}}" selected>{{$data->name}}</option>
                                                    @else
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endif
                                                   @endforeach
                                                </select>
                                            </div>
                                        </div>

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Shop/Brand Name</label>
												<input type="text" class="form-control" name="shop_name" value="{{ $content->shop_name }}" required>
                                                <input type="hidden" class="form-control" name="id" value="{{ $content->id }}">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Shop Address(Optional)</label>
                                                <textarea type="text" class="form-control" name="product_about_me"  rows='6' value = "{{ $content->address }}"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Website Address(Optional,if you have website)</label>
												<input type="text" class="form-control" name="website_address" value="{{ $content->website_address }}">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Discount Percentage(optional)</label>
												<input type="number" class="form-control" name="discount_percentage"  value="{{ $content->discount_percentage }}">
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
