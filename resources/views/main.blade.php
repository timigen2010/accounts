<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ url('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.js') }}"></script>
    <title>Аккаунты</title>
</head>
<body>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 ">
            @if(empty(Session::get('user')))
                <div id="login_block">
            @else
                <div id="login_block" hidden>
            @endif
                <h4 class="title text-center">Выполните вход!</h4>
                <div id="bad_input" class="text-danger" hidden>Неправильный логин или пароль!</div>
                <label for="login">Логин</label>
                <input type="text" id="login" class="form-control" maxlength="50"/>
                <label for="login">Пароль</label>
                <input type="password" id="password" class="form-control"/><br />
                <button type="button" id="btn_enter" class="btn btn-primary pull-right">Войти</button>
            </div>
            @if(empty(Session::get('user')))
                <div id="content_block" hidden>
                    <h4 class="title text-center">Добро пожаловать!</h4>
                    <button id="btn_exit" class="btn btn-primary pull-right">Выйти</button>
                    <table id="tab" class="table table-bordered" >
                        <thead>
                        <tr>
                            <th>Логин</th>
                            <th>Пароль (хеш)</th>
                            <th>Тип</th>
                        </tr>
                        </thead>
                        <tbody id="content_table"></tbody>
                    </table>
                </div>
            @else
                <div id="content_block">
                    <h4 class="title text-center">Добро пожаловать!</h4>
                    <button id="btn_exit" class="btn btn-primary pull-right">Выйти</button>

                        <table id="tab" class="table table-bordered">
                            @if($users!=null)
                            <thead>
                                <tr>
                                    <th>Логин</th>
                                    <th>Пароль (хеш)</th>
                                    <th>Тип</th>
                                </tr>
                            </thead>

                            <tbody id="content_table">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->login}}</td>
                                    <td>{{$user->password}}</td>
                                    <td>{{$user["user_types"]->name}}</td>
                            @endforeach
                            </tbody>
                            @endif
                        </table>

                </div>
            @endif
        </div>
    </div>
</div>
<script src="{{ url('js/main/main.js') }}"></script>
</body>
</html>