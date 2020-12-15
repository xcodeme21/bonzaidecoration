<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }} - {{ @$indexPage }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/frontend/images/icons/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet" type="text/css" />
        
    </head>

    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Sign in to continue.</h4>
                                </div> <!--end auth-logo-text-->  
                                
                                @include("backend.include.session")

                                {{ Form::open(['url'=>'/login-aplikasi', 'id'=>'form', 'class' =>'form-horizontal auth-form my-4', 'method' => 'POST']) }} 
                                {{ Form::token() }}
        
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i> 
                                            </span>                                                                                                              
                                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                                        </div>                                    
                                    </div><!--end form-group--> 
        
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>                                            
                                        <div class="input-group mb-3"> 
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i> 
                                            </span>                                                       
                                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                                        </div>                               
                                    </div><!--end form-group--> 
        
                                    <div class="form-group">
                                        <label for="userpassword">Captcha</label>                                            
                                        <div class="input-group mb-3"> 
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i> 
                                            </span>                                                       
                                            <input type="number" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha">
                                        </div>                               
                                    </div><!--end form-group--> 
        
                                    <div class="form-group" align="center">
                                        <div id="recaptcha">
                                            {!! captcha_img() !!}
                                        </div>                              
                                    </div><!--end form-group--> 
        
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div><!--end col--> 
                                        <div class="col-sm-6 text-right">
                                            <!-- <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                     -->
                                        </div><!--end col--> 
                                    </div><!--end form-group--> 
        
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                {{ Form::close() }}<!--end form-->
                            </div><!--end /div-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end auth-page-->
            </div><!--end col-->           
        </div><!--end row-->

        <!-- End Log In page -->
    

        <!-- jQuery  -->
        <script src="{{ asset('public/backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/waves.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/jquery.slimscroll.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('public/backend/js/app.js') }}"></script>
        <script src="{{ asset('public/backend/js/jquery.validate.min.js') }}"></script>
        
        <script>
            $('#refreshcaptcha').click(function() { 
                var token = '{!! csrf_token() !!}';
                var request = 1;
                $.post('{{ url("/reloadcaptcha") }}', {_token:token, request:request}, function(e) {
                        $('#recaptcha').fadeIn('slow').html(e);
                });
            });
        </script>

        <script>  
            $().ready(function() {   
                
                $("#form").validate({    
                    rules: {
                        email: { 
                            required: true, 
                            minlength: 5,
                            maxlength: 50,
                        }, 
                        password: { 
                            required: true, 
                        }, 
                        captcha: { 
                            required: true,
                            number: true, 
                            minlength: 4,
                            maxlength: 4, 
                        }, 
                        
                    },
                    errorElement: "span",
                    messages: {
                        email:  { 
                            required: "harus diisi...", 
                            minlength: "minimal 5 karakter...", 
                            maxlength: "maksimal 5 karakter...",       
                        }, 
                        password:  { 
                            required: "harus diisi...",      
                        }, 
                        captcha:  { 
                            required: "harus diisi...",    
                            number: "hanya angka...", 
                            minlength: "kode keamanann hanya 4 angka...", 
                            maxlength: "kode keamanann hanya 4 angka...",     
                        }, 
                    
                    },
                    submitHandler: function(form) { 
                    form.submit();
                    } 
                });
                
                
            });
            </script>

    </body>
</html>