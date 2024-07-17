<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "farmer".
 *
 * @property int $id
 * @property string $name
 * @property string $father_name
 * @property string $last_name
 * @property int|null $district_id
 * @property int|null $taluka_id
 * @property int|null $city_id
 * @property int|null $is_deleted
 * @property string|null $mobile_number
 * @property string|null $birth_date
 * @property string|null $joining_date
 * @property string|null $regi_date
 * @property int|null $sex_id
 * @property int|null $farm_type_id
 * @property int|null $cast_id
 * @property string|null $tharav_date
 * @property int|null $tharav_no
 * @property int|null $sav_ac_no
 * @property int|null $emp_cif_no
 * @property int|null $emp_cif1_no
 * @property int|null $tkcc_short
 * @property int|null $tkishan_su
 * @property int|null $tmadhyamudat_m
 * @property int|null $tgowndown_mm
 * @property int|null $tjlg_grp
 * @property int|null $other_cd1
 * @property string|null $pan_card
 * @property string|null $voter_id_no
 * @property int|null $tkkc_3L
 * @property int|null $pasu_loan
 * @property int|null $kisan_mitra
 * @property int|null $addhar_card_no
 */
class Farmer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'farmer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'father_name', 'last_name'], 'required'],
            [['district_id', 'taluka_id', 'city_id', 'is_deleted', 'sex_id', 'farm_type_id', 'cast_id', 'tharav_no', 'sav_ac_no', 'emp_cif_no', 'emp_cif1_no', 'tkcc_short', 'tkishan_su', 'tmadhyamudat_m', 'tgowndown_mm', 'tjlg_grp', 'other_cd1', 'tkkc_3L', 'pasu_loan', 'kisan_mitra', 'addhar_card_no'], 'integer'],
            [['name', 'father_name', 'last_name'], 'string', 'max' => 255],
            [['mobile_number'], 'string', 'max' => 12],
            [['birth_date', 'joining_date', 'regi_date', 'tharav_date'], 'string', 'max' => 50],
            [['pan_card', 'voter_id_no'], 'string', 'max' => 16],
            [['birth_date','joining_date','regi_date','tharav_date'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'father_name' => 'Father Name',
            'last_name' => 'Last Name',
            'district_id' => 'District',
            'taluka_id' => 'Taluka',
            'city_id' => 'City',
            'mobile_number' => 'Mobile Number',
            'birth_date' => 'Birth Date',
            'joining_date' => 'Joining Date',
            'regi_date' => 'Registration Date',
            'sex_id' => 'Sex',
            'farm_type_id' => 'Farm Type ',
            'cast_id' => 'Cast ',
            'tharav_date' => 'Tharav Date',
            'tharav_no' => 'Tharav No',
            'sav_ac_no' => 'Saving Ac No',
            'emp_cif_no' => 'Emp Cif No',
            'emp_cif1_no' => 'Emp Cif1 No',
            'tkcc_short' => 'Tkcc Short',
            'tkishan_su' => 'Tkishan Su',
            'tmadhyamudat_m' => 'Tmadhyamudat M',
            'tgowndown_mm' => 'Tgowndown Mm',
            'tjlg_grp' => 'Tjlg Grp',
            'other_cd1' => 'Other Cd1',
            'pan_card' => 'Pan Card',
            'voter_id_no' => 'Voter Id No',
            'tkkc_3L' => 'Tkkc 3l',
            'pasu_loan' => 'Pasu Loan',
            'kisan_mitra' => 'Kisan Mitra',
            'addhar_card_no' => 'Addhar Card No',
        ];
    }
    public function search()
    {
         $query = Farmer::find();
        $query->andFilterWhere(["LIKE", "name",  $this->name]);
        if (!empty($this->taluka_id)) {
            $query->andWhere(["taluka_id" => $this->taluka_id]);
        }
        if (!empty($this->district_id)) {
            $query->andWhere(["district_id" => $this->district_id]);
        }
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => [
                'id' => 'DESC'
            ]],   
            'pagination' => [
                'pageSize' => 40,
                
            ],
            
        ]);
    }
    public function getdistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }

    public function gettaluka()
    {
        return $this->hasOne(Talukas::className(), ['id' => 'taluka_id']);
    }

    public function getCity()
    {
        return $this->hasOne(Cities::className(),['id'=>'city_id']);
    }
}
