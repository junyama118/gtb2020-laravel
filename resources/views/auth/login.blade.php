<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="(max-width: 900px)" href=" {{asset('css/mobile_login.css')}} ">
    </head>

    <body>
        <div class="header" align="center">  
            <h1>ログイン画面</h1>
        </div>
        
        <div align="center">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
    


                        <div class="col-md-6">
                            <input id="mail-form" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        

                    </div>
    
                    <div class="form-group row">

                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード ') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        </div>
                    
                    </div>

                    <div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </table>
        </div>
    </body>
</html>
