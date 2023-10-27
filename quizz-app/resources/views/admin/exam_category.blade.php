
@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Môn học</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Môn học</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="" class="btn btn-success  " data-toggle="modal" data-target="#myModal">Thêm</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên môn học</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($category as $key =>$cat)
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $cat['name'] ?></td>
                      <td>
                        <a href="{{ url('admin/edit_category/' .$cat['id'])}}" class="btn btn-info">Sửa</a>
                        <a href="{{ url('admin/delete_category/' .$cat['id'])}}" class="btn btn-danger">Xóa</a>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                  
              </div>
             
            </div>
          
          </div>
        </div>
      </div>
    </section>

    <!-- The Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Thêm</h4></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{ url('admin/add_new_category') }}" class="database_operation" >
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Tên môn học</label>
                    @csrf
                    <input type="text" required name="name" placeholder="Nhập tên môn học" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <button class="btn btn-success">Thêm</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    
  </div>
@endsection