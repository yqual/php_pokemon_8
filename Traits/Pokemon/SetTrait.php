<?php
trait SetTrait
{

    /**
    * ニックネームを付ける
    * @return string
    */
    public function setNickname($nickname)
    {
        if(empty($nickname) || mb_strlen($nickname, 'UTF-8') > 5){
            echo '<p>ニックネームは１〜５文字で入力してください</p>';
            return;
        }
        $this->nickname = $nickname;
    }

    /**
    * レベルをセットする
    * @return void
    */
    protected function setLevel()
    {
        // 初期レベルからランダムで値を取得
        $key = array_rand($this->default_level);
        $this->level = $this->default_level[$key];
    }

    /**
    * 初期技をセットする
    * @return void
    */
    protected function setDefaultMove()
    {
        foreach($this->level_move as list($level, $move)){
            if($level <= $this->level){
                // 現在レベル以下の技であれば習得
                $this->setMove($move);
            }else{
                // 現在レベルを超えていれば処理終了
                break;
            }
        }
    }

    /**
    * 技を覚える
    * @return string
    */
    protected function setMove($move)
    {
        $this->move[] = $move;
        if(count($this->move) > 4){
            unset($this->move[0]);
            // 技の添字を採番する
            $this->move = array_values($this->move);
        }
    }

    /**
    * 初期経験値をセットする
    * @return void
    */
    protected function setDefaultExp()
    {
        $this->exp = $this->level ** 3;
    }

    /**
    * 経験値をセット（取得）する
    * @param integer $exp
    * @return void
    */
    public function setExp($exp)
    {
        $this->exp += $exp;
        echo '<p>'.$this->getNickname().'は経験値を'.$exp.'ポイント手に入れた！</p>';
        if($this->level >= 100){
            // レベルアップ処理は不要
            $this->exp += $exp;
            return;
        }

        // 次のレベルに必要な経験値を取得
        if($this->getReqLevelUpExp() <= $exp){
            /**
            * 次のレベルに必要な経験値を超えている場合
            */
            $this->actionLevelUp();
            while($this->getReqLevelUpExp() < 0){
                $this->actionLevelUp();
            }
        }
    }

    /**
    * 個体値をセットする
    * @return void
    */
    protected function setIv()
    {
        /**
        * 個体値のランダム生成（コールバック用）
        * @return integer
        */
        function randIv(){
            // 0〜31の間でランダムの数値を割り振る
            return mt_rand(0, 31);
        }
        $this->iv = array_map('randIv', $this->iv);
    }

}
