<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $short_text
 * @property string $text
 * @property string $author
 * @property string $public_dt
 * @property string $added_dt
 * @property integer $view_count
 * @property integer $is_verified
 */
class Article extends \yii\db\ActiveRecord
{
    const IS_VERIFIED = 1;
    const IS_NOT_VERIFIED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'author'], 'required'],
            [['text'], 'string'],
            [['public_dt', 'added_dt'], 'safe'],
            [['view_count', 'is_verified'], 'integer'],
            [['title', 'description', 'short_text', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'short_text' => 'Short Text',
            'text' => 'Text',
            'author' => 'Author',
            'public_dt' => 'Public Dt',
            'added_dt' => 'Added Dt',
            'view_count' => 'View Count',
            'is_verified' => 'Is Verified',
        ];
    }
}
