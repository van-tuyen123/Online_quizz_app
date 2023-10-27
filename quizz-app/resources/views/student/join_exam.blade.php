
@extends('layouts.student')
@section('title','Join Exams')
@section('content')
<style type="text/css">
    .question_opt>li{
        list-style: none;
        height: 50px;
        line-height: 50px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bài thi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Bài thi</li>
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
            </div>

            <div class="card mt-4">
              <div class="card-body">
                <form action="{{url('student/submit')}}" method="post">
                  @csrf
                  <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                  <div class="row">
                    @foreach($all_questions as $key => $question)
                    <div class="col-sm-12 mx-4">
                      
                          <p>
                            <b>
                              {{$key+1}}. {{$question['question']}}
                              <?php 
                              $options = json_decode(json_encode(json_decode($question['options'])),true); 
                              ?>
                            </b>
                          </p>
                          <input type="hidden" name="question{{$key+1}}" value="{{$question['id']}}">
                          <ul class="question_opt">
                              <li><input type="radio" name="answer{{$key+1}}" class="mx-2" value="{{ $options['opt_1'] }}">{{ $options['opt_1'] }}</li>
                              <li><input type="radio" name="answer{{$key+1}}" class="mx-2" value="{{ $options['opt_2'] }}">{{ $options['opt_2'] }}</li>
                              <li><input type="radio" name="answer{{$key+1}}" class="mx-2" value="{{ $options['opt_3'] }}">{{ $options['opt_3'] }}</li>
                              <li><input type="radio" name="answer{{$key+1}}" class="mx-2" value="{{ $options['opt_4'] }}">{{ $options['opt_4'] }}</li>
                              <li style="display: none;">
                              <input type="radio" checked="checked" value="0" name="answer{{$key+1}} ">
                                {{ $options['opt_4'] }}
                              </li>
                          </ul>
                    </div>
                  @endforeach
                    <div class="col-sm-12 mt-4 text-center">
                      <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                      <button class="btn btn-success " type="submit">Nộp</button>
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