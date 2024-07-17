<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%farmer}}`.
 */
class m240703_122436_create_farmer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('farmer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'father_name' => $this->string(),
            'last_name' => $this->string(),
            'district_id' => $this->integer(),
            'taluka_id' => $this->integer(),
            'city_id' => $this->integer(),
            'mobile_number'=> $this->integer(25),
            'birth_date'=> $this->date(),
            'regi_date'=> $this->date(),
            'joining_date'=> $this->date(),
            'regi_date'=> $this->date(),
            'sex_id'=> $this->integer(3),
            'farm_type_id'=> $this->integer(3),
            'cast_id'=> $this->integer(3),
            'tharav_date'=> $this->date(),
            'tharav_no'=> $this->integer(25),
            'sav_ac_no'=> $this->integer(100),
            'emp_cif_no'=> $this->integer(100),
            'emp_cif1_no'=> $this->integer(100),
            'tkcc_short'=> $this->integer(100),
            'tkishan_su'=> $this->integer(100),
            'tmadhyamudat_m'=> $this->integer(100),
            'tgowndown_mm'=> $this->integer(100),
            'tjlg_grp'=> $this->integer(100),
            'other_cd1'=> $this->integer(),
            'pan_card'=> $this->string(100),
            'voter_id_no'=> $this->string(100),
            'tkkc_3L'=> $this->integer(100),
            'pasu_loan'=> $this->integer(100),
            'kisan_mitra'=> $this->integer(100),
            'addhar_card_no'=> $this->integer(100),
            'is_deleted' => $this->integer()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%farmer}}');
    }
}
