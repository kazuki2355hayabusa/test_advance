<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/style.css" />
  
  <title>Document</title>
</head>
<style>
    svg.w-5.h-5 {/*paginateメソッドの矢印の大きさ調整のために追加*/width: 30px;
      height: 30px;
    }
  .box-read {
	  overflow: hidden;
	  text-overflow: ellipsis;
	  white-space: nowrap;
  }
  p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .table1{
    border:1px black solid; 
  }
  .test2{
    overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;  
  }
  </style>
<body>
  <h2>管理システム</h2>

<div>
  <form action="/search" method="post">
    @csrf
    <table class="table1">
      <tr>
        <th>お名前</th>
        <td><input type="text" name="name"></td>
        <th>性別</th>
        <td>
          <input type="radio" name="sex" value="0" checked>全て
          <input type="radio" name="sex" value="1">男性
          <input type="radio" name="sex" value="2">女性
        </td>      
      </tr>
      <tr>
        <th>登録日</th>
        <td>
          <input type="date" name="dateFrom" value="2020-01-01">  ～  <input type="date" name="dateTo" value="{{date('Y-m-d');}}">
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          <input type="email" name="email">
        </td> 
      </tr>
      <tr>
        <td>
          <input type="submit" value="検索">
        </td>
      </tr>
      <tr>  
        <td>
          <input type="reset" value="リセット">
        </td>    
      </tr>  
    </table>
  </form>
</div>
{{ $contacts->appends(request()->input())->links() }}
<table>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
    </tr>
    <hr>
@foreach($search_datas as $search_data)
  <form action="/delete" method="post">
    @csrf
    <tr>
      <input type="hidden" name="id" value="{{$search_data->id}}">
      <td>{{$search_data->id}}</td>
      <td>{{$search_data->fullname}}</td>
      @if($search_data->gender === 1)
        <td>男性</td>
      @else
        <td>女性</td>  
      @endif
      <td>{{$search_data->email}}</td>
      <td width="200"><div class="test2">{{$search_data->opinion}}</div></td>
      <td><input type="button" value="削除" onclick="submit();"></td>
    </tr>
  </form>  
@endforeach
</table>
</body>
</html>