<?php

use yii\db\Migration;

class m180118_072512_create_table_currency extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{currency}}', [
            'CurrencyID' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'CurrencyCode' => $this->string(10)->notNull(),
            'CurrencyTitle' => $this->string(100)->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{currency}}');
    }
}
