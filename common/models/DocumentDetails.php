<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_details".
 *
 * @property int $id
 * @property int $document_id
 * @property string|null $section_title
 * @property string $main_content
 * @property string|null $resolution_content
 * @property string|null $mayor_of_the_city
 * @property string|null $archive_head
 *
 * @property Documents $document
 */
class DocumentDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_id', 'main_content'], 'required'],
            [['document_id'], 'default', 'value' => null],
            [['document_id'], 'integer'],
            [['main_content', 'resolution_content', 'redline'], 'string'],
            [['section_title', 'mayor_of_the_city', 'archive_head'], 'string', 'max' => 255],
            [['document_id'], 'exist', 'skipOnError' => true, 'targetClass' => Documents::class, 'targetAttribute' => ['document_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'document_id' => Yii::t('app', 'Ҳужжат ID'),
            'section_title' => Yii::t('app', 'Бўлим Сарлавҳаси'),
            'main_content' => Yii::t('app', 'Асосий Мазмун'),
            'resolution_content' => Yii::t('app', 'Қарор Мазмуни'),
            'mayor_of_the_city' => Yii::t('app', 'Шаҳар Ҳокими'),
            'archive_head' => Yii::t('app', 'Архив Мудири'),
            'redline' => Yii::t('app', 'Ҳужжат юқориcида ёзилувчи огоҳлантирувчи сўз(Қизил)'),
        ];
    }

    /**
     * Gets query for [[Document]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Documents::class, ['id' => 'document_id']);
    }
}
