@extends('layouts.default')
@section('title', '登录')

@section('content')
  <div class="offset-md-2 col-md-8">
    <div class="card ">
      <div class="card-header">
        <h5>登录</h5>
      </div>
      <div class="card-body">
        @include('shared._errors')

        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="mb-3">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="mb-3">
            <label for="password">密码（<a href="{{ route('password.request') }}">忘记密码</a>）：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          {{--          在 Laravel 的默认配置中，如果用户登录后没有使用『记住我』功能，则登录状态默认只会被记住两个小时。如果使用了『记住我』功能，则登录状态会被延长到五年。--}}
          {{--          我们可以通过使用 Laravel 提供的『记住我』功能来保存一个记忆令牌，用于长时间记录用户登录的状态。--}}
          {{--          Laravel 默认为用户生成的迁移文件中已包含 remember_token 字段，该字段将用于保存『记住我』令牌。--}}
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">记住我</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">登录</button>
        </form>

        <hr>

        <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
      </div>
    </div>
  </div>
@stop
