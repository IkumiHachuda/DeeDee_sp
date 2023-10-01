<?php

session_start();
session_regenerate_id(true);

if(isset($_SESSION["menber_login"]) === true) {
print "ようこそ";
    print $_SESSION["menber_name"];
    print "様　";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>商品選択画面</title>
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
<?php
try{

$code = $_GET["code"];
    
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT code, name, price, gazou, explanation FROM mst_product WHERE code=?";
$stmt = $dbh -> prepare($sql);
$data[] = $code;
$stmt -> execute($data);
    
$dbh = null;
    
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    
if(empty($rec["gazou"]) === true) {
    $disp_gazou = "";
} else {
    $disp_gazou = "<img src='../product/gazou/".$rec['gazou']."'>";
}
    
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
<a href="shop_cartin.php?code=<?php print $code;?>">カートに入れる</a>
<br><br>
<?php print $disp_gazou;?>
<br>
商品名:<?php print $rec['name'];?>
<br>
価格:<?php print $rec['price'];?>円
<br>
詳細:<?php print $rec['explanation'];?>

<br><br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

    <h3>カテゴリー</h3>
    <a href="shop_list_gift.php">ギフト</a><br>
    <a href="shop_list_bodycare.php">ボディケア</a><br>
    <a href="shop_list_diffuser.php">ディフューザー</a><br>
    <a href="shop_list_tea.php">ハーブティー</a><br>

</body>
</html>