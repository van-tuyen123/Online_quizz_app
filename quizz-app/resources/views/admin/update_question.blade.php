
@extends('layouts.app')
@section('title','Update Questiuoin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa câu hỏi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sửa câu hỏi</li>
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
              <form action="{{ url('admin/edit_question') }}" class="database_operation" >
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi :</label>
                    @csrf
                    <input type="hidden" name="id" value="{{ $questions[0]['id'] }}">
                    <input type="text" required name="question" value="{{ $questions[0]['question'] }}" placeholder="Nhập câu hỏi" class="form-control">
                  </div>
                </div>
                <?php 
                    $options= json_decode($questions[0]['options']);
                ?>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 1</label>
                    <input type="text" required name="opt_1" value="{{ $options->opt_1 }}" placeholder="Nhập câu hỏi thứ 1..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 2</label>
                    <input type="text" required name="opt_2" value="{{ $options->opt_2}}" placeholder="Nhập câu hỏi thứ 2..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 3</label>
                    <input type="text" required name="opt_3" value="{{ $options->opt_3 }}" placeholder="Nhập câu hỏi thứ 3..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Câu hỏi: 4</label>
                    <input type="text" required name="opt_4" value="{{ $options->opt_4 }}" placeholder="Nhập câu hỏi thứ 4..." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Đáp án :</label>
                    <input type="text" required name="answer" value="{{ $questions[0]['answer'] }}" placeholder="Nhập đáp án..." class="form-control">
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