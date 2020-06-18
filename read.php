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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>

</head>
<body>

<div id="container">
  <h3 id="review">レビュー</h3>
  <ul>
    <?php foreach ($file as $row):?>
      <?php if (!is_null($row[0])):?>
        <?php list($name, $email, $zip, $sex, $age, $os, $memo) = $row; ?>
        <li><?= "{$memo} : {$age}代 {$sex} " ."\n"?></li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
</body>
</html>
