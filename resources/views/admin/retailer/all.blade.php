@extends('admin.layout.app') @section('content')
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif @if ($errors->any())
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger">
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
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Brand List</a></li>
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
                            <a href="{{ route('add-retailer') }}" class="btn btn-primary">+ Add new</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Retiler Name</th>
                                            <th>Shop/Brand Name</th>
                                            <th>Thumbnail Image</th>
                                            <th>Banner Image</th>
                                            <th>Address</th>
                                            <th>Website Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Image Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            <?php
                                            $checked = $data->status=='1'?'checked':''; ?>
                                            <td><strong>{{$data->sl_no}}</strong></td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->shop_name }}</td>
                                            <td><img width="100" src="{{asset('public/'.$data->thumbnail_image)}}" alt="Not Available" /></td>
                                            <td><img width="100" src="{{asset('public/'.$data->banner_image)}}" alt="Not Available" /></td>
                                            <td>{{$data->address}}</td>
                                            <td>{{$data->website_address}}</td>
                                           
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" onclick="retailer_active_status({{$data->id}})" {{$checked}} />
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="edit_retailer_content/{{$data->id}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="retailer_content_delete({{$data->id}})"><i class="la la-trash-o"></i></a>
                                            </td>
                                            <td>
                                                <a href="edit_retailer_image/{{$data->id}}" class="btn btn-sm btn-info"><i class="la la-pencil"></i></a>
                                            </td>
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
@endsection @section('page_js')
<script>
     $("#example3").DataTable({
        ordering: false

    });
</script>
<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>

@endsection

