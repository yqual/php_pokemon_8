<?php

require_once(__DIR__.'/../Traits/Pokemon/SetTrait.php');
require_once(__DIR__.'/../Traits/Pokemon/GetTrait.php');

// ポケモン
abstract class Pokemon
{
    use SetTrait;
    use GetTrait;

    /**
    * ニックネーム
    * @return string(min:1 max:5)
    */
    protected $nickname;

    /**
    * 現在のレベル
    * @var integer(min:2 max:100)
    */
    protected $level;

    /**
    * 覚えている技
    * @var array(min:1 max:4)
    */
    protected $move = [];

    /**
    * 経験値
    * @var integer
    */
    protected $exp;

    /**
    * 個体値
    * @var array(value min:0 max:31)
    */
    protected $iv = [
        'HP' => null,
        'こうげき' => null,
        'ぼうぎょ' => null,
        'とくこう' => null,
        'とくぼう' => null,
        'すばやさ' => null,
    ];

    /**
    * 努力値
    * @var array
    */
    protected $ev = [
        'HP' => 0,
        'こうげき' => 0,
        'ぼうぎょ' => 0,
        'とくこう' => 0,
        'とくぼう' => 0,
        'すばやさ' => 0,
    ];

    /**
    * インスタンス作成時に実行される処理
    *
    * @param object|null
    * @return void
    */
    public function __construct($before=null)
    {
        // 進化前のポケモンと一致しているかチェック
        if(is_a($before, $this->child_class ?? null)){
            // 進化した際の処理
            $this->takeOverAbility($before);
            echo '<p>'.$this->name.'に進化した</p>';
        }else{
            // 捕まえた際の処理
            $this->setLevel();
            $this->setDefaultExp();
            $this->setDefaultMove();
            $this->setIv();
            echo '<p>'.$this->name.'をゲットした</p>';
        }
    }

    /**
    * レベルアップ処理
    *
    * @var integer
    */
    protected function actionLevelUp()
    {
        // レベルアップ
        $this->level++;
        echo '<p>'.$this->getNickName().'のレベルは'.$this->level.'になった！</p>';

        // レベルアップして覚えられる技があれば習得する
        $level_move_keys = array_keys(array_column($this->level_move, 0), $this->level);
        foreach($level_move_keys as $key){
            $move_name = $this->level_move[$key][1];
            $this->setMove($move_name);
            echo '<p>'.$move_name.'を覚えた！</p>';
        }
    }

    /**
    * 進化時の能力引き継ぎ処理
    *
    * @param object $before 進化前
    * @var void
    */
    protected function takeOverAbility($before)
    {
        $this->nickname = $before->nickname;    # ニックネーム
        $this->level = $before->level;          # レベル
        $this->ev = $before->ev;                # 努力値
        $this->iv = $before->iv;                # 個体値
        $this->exp = $before->exp;              # 経験値
        $this->move = $before->move;            # 技
    }
}
