<?php

use yii\db\Migration;

/**
 * Class m240701_063607_insert_district_data
 */
class m240701_063607_insert_district_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('districts',['name'=> 'Ahmedabad']);
        $this->insert('districts',['name'=> 'Amreli']);
        $this->insert('districts',['name'=> 'Anand']);
        $this->insert('districts',['name'=> 'Arvalli']);
        $this->insert('districts',['name'=> 'Banaskantha']);
        $this->insert('districts',['name'=> 'Bharuch']);
        $this->insert('districts',['name'=> 'Bhavnagar']);
        $this->insert('districts',['name'=> 'Botad']);
        $this->insert('districts',['name'=> 'Chhotaudepur']);
        $this->insert('districts',['name'=> 'Dahod']);
        $this->insert('districts',['name'=> 'Dangs-Ahwa']);
        $this->insert('districts',['name'=> 'Devbhumi Dwarka-Khambhaliya']);
        $this->insert('districts',['name'=> 'Gandhinagar']);
        $this->insert('districts',['name'=> 'Gir-Somnath-Veraval']);
        $this->insert('districts',['name'=> 'Jamnagar']);
        $this->insert('districts',['name'=> 'Junagadh']);
        $this->insert('districts',['name'=> 'Kachchh']);
        $this->insert('districts',['name'=> 'Kheda']);
        $this->insert('districts',['name'=> 'Mahisagar-Lunavada']);
        $this->insert('districts',['name'=> 'Mehsana']);
        $this->insert('districts',['name'=> 'Morbi']);
        $this->insert('districts',['name'=> 'Narmada-Rajpipla']);
        $this->insert('districts',['name'=> 'Navsari']);
        $this->insert('districts',['name'=> 'Panchmahal']);
        $this->insert('districts',['name'=> 'Patan']);
        $this->insert('districts',['name'=> 'Porabandar']);
        $this->insert('districts',['name'=> 'Rajkot']);
        $this->insert('districts',['name'=> 'Sabarkantha']);
        $this->insert('districts',['name'=> 'Surat']);
        $this->insert('districts',['name'=> 'Surendranagar']);
        $this->insert('districts',['name'=> 'Tapi-Vyara']);
        $this->insert('districts',['name'=> 'Vadodara']);
        $this->insert('districts',['name'=> 'Valsad']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240701_063607_insert_district_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240701_063607_insert_district_data cannot be reverted.\n";

        return false;
    }
    */
}
