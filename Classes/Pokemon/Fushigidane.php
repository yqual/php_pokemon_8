<?php
require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Fushigisou.php');

// フシギダネ
class Fushigidane extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'フシギダネ';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        5
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'たいあたり'],
        [1, 'なきごえ'],
        [7, 'やどりぎのタネ'],
        [13, 'つるのムチ'],
        [20, 'どくのこな'],
        [27, 'はっぱカッター'],
        [34, 'せいちょう'],
        [41, 'ねむりごな'],
        [48, 'ソーラービーム'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 45,
        'こうげき' => 49,
        'ぼうぎょ' => 49,
        'とくこう' => 65,
        'とくぼう' => 65,
        'すばやさ' => 45,
    ];

    /**
    * 進化 → フシギソウ
    *
    * @return Classes\Pokemon\Fushigisou
    */
    public function evolve()
    {
        return new Fushigisou($this);
    }

}
