<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%farmertype}}`.
 */
class m240705_065638_create_farmertype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('farmertype', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'is_deleted' => $this->integer(1)->defaultValue(0)

        ]);

        $this->insert('farmertype',['name' => 'Big Farmer']);
        $this->insert('farmertype',['name' => 'Small Farmer']);
        $this->insert('farmertype',['name' => ' Farmer']);
        $this->insert('farmertype',['name' => 'Big Farmer']);
        $this->insert('farmertype',['name' => 'Big Farmer']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('farmertype');
    }
}
