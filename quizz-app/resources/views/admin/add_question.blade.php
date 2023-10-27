
@extends('layouts.app')
@section('title','Add Questiuoin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm câu hỏi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm câu hỏi</li>
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
                        <th>Câu hỏi</th>
                        <th>Đáp án</th>
                        <!-- <th>Status</th> -->
                        
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($questions as $key =>$question)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$question['question']}}</td>
                      <td>{{$question['answer']}}</td>
                      <!-- <td><input type="checkbox" name="status"></td> -->
                      <td>
                        <a href="{{url('admin/update_question/' .$question['id'])}}" class="btn btn-info">Sửa</a>
                        <a href="{{url('admin/delete_question/' .$question['id'])}}" class="btn btn-danger">Xóa</a>
        
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
            <h4 class="modal-title">Thêm câu hỏi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{ url('admin/add_new_question') }}" class="database_operation" >
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi :</label>
                    @csrf
                    <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
                    <input type="text" required name="question" placeholder="Nhập câu hỏi" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 1</label>
                    <input type="text" required name="opt_1" placeholder="Nhập câu hỏi thứ 1..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 2</label>
                    <input type="text" required name="opt_2" placeholder="Nhập câu hỏi thứ 2..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 3</label>
                    <input type="text" required name="opt_3" placeholder="Nhập câu hỏi thứ 3..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 4</label>
                    <input type="text" required name="opt_4" placeholder="Nhập câu hỏi thứ 4..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Đáp án :</label>
                    <input type="text" required name="answer" placeholder="Nhập đáp án..." class="form-control">
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