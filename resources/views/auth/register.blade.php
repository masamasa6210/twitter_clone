@extends('layouts.auth')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <section class="card mb-4">
                    <div class="card-header" style="background-color: white">
                        <h1>登録</h1>
                    </div>

                    <div class="card-block">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group row {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-4 col-form-label text-right">ユーザー名</label>
                                <div class="col-6">
                                    <input name="username" id="username" type="text" class="form-control"
                                           value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-4 col-form-label text-right">メールアドレス</label>
                                <div class="col-6">
                                    <input name="email" id="email" type="email" class="form-control"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-4 col-form-label text-right">パスワード</label>
                                <div class="col-6">
                                    <input name="password" id="password" type="password" class="form-control" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-4 col-form-label text-right">パスワード(確認)</label>
                                <div class="col-6">
                                    <input name="password_confirmation" id="password-confirm" type="password"
                                           class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        登録
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
