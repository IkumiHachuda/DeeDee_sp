<?php

session_start();
session_regenerate_id(true);


?>

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
            <h2><a href="index.php">DeeDeeShopping</a></h1>
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
    if(isset($_SESSION["menber_login"]) === false) {
    print "ログインしてく下さい。<br><br>";
    print "<a href='../menber_login/menber_login.html'>ログイン画面へ<br><br></a>";
    print "<a href='index.php'>TOP画面へ</a>";
}
    if(isset($_SESSION["menber_login"]) === true) {
    print "ようこそ";
    print $_SESSION["menber_name"];
    print "様　";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
    
$code = $_GET["code"];

if(isset($_SESSION["cart"]) === true) {
    $cart = $_SESSION["cart"];
    $kazu = $_SESSION["kazu"];
        if(in_array($code, $cart) === true) {
        print "すでにカートにあります。<br><br>";
        print "<a href='index.php'>ショップ一覧へ戻る</a>";
        } 
        }
if(empty($_SESSION["cart"]) === true or in_array($code, $cart) === false) {
$cart[] = $code;
$kazu[] = 1;
$_SESSION["cart"] = $cart;
$_SESSION["kazu"] = $kazu;

print "カートに追加しました。<br><br>";
print "<a href='index.php'>ショップ一覧へ戻る</a>";
}
}
?>
<br><br>
    
<nav id="menu" class="close">
    <h3>カテゴリー</h3>
    <ul>
        <li><a href="shop_list_gift.php">ギフト</a></li>
        <li><a href="shop_list_bodycare.php">ボディケア</a></li>
        <li><a href="shop_list_diffuser.php">ディフューザー</a></li>
        <li><a href="shop_list_tea.php">ハーブティー</a></li>
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
        <a href="shop_list_gift.php">ギフト</a><br>
        <a href="shop_list_bodycare.php">ボディケア</a><br>
        <a href="shop_list_diffuser.php">ディフューザー</a><br>
        <a href="shop_list_tea.php">ハーブティー</a><br>    
    </div>
    <div class="box">
        <h3>Thai stretch Spa DeeDee</h3>    
        <div class="img"><img src="../product/gazou/dee.jpg"></div>
        <a>千歳烏山駅から徒歩3分。気軽に通えるサロン<br>
        電話：0123456789<br>
        住所：東京都世田谷区1-2-3 2階<br>
        本格的なタイ古式マッサージと癒しのアロママッサージをどうぞご堪能下さい<br>
        </a>
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