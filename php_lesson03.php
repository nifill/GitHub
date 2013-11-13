<!DOCYPE HTML>
<html>
<head>

</head>
<body>
テスト<br>

<?php

/*
$url ="http://test.cgi.e-map.ne.jp/ssapi/searcheki.cgi?key=37nQfzCDnASz8PnQgnBsnAJf9HmgAPBVetPeAiWuDmAIjcbyKinQ4zCKnRBzT6pRt8JJoROLFPpRYzTE&pos=1&cnt=100&enc=SJIS&tod=13&kana=&srchmode=&srchtarget=&frewd=&line=0000&pflg=2&datum=TOKYO&outf=XML&lang=";
$xml = simplexml_load_file($url);
$koumoku= $xml->result->item;

var_dump($koumoku);
*/
$i = 0;
while ($i < 10){
    echo $i;
    $i++;
}
?>

//表示部分
<?php foreach($koumoku as $hit) {?>
<br>
<?php echo ($hit->stationName);?><br>
<?php echo ($hit->zipCode);?><br>
<?php } ?>

</body>
</html>