<?php

// ファイルパス
$name = "data";
$filepath = "data/{$name}.csv";

// 読み込み用にtest.csvを開きます
$file = new SplFileObject($filepath);
$file->setFlags(SplFileObject::READ_CSV);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<div id="container">
  <h3 id="review">レビュー</h3>

  <ul>
    <?php foreach ($file as $row):?>
      <?php if (!is_null($row[0])):?>
        <?php list($name, $email, $zip, $sex, $age,$os, $memo) = $row; ?>
        <li><?= "{$memo} : {$age}代 {$sex} " ."\n"?></li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
</body>
</html>
