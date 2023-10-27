
@extends('layouts.student')
@section('title','Exams')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bài thi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tang chủ</a></li>
              <li class="breadcrumb-item active">BÀi thi</li>
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
              <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên bài thi</th>
                        <th>Ngày thi</th>
                        <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                        
                        <td>1</td>      
                 
                        <td>{{$student_info->title}}</td>
                        <td>{{ $student_info->exam_date}}</td>
                        <td>
                          <?php 
                            if(strtotime($student_info->exam_date)<strtotime(date('Y-m-d')))
                            {
                              echo "Hoàn thành";
                            }
                            elseif(strtotime($student_info->exam_date)== strtotime(date('Y-m-d')))
                            {
                              echo "Đang chạy";
                            }else{
                              echo "Chưa đến hạn";
                            }
                          ?>
                        </td>
                        

                        <td>
                            <a href="{{ url('student/join_exam/' .$student_info->exam )}}" class="btn btn-success">Bắt đầu</a>
                        </td>

                    </tr>
                  </tbody>
                  
                </table>
              </div>
             
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection