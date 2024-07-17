<?php

use yii\db\Migration;

/**
 * Class m240716_130716_update_farmer_table
 */
class m240716_130716_update_farmer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('farmer','sav_ac_no',$this->bigInteger());
        $this->alterColumn('farmer','emp_cif_no',$this->bigInteger());
        $this->alterColumn('farmer','emp_cif1_no',$this->bigInteger());
        $this->alterColumn('farmer','tkcc_short',$this->bigInteger());
        $this->alterColumn('farmer','tkishan_su',$this->bigInteger());
        $this->alterColumn('farmer','tmadhyamudat_m',$this->bigInteger());
        $this->alterColumn('farmer','tgowndown_mm',$this->bigInteger());
        $this->alterColumn('farmer','tjlg_grp',$this->bigInteger());
        $this->alterColumn('farmer','other_cd1',$this->bigInteger());
        $this->alterColumn('farmer','tkkc_3L',$this->bigInteger());
        $this->alterColumn('farmer','pasu_loan',$this->bigInteger());
        $this->alterColumn('farmer','kisan_mitra',$this->bigInteger());
        $this->alterColumn('farmer','addhar_card_no',$this->bigInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240716_130716_update_farmer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240716_130716_update_farmer_table cannot be reverted.\n";

        return false;
    }
    */
}
