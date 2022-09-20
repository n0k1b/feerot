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
                            <h4>All Retailer</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Retailer</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">

					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="table" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>


                                                        <th>Retailer Name</th>
														<th>Image</th>
													


													</tr>
												</thead>
												<tbody  class="row_position">

                                                    @foreach($datas as $data)
													<tr id="{{ $data->id }}">
													<?php
													$checked = $data->status=='1'?'checked':'';
													?>
														<td><strong>{{$data->sl_no}}</strong></td>



                                                        <td>{{$data->retailer->shop_name}}</td>
                                                        <td><img  height="120px" width="250px" src="../public/{{$data->retailer->thumbnail_image}}"  alt="Not Available"></td>
														
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
            url:"../update_retailer_order",
            type:'post',
            data:{position:data},
            success:function(){

            }
        })
    }


  </script>
@endsection
