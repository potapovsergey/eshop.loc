<?php

use yii\db\Schema;
use yii\db\Migration;

class m170518_005516_add_characteristics_in_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('goods', 'characteristics', Schema::TYPE_STRING.'(4096) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('goods', 'characteristics');
    }

}
