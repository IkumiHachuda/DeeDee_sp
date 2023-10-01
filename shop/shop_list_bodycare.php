<?php
session_start();
session_regenerate_id(true);
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
try{
if(isset($_SESSION["menber_login"]) === true) {
print "ようこそ";
    print $_SESSION["menber_name"];
    print "様　";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
}
    
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT code,name,price,gazou,explanation FROM mst_product WHERE category=?";
$stmt = $dbh -> prepare($sql);
$data[] = "ボディケア";
$stmt -> execute($data);
    
$dbh = null;
    
print "販売商品一覧";
print "　<a href='shop_cartlook.php'>カートを見る</a>";
print "<br><br>";
    
while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($rec === false) {
        break;
    }
    $code = $rec["code"];
    print "<a href='shop_product.php?code=".$code."'>";
    if(empty($rec["gazou"]) === true) {
        $gazou = "";
    } else {
        $gazou = "<img src='../product/gazou/".$rec['gazou']."'>";
    }
    print "<div class='box'>";
    print "<div class='list'>";
    print "<div class='img'>";
    print $gazou;
    print "</div>";
    print "<div class='npe'>";
    print "商品名:".$rec["name"];
    print "<br>";
    print "価格:".$rec["price"]."円";
    print "<br>";
    print "詳細:".$rec["explanation"];
    print "</div>";
    print "</div>";
    print "</div>";
    print "</a>";
    print "<br>";
}
print "<br>";

}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
<a href="index.php">トップページへ戻る</a>
<br><br><br>
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