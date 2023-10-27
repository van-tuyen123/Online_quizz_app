
@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa bài thi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ </a></li>
              <li class="breadcrumb-item active">Sửa bài thi</li>
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
               
              </div>
              <div class="card-body">
                <form action="{{ url('admin/edit_exam_sub') }}" class="database_operation" >
                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Nhập tiêu đề </label>
                        @csrf
                        <input type="hidden" name="id" value="{{$exam->id}}">
                        <input type="text" value="{{ $exam->title}}" required name="title" placeholder="Enter Title" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Ngày thi</label>
                        <input type="date" value="{{$exam->exam_date}}" required name="exam_date" placeholder="Enter Title" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">chọn môn thi</label>
                        <select name="exam_category" id="" class="form-control" required >
                            <option value="">Select</option>
                            @foreach($category as $cat)
                            <option
                             <?php 
                             if($exam->category == $cat['id']){
                                echo 'selected';
                             }
                             ?>
                             value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group">
                        <button class="btn btn-success">CẬp nhật</button>
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