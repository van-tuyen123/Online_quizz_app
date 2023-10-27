
@extends('layouts.portal')
@section('title','Manage Exam')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cập nhật</h1>
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
              <div class="card-body">
                <form action="{{ url('portal/student_exam')}}" method="get">
                    <div class="row">
                   <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        @csrf
                        <input type="text" name="mobile_no" id="" class="form-control" required>
                    </div>
                   </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Hạn nộp</label>
                        <input type="date" name="dob" id="" class="form-control" required>
                    </div>
                   </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Môn thi</label>
                        <select name="exam" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach($exams as $exam)
                            <option value="{{$exam['id']}}" >{{$exam['title']}}</option>
                            @endforeach
                        </select>
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