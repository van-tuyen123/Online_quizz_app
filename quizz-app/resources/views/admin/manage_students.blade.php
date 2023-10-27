
@extends('layouts.app')
@section('title','Manage Students')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lí học sinh</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lí học sinh</li>
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
                        <th>Hạn nộp</th>
                        <th>Môn thi</th>
                        <th>Ngày tạo</th>
                        <th>Kết quả</th> 
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($students as $key =>$std)
                    <tr>
                      <td>{{$key++}}</td>
                      <td>{{$std['name']}}</td>
                      <td>{{$std['dob']}}</td>
                      <td>{{$std['ex_name']}}</td>
                      <td>{{$std['exam_date']}}</td>
                      <td>N/A</td>
                      <td>
                        <a href="{{ url('admin/edit_students/' .$std['id'])}}" class="btn btn-info">Sửa</a>
                        <a href="{{ url('admin/delete_students/' .$std['id'])}}" class="btn btn-danger">Xóa</a>
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
            <h4 class="modal-title">Thêm mới học sinh</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{ url('admin/add_new_students') }}" class="database_operation" >
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
                    <input type="email" required name="email" placeholder="Nhập Email..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Số điện thoại </label>
                    @csrf
                    <input type="number" required name="mobile_no" placeholder="Nhập số điện thoại" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Hạn nộp</label>
                    <input type="date" required name="dob" placeholder="Enter Title" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Lựa chọn bài thi</label>
                    <select name="exam" id="" class="form-control" required>
                        <option value="">Select</option>
                        @foreach($exams as $exam)
                        <option value="{{ $exam['id'] }}">{{ $exam['title'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" required name="password" placeholder="Nhập mật khẩu..." class="form-control">
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