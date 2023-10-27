@extends('layouts.portal')
@section('title','Portal Dashboard')
@section('content')
<div class="content-wrapper">
 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          
            @foreach($portal_exams as $key => $exam)
            <?php   
            $val=$key+1;
            if(strtotime(date('Y-m-d'))>strtotime(($exam['exam_date']))){
              $cls="bg-danger";
            }
            else
            {
               if($val%2==0)
                $cls="bg-info";
              else  
                $cls="bg-success";
            }
           
            ?>
            <div class="col-lg-6 col-6">
            <div class="small-box <?php echo $cls ?>">
              <div class="inner">
                <h3><?php echo $exam['title'] ?></h3>

                <p><?php echo $exam['cat_name'] ?></p>
              </div>
              @if(strtotime(date('Y-m-d')) < strtotime($exam['exam_date']))
              <a href="{{ url('portal/exam_form/' .$exam['id']) }}" class="small-box-footer">Thông tin bài thi <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
            </div>
            @endforeach
              
          </div>
        </div>
      </div>
    </section> 
  </div>

@endsection