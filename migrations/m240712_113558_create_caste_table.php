<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%caste}}`.
 */
class m240712_113558_create_caste_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('caste', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'is_deleted' => $this->integer(1)->defaultValue(0)
        ]);

        $this->insert('caste',['name' => 'Scheduled Tribes']);
        $this->insert('caste',['name' => 'Scheduled Caste']);
        $this->insert('caste',['name' => 'Other']);
        $this->insert('caste',['name' => 'Minority']);
        $this->insert('caste',['name' => 'OBC']);
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('caste');
    }
}
