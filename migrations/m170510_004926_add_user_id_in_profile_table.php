<?php

use yii\db\Schema;
use yii\db\Migration;

class m170510_004926_add_user_id_in_profile_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('profile', 'user_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('profile_user', 'profile', 'user_id', 'user', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('profile_user', 'profile');
        $this->dropColumn('profile', 'user_id');
    }

}
