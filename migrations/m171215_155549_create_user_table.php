<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171215_155549_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id'      => $this->primaryKey(),
            'name'    => $this->string(50)->notNull(),
            'address' => $this->string(255)->notNull(),
            'lat'     => $this->decimal(10,8)->notNull(),
            'lng'     => $this->decimal(11,8)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
