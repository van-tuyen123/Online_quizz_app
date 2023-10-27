
@extends('layouts.app')
@section('title','Manage Portal')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thông tin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sửa thông tin</li>
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
              <div class="card-body">
              <form action="{{ url('admin/update_portal') }}" class="database_operation" >
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Họ Tên</label>
                                @csrf
                                <input type="hidden" name="id" value="{{ $portal_info->id }}">
                                <input type="text" required name="name" value="{{$portal_info->name}}" placeholder="Nhập tên..." class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                @csrf
                                <input type="text" required name="email"  value="{{$portal_info->email}}" placeholder="Nhập Email..." class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                @csrf
                                <input type="text" required name="mobile_no"  value="{{$portal_info->mobile_no}}" placeholder="Nhập số điện thoại..." class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                @csrf
                                <input type="password" required name="password"  value="{{$portal_info->password}}" placeholder="Enter Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>
                    </div>
              </form>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </section> 
  </div>
@endsection

