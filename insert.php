<?php
//文字コードの指定、文字化けしないように
mb_internal_encoding("utf8");

//DBへ接続するためのコード。ID：root
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

//DBへ文字を出力するためのコード　insertが使用されている。　insert.php → DBへデータの移行
$pdo->exec("insert into 4each_keijiban(handlename,title,comments)
values('".$_POST['handlename']."','".$_POST['title']."','".$_POST['comments']."');");

//リダイレクト→webページからあるwebページに自動で移動すること　　insert.phpからindex.phpへデータの移行 データの送信
header("Location:http://localhost/4each_keijiban/index.php");
