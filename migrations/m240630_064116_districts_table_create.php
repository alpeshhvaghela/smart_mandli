<?php

use yii\db\Migration;

/**
 * Class m240630_064116_districts_table_create
 */
class m240630_064116_districts_table_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('districts',[
            'id' =>$this->primaryKey(),
            'name' => $this->string(200),
            'is_deleted' => $this->integer(1)->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240630_064116_districts_table_create cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240630_064116_districts_table_create cannot be reverted.\n";

        return false;
    }
    */
}
