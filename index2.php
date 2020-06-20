<?php 

require_once 'Encode.php';

$name = enc($_POST['name']);
$email = enc($_POST['email']);
$zip = enc($_POST['zip']);
$sex = enc($_POST['sex']);
$age = enc($_POST['age']);
$os = enc(implode('、', $_POST['os']));
$memo = nl2br(enc($_POST['memo']));

$list = array(
  array(
    $name,
    $email,
    $zip,
    $sex,
    $age,
    $os,
    $memo,
  ));

// ファイルに書き込む
$name = "data";
$filepath = "data/{$name}.csv";
$file = fopen($filepath, "a");
foreach ($list as $fields) {
    fputcsv($file, $fields);
}
fclose($file);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>アンケート</title>
<style>
  body{
    text-align: center;
  }
div {
 /* float:left;	 */
 display: flex;
 justify-content: center;  
}
</style>
</head>
<body>
<h3>ご回答ありがとうございました。</h3>
<p>以下の内容で送信致しました。</p>
<dl>
  <div id="name">
    <dt>名前：</dt>
    <dd><?php print($name); ?></dd>
  </div>
  <div id="email">
    <dt>メールアドレス：</dt>
    <dd><?php print($email); ?></dd>
  </div>
  <div id="zip">
    <dt>郵便番号：</dt>
    <dd><?php print($zip); ?></dd>
  </div>
  <div id="sex">
    <dt>性別：</dt>
    <dd><?php print($sex); ?></dd>
  </div>
  <div id="age">
    <dt>年齢</dt>
    <dd><?php print($age); ?></dd>
  </div>
  <div id="os">
<dt>ご使用のOS：</dt>
<dd><?php if (isset($os) === true) {
    print($os);
} ?></dd>
  </div>
  <div id="memo">
    <dt>サイトへのご意見：</dt>
    <dd><?php print($memo); ?></dd>
  </div>
</dl>

<a href="read.php">一覧を表示</a>
</body>
</html>