<?php

use yii\db\Schema;
use yii\db\Migration;

class m170518_123001_add_characteristics_id_in_values_characteristics_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('values_characteristics', 'characteristics_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('val_characteristics', 'values_characteristics', 'characteristics_id', 'characteristics', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('val_characteristics', 'values_characteristics');
        $this->dropColumn('values_characteristics', 'characteristics_id');
    }
}
