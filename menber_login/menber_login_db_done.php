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
    try{

require_once("../common/common.php");

$post = sanitize($_POST);

$name = $post["name"];
$address = $post["address"];
$tel = $post["tel"];
$email = $post["email"];
$pass = $post["pass"];
        
$pass = md5($pass);
        
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
$sql = "SELECT email FROM menber WHERE1";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
        
while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if(empty($rec) === true) {
        break;
    }
    $mail[] = $rec["email"];
}
        
if(in_array($email, $mail) === true) {
    print "すでに使われているmailアドレスです。<br><br>";
    print "<a href='../shop/index.php'>トップへ戻る</a>";
    $dbh = null;
} else {   
$sql = "INSERT INTO menber(name, email, address, tel, password) VALUES(?,?,?,?,?)";
$stmt = $dbh -> prepare($sql);
$data[] = $name;
$data[] = $email;
$data[] = $address;
$data[] = $tel;
$data[] = $pass;
$stmt -> execute($data);
        
$dbh = null;
        
 
print "登録完了しました。<br><br>";
print "<a href='../shop/index.php'>トップへ戻る</a>";
}
}
catch(Exception $e) {
   print "只今障害が発生しております。";
   print "a href='menber_login.php'>ログインページへ戻る</a>";
   exit();
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