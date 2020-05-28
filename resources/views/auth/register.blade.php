<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="{{ asset('css/mobile_createaccount.css') }}">
        <!--<link rel="srylesheet" media="(min-widtn: 900px)" href="pc_createaccount.css">-->
        <title>新規登録</title>
    </head>

    <body>
        <div class="parentElement">
            <div class="title">
                <h1>LOGO:おごってください</h1>
            </div>


            <div class="createaccount-container">

               <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        
                        <div class="questiontitle title_username">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザ名:') }}</label>
                        </div>

                        <div>
                            <input id="name" type="text" class="questioncolum usernamecolum @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="questiontitle title_mailadress">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス:') }}</label>
                        </div>

                        <div>
                            <input id="email" type="email" class="questioncolum emailcolum @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="questiontitle title_password">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード:') }}</label>
                        </div>

                        <div>
                            <input id="password" type="password" class="questioncolum passwordcolum @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="questiontitle title_checkpassword">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認）:') }}</label>
                        <div>

                        <div>
                            <input id="password-confirm" type="password" class="questioncolum checkpasswordcolum" name="password_confirmation" required autocomplete="new-password" oninput="checkpass(this)">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="submitbottom">
                                {{ __('登録') }}
                            </button>
                        </div>
                    </div>
                </form>     
            </div>

        </div>

        <script language="JavaScript" type="text/javascript">
            function checkpass(input){
                var pass = document.getElementById("password").value;
                var passConfirm = input.value;
                if(pass != passConfirm){
                    input.setCustomValidity('パスワードが一致しません');
                }else{
                    input.setCustomValidity('');
                }
                
            }
        </script>

</body>
</html>
