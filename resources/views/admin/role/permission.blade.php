@extends('admin.layout.app')
@section('page_css')
<style>
    .table{
        text-align: center;
    }
</style>
@endsection
@section('content')
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
                <h4>All Permission</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Role</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Permission list</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-responsive-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>View</th>
                                                        <th>Add</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <form action="{{ route('set_permission') }}" method="post">
                                                        @csrf
                                                    <tr>
                                                        <th>1</th>
                                                        <td>Category</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('category_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="category_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="category_view" id="check1" value="0">
                                                            @endif



                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('category_add',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="category_add" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="category_add" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('category_edit',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="category_edit"  id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="category_edit" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('category_delete',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="category_delete" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="category_delete" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <th>2</th>
                                                        <td>Sub Category</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('sub_category_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="sub_category_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="sub_category_view" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('sub_category_add',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="sub_category_add" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="sub_category_add" id="check1" value="0">
                                                            @endif


                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('sub_category_edit',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="sub_category_edit" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="sub_category_edit" id="check1" value="0">
                                                            @endif


                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('sub_category_delete',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="sub_category_delete" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="sub_category_delete" id="check1" value="0">
                                                            @endif


                                                        </div>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <th>3</th>
                                                        <td>Product</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('product_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="product_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="product_view" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">

                                                            @if(in_array('product_add',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="product_add" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="product_add" id="check1" value="0">
                                                            @endif
                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('product_edit',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="product_edit" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="product_edit" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('product_delete',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="product_delete" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="product_delete" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                    </tr>


                                                    <tr>
                                                        <th>4</th>
                                                        <td>Homepage Content</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('homepage_content_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_view" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('homepage_content_add',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_add" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_add" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('homepage_content_edit',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_edit" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_edit" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('homepage_content_delete',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_delete" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="homepage_content_delete" id="check1" value="0">
                                                            @endif
                                                        </div>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <th>6</th>
                                                        <td>Banner</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('banner_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="banner_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="banner_view" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('banner_add',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="banner_add" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="banner_add" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('banner_edit',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="banner_edit" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="banner_edit" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('banner_delete',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="banner_delete" id="check1" value="" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="banner_delete" id="check1" value="">
                                                            @endif

                                                        </div>
                                                       </td>
                                                    </tr>
                                                   
                                                    

                                                    <tr>
                                                        <th>7</th>
                                                        <td>Order</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('order_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="order_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="order_view" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">


                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('order_edit',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="order_edit" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="order_edit" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">


                                                        </div>
                                                       </td>
                                                    </tr>


                                                    <tr>
                                                        <th>8</th>
                                                        <td>Report</td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">
                                                            @if(in_array('report_view',$role_permission))
                                                            <input type="checkbox" class="form-check-input" name="report_view" id="check1" value="1" checked>
                                                            @else
                                                            <input type="checkbox" class="form-check-input" name="report_view" id="check1" value="0">
                                                            @endif

                                                        </div>
                                                       </td>

                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">


                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">


                                                        </div>
                                                       </td>
                                                       <td style="text-align: center;
                                                       padding-bottom: 33px">
                                                        <div class="form-check">


                                                        </div>
                                                       </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <input type="hidden" name="role_id" value="{{ $id }}">
                                            <button type="submit" style="float:right" class="btn btn-primary">Update</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
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

