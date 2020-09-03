<?php
require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Fushigibana.php');

// フシギソウ
class Fushigisou extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'フシギソウ';

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $child_class = 'Fushigidane';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        16
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'たいあたり'],
        [1, 'なきごえ'],
        [1, 'やどりぎのタネ'],
        [7, 'やどりぎのタネ'],
        [13, 'つるのムチ'],
        [22, 'どくのこな'],
        [30, 'はっぱカッター'],
        [38, 'せいちょう'],
        [46, 'ねむりごな'],
        [54, 'ソーラービーム'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 60,
        'こうげき' => 62,
        'ぼうぎょ' => 63,
        'とくこう' => 80,
        'とくぼう' => 80,
        'すばやさ' => 60,
    ];

    /**
    * 進化 → フシギソウ
    *
    * @return Classes\Pokemon\Fushigibana
    */
    public function evolve()
    {
        return new Fushigibana($this);
    }

}
