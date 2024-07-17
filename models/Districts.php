<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $is_deleted
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'is_deleted' => 'Is Deleted',
        ];
    }
    public function search()
    {
        $query = Districts::find();
        $query->andFilterWhere(["LIKE", "name",  $this->name]);
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => [
                'id' => 'DESC'
            ]],            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }

    public static function getDistricts()
    {
        return ArrayHelper::map(Districts::find()->all(), 'id', 'name');
    }

    public static function getAll()
	{
			return Districts::find()->orderBy(["name" => "ASC"])->all();
	}

    

}
