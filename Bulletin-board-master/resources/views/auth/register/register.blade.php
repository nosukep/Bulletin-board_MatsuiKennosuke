<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AtlasBulletinBoard</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Oswald:wght@200&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <form action="{{ route('registerPost') }}" method="POST">
    <div class="w-100 vh-auto d-flex" style="align-items:center; justify-content:center;">
      <div class="w-25 vh-75 border p-3">
        <h1 style="align-items:center; font-size:16px;">ユーザー登録</h1>
        <div class="register_form">
          <div class="d-flex mt-3" style="justify-content:space-between">
            <div class="">
              <label class="d-block m-0" style="font-size:13px">ユーザー名</label>
              <div class="border-bottom border-primary">
                <input type="text" class="w-100 border-0 over_name" name="over_name">
              </div>
            </div>
          </div>
          @if($errors->has('over_name') || $errors->has('under_name'))
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->get('over_name') as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @foreach ($errors->get('under_name') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
          @endif
          <div class="mt-3">
            <label class="m-0 d-block" style="font-size:13px">メールアドレス</label>
            <div class="border-bottom border-primary">
              <input type="mail" class="w-100 border-0 mail_address" name="mail_address">
            </div>
          </div>
          @if($errors->has('mail_address'))
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->get('mail_address') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
          @endif
        </div>
        <div class="mt-3">
          <label class="d-block m-0" style="font-size:13px">パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100 password" name="password">
          </div>
        </div>
        <div class="mt-3">
          <label class="d-block m-0" style="font-size:13px">確認用パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100 password_confirmation" name="password_confirmation">
          </div>
        </div>
          @if($errors->has('password'))
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->get('password') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
          @endif
        <div class="mt-5 text-right">
          <input type="submit" class="btn btn-primary register_btn" disabled value="新規登録" onclick="return confirm('登録してよろしいですか？')">
        </div>
        <div class="text-center">
          <a href="{{ route('loginView') }}">ログイン</a>
        </div>
      </div>
      {{ csrf_field() }}
    </div>
  </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/register.js') }}" rel="stylesheet"></script>
</body>
</html>
