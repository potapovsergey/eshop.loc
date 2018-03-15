<?php

use yii\db\Schema;
use yii\db\Migration;

class m170510_005335_add_image_in_profile_table extends Migration
{
    public function up()
    {
		$this->addColumn('profile', 'image', Schema::TYPE_STRING);
    }

    public function down()
    {
		$this->dropColumn('profile', 'image');
    }
}
