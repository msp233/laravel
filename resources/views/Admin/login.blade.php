<form action="" method="post">
    @csrf
    {{--{{ @csrf_field() }}--}}
    用户名：<input name="username" type="text" /> <br/>
    密码：<input name="password" type="password" /> <br/>
    <input type="submit" value="提交">
</form>

<br/> -------------------------<br/>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->message as $key => $error)
                <li>{{$key}} -- {{$error[0]}}</li>
            @endforeach
        </ul>
    </div>
    @endif
<?php dd($errors) ?>