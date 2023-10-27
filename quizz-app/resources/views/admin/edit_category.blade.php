
@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Môn học</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Môn học</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
        
            <div class="card">
              <div class="card-header">
                
              </div>
              <div class="card-body">
              <form action="{{ url('admin/edit_new_category') }}" class="database_operation" >
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Tên môn học</label>
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="text" required name="name" value="{{ $category->name }}" placeholder="Tên môn học" class="form-control">
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