<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string $document_code
 * @property string $document_date
 * @property string $resolution_date
 * @property string|null $resolution_number
 * @property string|null $issuer_name
 * @property string|null $executor_name
 * @property string|null $signing_organization
 * @property string|null $validity_period_start
 * @property string|null $validity_period_end
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property DocumentDetails[] $documentDetails
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_code', 'document_date', 'resolution_date', 'document_number'], 'required'],
            [['document_date', 'resolution_date', 'validity_period_start', 'validity_period_end', 'created_at', 'updated_at'], 'safe'],
            [['document_code', 'resolution_number'], 'string', 'max' => 50],
            [['issuer_name', 'executor_name', 'signing_organization', 'file_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'document_code' => Yii::t('app', 'Ҳужжат Коди'),
            'document_date' => Yii::t('app', 'Ҳужжат Санаси'),
            'document_number' => Yii::t('app', 'Ҳужжат Рақами'),
            'resolution_date' => Yii::t('app', 'Қарор Санаси'),
            'resolution_number' => Yii::t('app', 'Қарор Рақами'),
            'issuer_name' => Yii::t('app', 'Чиқарувчи Номи'),
            'executor_name' => Yii::t('app', 'Ижрочи Номи'),
            'signing_organization' => Yii::t('app', 'Имзолаган Ташкилот'),
            'validity_period_start' => Yii::t('app', 'Амал қилиш Муддати Бошланиши'),
            'validity_period_end' => Yii::t('app', 'Амал қилиш Муддати Тугаши'),
            'created_at' => Yii::t('app', 'Яратилган Вақти'),
            'updated_at' => Yii::t('app', 'Янгиланган Вақти'),
            'file_path' => Yii::t('app', 'Файл Манзили'),
        ];
    }

    /**
     * Gets query for [[DocumentDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentDetails()
    {
        return $this->hasMany(DocumentDetails::class, ['document_id' => 'id']);
    }
}
