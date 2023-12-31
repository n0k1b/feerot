@extends('admin.layout.app')
@section('page_css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
@endsection
@section('content')



<div class="container-fluid">
@if(Session::has('success'))
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success" >

        {{Session::get('success')}}

        </div>
    @endif

    @if ($errors->any())
            <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger" >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
     @endif
				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Homepage Section</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>

                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Homepage Section List</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">

					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"></h4>
                                        @if(in_array('homepage_content_edit',$permission))
										<a href="{{ route('add-homepage-section') }}" class="btn btn-primary">+ Add new</a>
                                        @else
                                        <a href="javascript:void(0);" onclick="access_alert()" class="btn btn-primary">+ Add new</a>
                                        @endif
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="table" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
                                                        <th>Section Name</th>
														<th>Active Status</th>

                                                        <th>Action</th>
                                                        <th></th>

													</tr>
												</thead>
												<tbody  class="row_position">

                                                    @foreach($datas as $data)
													<tr id="{{ $data->id }}">
													<?php
													$checked = $data->status=='1'?'checked':'';
													?>
														<td><strong>{{$data->sl_no}}</strong></td>
														<td>{{$data->section_name}}</td>

														<td> <label class="switch">
															<input type="checkbox"  onclick="homepage_section_active_status({{$data->id}})" {{$checked}}>
																<span class="slider round"></span>
															</label></td>
														<td>
                                                            @if(in_array('homepage_content_edit',$permission))
															<a href="edit_homepage-section_content/{{$data->id}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            @else
                                                            <a href="javascript:void(0);" onclick="access_alert()" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            @endif
                                                            @if(in_array('homepage_content_delete',$permission))

															<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="homepage_section_content_delete({{$data->id}})"><i class="la la-trash-o"></i></a>
                                                            @else
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="access_alert()"><i class="la la-trash-o"></i></a>
                                                            @endif

                                                        </td>
                                                        <td><button class="btn btn-primary" onclick="location.href='change_retailer_priority/{{ $data->id }}'">Change Priority</button></td>
                                                        <td><button class="btn btn-primary" onclick="location.href='product-add-to-section/{{ $data->id }}'">Show Shop</button></td>
                                                        
													</tr>

												@endforeach


												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>

						</div>
					</div>
				</div>

            </div>

@endsection
@section('page_js')

<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">

    $("#example3").DataTable({
        ordering: false

    });


    $('tbody').sortable({
        cursor:'move',
        opacity:'0.6',
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });

    function updateOrder(data) {

        $.ajax({
            url:"update_homepage_content_order",
            type:'post',
            data:{position:data},
            success:function(){

            }
        })
    }


  </script>
@endsection
