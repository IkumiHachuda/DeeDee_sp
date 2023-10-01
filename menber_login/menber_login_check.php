<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>スタッフ修正画面</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    <header>
        <div class="container">
            <h2><a href="../shop/index.php">DeeDeeShopping</a></h1>
            <nav>
                <ul>
                    <li><a href="../staff_login/staff_login.html">管理者用ログイン</a></li>
                    <li><a href="../shop/index.php">商品一覧</a></li>
                    <li><a href="../shop/shop_cartlook.php">カートを見る</a></li>
                </ul>
            </nav>
        </div>
    </header>
<warapper>
<main>
    
<?php

require_once("../common/common.php");

$post = sanitize($_POST);

$email = $post["email"];
$pass = $post["pass"];
$pass2 = $post["pass2"];
$okflag = true;

if(empty($email) === true) {
    print "emailを入力してください。<br>";
    $okflag = false;
}
if(preg_match("/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/", $email) === 0) {
    print "正しいemailを入力してください。<br>";
    $okflag = false;
}
if(empty($pass) === true) {
    print "パスワードを入力してください。<br>";
    $okflag = false;
}
if($pass != $pass2) {
    print "パスワードが異なります<br>";
    $okflag = false;
}
if($okflag === false) {
    print "<form><br>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
} else {
    print "下記mailアドレスでログインしますか？<br><br>";
    print $email."<br><br>";
    print "<form action='menber_login_done.php' method='post'>";
    print "<input type='hidden' name='email' value='".$email."'>";
    print "<input type='hidden' name='pass' value='".$pass."'>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
    print "<input type='submit' value='ログイン'>";
}
?>
    <br><br>
    
<nav id="menu" class="close">
    <h3>カテゴリー</h3>
    <ul>
        <li><a href="../shop/shop_list_gift.php">ギフト</a></li>
        <li><a href="../shop/shop_list_bodycare.php">ボディケア</a></li>
        <li><a href="../shop/shop_list_diffuser.php">ディフューザー</a></li>
        <li><a href="../shop/shop_list_tea.php">ハーブティー</a></li>
    </ul>
</nav>
    
    <div id="back" class="white"></div>
    <div id="scrolltop" class="st">⇧</div>
    <div id="scrollmenu" class="sm">MENU</div>
<br><br>
</main>
<aside>
    <div class="box">
        <h3>カテゴリー</h3>
        <a href="../shop/shop_list_gift.php">ギフト</a><br>
        <a href="../shop/shop_list_bodycare.php">ボディケア</a><br>
        <a href="../shop/shop_list_diffuser.php">ディフューザー</a><br>
        <a href="../shop/shop_list_tea.php">ハーブティー</a><br>
    </div>
    <div class="box">
        <h3>Thai stretch Spa DeeDee</h3>    
            <div class="img"><img src="../img/hellnear.jpg"></div>
        <p>本格的なタイ古式マッサージと癒しのアロママッサージをどうぞご堪能下さい</p>
    </div>
</aside>
</warapper>
<footer>
<h3>DeeDeeShopping</h3>    
</footer>
<script src="../main.js"></script>
<script src="../anime.min.js"></script>
</body>
</html>