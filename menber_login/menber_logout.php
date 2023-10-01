<?php
session_start();
$_SESSION = array();
if(isset($_Cookie[session_name()]) === true) {
    setcookie(session_name(), "", time()-42000, "/");
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理画面TOP</title>
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
ログアウトしました。
    
<br><br>
<a href="../shop/index.php">TOPへ</a>
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