<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the dropping of table `column_characteristics_in_goods`.
 */
class m170518_120307_drop_column_characteristics_in_goods_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('goods','characteristics');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('goods', 'characteristics', Schema::TYPE_STRING.'(4096) NOT NULL');
    }
}
