<?php
require_once(__DIR__.'/Classes/Pokemon/Fushigidane.php');

// HTML出力用関数
function echoKeyToVal($array)
{
    foreach($array as $key => $val){
        echo '<p>'.$key.'：'.$val.'</p>';
    }
}

// フシギダネをゲット
$pokemon = new Fushigidane;
echoKeyToVal($pokemon->getDetails());
echo '<hr>';
echoKeyToVal($pokemon->getStats());
echo '<hr>';

// フシギソウに進化
$pokemon = $pokemon->evolve();
echoKeyToVal($pokemon->getDetails());
echo '<hr>';
echoKeyToVal($pokemon->getStats());
echo '<hr>';

// フシギバナに進化
$pokemon = $pokemon->evolve();
echoKeyToVal($pokemon->getDetails());
echo '<hr>';
echoKeyToVal($pokemon->getStats());
echo '<hr>';
?>
