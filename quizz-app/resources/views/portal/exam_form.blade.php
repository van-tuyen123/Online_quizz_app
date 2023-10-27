
@extends('layouts.portal')
@section('title','Manage Exam')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lí bài thi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quán lí bài thi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center">{{$exam_title}}</h3>
                    </div>
                </div>
                <form action="{{ url('portal/exam_submit') }}" class="database_operation" >
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Họ Tên</label>
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="text" name="name" placeholder="Naem" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="mobile_no" placeholder="Naem" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="password" placeholder="Naem" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <button class="btn btn-success">Save</button>
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