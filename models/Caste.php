<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "caste".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $is_deleted
 */
class Caste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
        $query = caste::find();
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

    public static function getAll()
	{
			return Caste::find()->orderBy(["name" => "ASC"])->all();
	}
}
