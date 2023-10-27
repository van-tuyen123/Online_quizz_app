
@extends('layouts.app')
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
                        <th>Tên bài thi</th>
                        <th>Môn học</th>
                        <th>Ngày thi</th>
                       
                        
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($exams as $key =>$exam)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$exam['title']}}</td>
                      <td>{{$exam['cat_name']}}</td>
                      <td>{{$exam['exam_date']}}</td>
                     
                      <td>
                        <a href="{{ url('admin/edit_exam/' .$exam['id'])}}" class="btn btn-info">Sửa</a>
                        <a href="{{ url('admin/delete_exam/' .$exam['id'])}}" class="btn btn-danger">Xóa</a>
                        <a href="{{ url('admin/add_question/' .$exam['id'])}}" class="btn btn-success">Thêm câu hỏi</a>
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
            <h4 class="modal-title">Thêm </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{ url('admin/add_new_exam') }}" class="database_operation" >
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Bài thi</label>
                    @csrf
                    <input type="text" required name="title" placeholder="Tên câu hỏi" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Ngày thi</label>
                    <input type="date" required name="exam_date" placeholder="Enter Title" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Chọn môn thi</label>
                    <select name="exam_category" id="" class="form-control" required >
                        <option value="">Chọn môn thi</option>
                        @foreach($category as $cat)
                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                        @endforeach
                    </select>
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