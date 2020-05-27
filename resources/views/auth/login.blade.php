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
            <table border="0">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <tr>

                        <div class="form-group row">
                            <td>
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                            </td>

                            <td>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group row">
                            <td>
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード ') }}</label>
                            </td>

                            <td>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </div>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </td> 
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>
