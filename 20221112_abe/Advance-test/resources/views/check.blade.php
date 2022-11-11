<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>内容確認</h2>
  <table>
    <tr>
      <th>お名前</th>
      <td>{{$name}}</td>
    </tr>
    <tr>
      <th>性別</th>
      <td>{{$sex}}</td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>{{$email}}</td>
    </tr>  
    <tr>
      <th>郵便番号</th>
      <td>{{$zipcode}}</td>
    </tr>
    <tr>
      <th>住所</th>
      <td>{{$address}}</td>
    </tr>
    <tr>
      <th>建物名</th>
      <td>{{$buildings}}</td>
    </tr>
    <tr>
      <th>ご意見</th>
      <td>{{$opinion}}</td>
    </tr>
  </table>
  <form action="/register" method="post">
    @csrf
    <input type="hidden" name="fullname" value="{{$name}}">
    <input type="hidden" name="gender" value="{{$sex_code}}">
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="postcode" value="{{$zipcode}}">
    <input type="hidden" name="address" value="{{$address}}">
    <input type="hidden" name="building_name" value="{{$buildings}}">
    <input type="hidden" name="opinion" value="{{$opinion}}">

    <input type="submit" value="送信">
    <a href="/back">修正する</a>  
  </form>
</body>
</html>