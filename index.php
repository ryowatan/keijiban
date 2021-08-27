<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4eachblog掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


    <header>
        <img src="4eachblog_logo.jpg" alt="logo">
        <div class="menu">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>

    </header>

    <div class="main">


        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1>
            <!--form actionでデータを飛ばす先を指定する-->
            <form method="POST" action="insert.php">
                <h2>入力フォーム</h2>
                <div class="form">
                    <p>ハンドルネーム</p>
                    <input type="text" size="35" name="handlename" placeholder="名前を入力">
                </div>
                <div class="form">
                    <p>タイトル</p>
                    <input type="text" size="35" name="title" placeholder="タイトルを入力">
                </div>
                <div class="form">
                    <p>コメント</p>
                    <textarea name="comments" cols="65" rows="7"></textarea>
                </div>
                <div class="form">
                    <input type="submit" value="投稿する">
                </div>


            </form>

        </div>

        <div class="right">
            <h2>人気の記事</h2>
            <ul>
                <li>phpオススメ本</li>
                <li>php MyAdminの使い方</li>
                <li>いま人気のエディタTop5</li>
                <li>HTMLの基礎</li>
            </ul>
            <h2>オススメリンク</h2>
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Braketsのダウンロード</li>
            </ul>
            <h2>カテゴリ</h2>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
    </div>



    <?php

    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "");
    //DBからテーブルに格納したデータをもらうコード　　データの受信（DBから）
    $stmt = $pdo->query("select * from 4each_keijiban");


    //上記で作成したhtmlの形式とphpで埋め込む形式が異なっていた(</div>の位置が違う)からエラーが発生した
    //繰り返し文にすることで、formに入力したものは、全部表示することができる
    // pointはhtmlで作ったレイアウトと同じ順番の表記にすること。それにより、cssの適用もうまくいく
    while ($row = $stmt->fetch()) {
        echo "<div class='contribution'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<div class='contents'>";
        echo $row['comments'];
        echo "<div class='handlename'>posted by" . $row['handlename'] . "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

    <footer>
        copyright ©internous | 4each blog the which provides A to Z about programming
    </footer>
</body>

</html>