<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .signup_container{
            width: 50%;
            height: 400px;
            border: 1px solid blue;
            border-radius: 35px;
            padding: 21px;
            margin-left: 25%;
            margin-top: 150px;
            background-color: rgba(234, 236, 238, 0.8) ;
          
        }
      
    </style>
</head>
<body>
    <div class="container">
        <div class="signup_container">
           <div class="signup_title">
                <h1 class="text-center ">Đăng nhập</h1>
                <hr>
           </div>
           <form action="{{url('student/login_subject')}}"  class="database_operation" >
             <div class="signup_form">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            @csrf
                            <input type="email" name="email" placeholder="Enter email" class="form-control">
                        </div>
                       
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                        
                    </div>
                    <div class="">
                       <div class="form-group text-center">
                            <button class="btn btn-success text-center ">Đăng nhập</button>
                       </div>
                    </div>
                    <div class="col-sm-12">
                      <p class="text-center m-4">
                        Bạn chưa có tài khoản ?
                        <a href="{{url('portal/signup')}}">Đăng kí</a>
                      </p>
                    </div>
                </div>
                </div>
           </form>
        </div>
    </div>
    
</body>
</html>
<script type="text/javascript">
    $(document).on('submit','.database_operation',function(){
    var url = $(this).attr('action');
    var data = $(this).serialize();
   
    $.post(url,data,function(fb){
        var resp = $.parseJSON(fb);
        if(resp.status == 'true'){
            alert(resp.message);
            setTimeout(function(){
                window.location.href = resp.reload;
            },1000);
        }
    
     
    });
    return false;
    });
</script>