<?php

use yii\db\Schema;
use yii\db\Migration;

class m170518_124554_add_goods_id_in_values_characteristics_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('values_characteristics', 'goods_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('val_characteristics_goodss', 'values_characteristics', 'goods_id', 'goods', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('val_characteristics_goodss', 'values_characteristics');
        $this->dropColumn('values_characteristics', 'goods_id');
    }
}
