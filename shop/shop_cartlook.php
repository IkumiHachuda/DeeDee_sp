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
    print "ログインしてください。<br><br>";
    print "<a href='../menber_login/menber_login.html'>ログイン画面へ</a>";
    print "<br><br>";
} else {
    print "ようこそ";
    print $_SESSION["menber_name"];
    print "様　";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
}
if(isset($_SESSION["menber_login"]) === true) {    
if(empty($_SESSION["cart"]) === true) {
    print "カートに商品はありません。<br><br>";
    print "<a href='index.php'>商品一覧へ戻る</a>";
} else {
try{
$cart = $_SESSION["cart"];
$kazu = $_SESSION["kazu"];
$max = count($cart);
    
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
foreach($cart as $key => $val) {
    
$sql = "SELECT code, name, price, gazou FROM mst_product WHERE code=?";
$stmt = $dbh -> prepare($sql);
$data[0] = $val;
$stmt -> execute($data);
    
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    
//if(empty($rec["gazou"]) === true) {
//    $disp_gazou = "";
//} else {
//   $disp_gazou = "<img src='../product/gazou/".$rec['gazou']."'>";
//}
    
$name[] = $rec["name"];
$price[] = $rec["price"];
$gazou[] = $rec["gazou"];
}
$dbh = null;
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
    
<form action="shop_kazu.php" method="post">
カート一覧<br><br>
<?php for($i = 0; $i < $max; $i++) {;?>
<?php if(empty($gazou[$i]) === true) {;?>
<?php $disp_gazou = "";?>
<?php } else {;?>
<?php $disp_gazou = "<img src='../product/gazou/".$gazou[$i]."'>";?>
<?php };?>
<div class="box">
<div class="list">
<div class="img">
<?php print $disp_gazou;?></div>
<div class="npe">
商品名:<?php print $name[$i];?><br>
価格:<?php print $price[$i]."円　";?><br>
数量:<input type="text" name="kazu<?php print $i;?>" value="<?php print $kazu[$i];?>"><br>
合計価格:<?php print $price[$i] * $kazu[$i]."円";?><br><br>
削除:<input type="checkbox" name="delete<?php print $i;?>">
</div></div></div>
<br>

<?php };?>

<br><br>
<input type="hidden" name="max" value="<?php print $max;?>">
<input type="submit" value="数量変更/削除">
<br><br>
<input type="button" onclick="history.back()" value="戻る">
</form>
<br>
<a href="shop_form_check.php">ご購入手続きへ進む</a><br>
<?php };?>
<?php };?>
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