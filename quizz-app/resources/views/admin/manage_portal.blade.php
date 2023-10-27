
@extends('layouts.app')
@section('title','Manage Portal')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lí thông tin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lí thông tin</li>
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
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($portal as $key =>$pls)
                    <tr>
                      <td>{{$key++}}</td>
                      <td>{{$pls['name']}}</td>
                      <td>{{$pls['email']}}</td>
                      <td>{{$pls['mobile_no']}}</td>
                      <td>
                        <a href="{{ url('admin/edit_portal/' .$pls['id'])}}" class="btn btn-info">Sửa</a>
                        <a href="{{ url('admin/delete_portal/' .$pls['id'])}}" class="btn btn-danger">Xóa</a>
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
    </section>

    <!-- The Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Thêm thông tin</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{ url('admin/add_new_portal') }}" class="database_operation" >
              <div class="row">

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Họ Tên</label>
                    @csrf
                    <input type="text" required name="name" placeholder="Nhập tên..." class="form-control">
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Email</label>
                    @csrf
                    <input type="text" required name="email" placeholder="Nhập email... " class="form-control">
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Số điện thoại</label>
                    @csrf
                    <input type="text" required name="mobile_no" placeholder="Nhập số điện thoại" class="form-control">
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Mật khẩu</label>
                    @csrf
                    <input type="password" required name="password" placeholder="Nhập mật khẩu" class="form-control">
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

