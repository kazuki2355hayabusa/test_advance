<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <title>Document</title>
</head>
<style>
  h2{
    text-align:center;
  }
  .container{
    height: 100vh;
    width: 100vw;
    position: relative;
  }
  span {
    color: red;
}
</style>
<body>
  <div class="container">
  <h2>お問い合わせ</h2>
  <form action="/check" method="post">
    @csrf
    <table>
      <tr>
        <th>お名前</th>
        <td> <span>※<span><input type="text" name="firstName" value="{{old('firstName',$firstName)}}">
        <input type="text" name="lastName" value="{{old('lastName',$lastName)}}">
        </td>
      </tr>
      <tr> 
        <th></th><td>{{$errors->first('firstName')}} {{$errors->first('lastName')}}</td>
      </tr>
      <tr> 
        <th>性別</th>
        <td> <span>※</span>
            @if($sex_code === '1')
              <input type="radio" name="sex" value="1" checked>男性
              <input type="radio" name="sex" value="2">女性
              @else
              <input type="radio" name="sex" value="1">男性
              <input type="radio" name="sex" value="2" checked>女性
            @endif

        <td>
      </tr>    
      <tr>    
        <th>メールアドレス</th>
        <td><span>※</span><input type="email" name="email" value="{{old('email',$email)}}">
        </td>  
      </tr>
      <tr>
        <th></th><td>{{$errors->first('email')}}</td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td><span>※</span>  〒<input type="text" name="zipcode" pattern="\d{3}-\d{4}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{old('zipcode',$zipcode)}}""></td>
      </tr>
      <tr>
         <th></th><td>{{$errors->first('zipcode')}}</td>
      </tr>  
      <tr>
        <th>住所</th>
        <td><span>※</span><input type="text" name="address" value="{{old('address',$address)}}"></td>
      </tr>
      <tr>
        <th></th><td> {{$errors->first('address')}}</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td><input type="text" name="buildings" value="{{old('buildings',$buildings)}}"></td>
      </tr>
      <tr>
        <th>ご意見</th>
        <td><span>※</span><textarea name="opinion" maxlength="120" rows="10" cols="50">{{ old("opinion", $opinion) }}</textarea>
      </tr>
      <tr>
        <th></th><td> {{$errors->first('opinion')}}</td>
      </tr>
      <tr><th></th><td><input type="submit" value="確認"></td></tr>
        
    </table>
  </form>
</div>
</body>
</html>