<?php

use yii\db\Schema;
use yii\db\Migration;

class m170517_235223_add_small_description_in_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('goods', 'small_description', Schema::TYPE_STRING.'(512) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('goods', 'small_description');
    }

}
