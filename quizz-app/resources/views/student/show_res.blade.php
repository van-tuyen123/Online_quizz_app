
@extends('layouts.student')
@section('title','Res')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kết quả</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Kết quả</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-sm-8">
            <div class="card mt-4">
                <div class="card-body">
                <h2><b style="color:blue;">Thông tin bài thi</b></h2>
                    <table class="table">
                        <tr>
                            <td>Họ Tên</td>
                            <td>{{ $student_info->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$student_info->email}}</td>
                        </tr>
                        <tr>
                            <td>Môn thi</td>
                            <td>{{$student_info->title}}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{$student_info->exam_date}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-body">
                    <h2><b style="color: blue;">Tên bài thi</b></h2>
                    <table class="table">
                        <tr>
                            <td>Câu trả lười đúng </td>
                            <td>{{$res_info->yes_answer}}</td>
                        </tr>
                        <tr>
                            <td>Câu trả lời sai</td>
                            <td>{{$res_info->no_answer}}</td>
                        </tr>
                        <tr>
                            <td>Tổng số câu </td>
                            <td>{{$res_info->yes_answer + $res_info->no_answer}}</td>
                        </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection