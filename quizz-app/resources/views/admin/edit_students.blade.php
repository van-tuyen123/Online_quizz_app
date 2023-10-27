
@extends('layouts.app')
@section('title','Seuar thông tin')
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
              <div class="card-header">
               
              </div>
              <div class="card-body">
              <form action="{{ url('admin/update_students') }}" class="database_operation" >
                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Họ Tên</label>
                        @csrf
                        <input type="hidden" name="id" value="{{ $students->id }}">
                        <input type="text" required name="name" value="{{$students->name }}" placeholder="Họ tên" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for=""> Email</label>
                        @csrf
                        <input type="email" required name="email" value="{{$students->email}}" placeholder="Email" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        @csrf
                        <input type="number" required name="mobile_no" value="{{$students->mobile_no}}" placeholder="Số điện thoại" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Ngày thi</label>
                        <input type="date" required name="dob" value="{{$students->dob}}" placeholder="Enter Title" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Chọn</label>
                        <select name="exam"  class="form-control" required>
                        <option value="">Select</option>
                        @foreach($exams as $exam)
                        <option
                            <?php if($students->exam == $exam['id']) { echo "selected";} ?>  
                            value="{{ $exam['id'] }}">{{ $exam['title'] }}
                        </option>
                        @endforeach
                            
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" required name="password" value="{{$students->password}}" placeholder="Enter Password" class="form-control">
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