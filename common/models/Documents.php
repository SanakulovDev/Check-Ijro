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
            [['document_code', 'document_date', 'resolution_date'], 'required'],
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
            'document_code' => Yii::t('app', 'Document Code'),
            'document_date' => Yii::t('app', 'Document Date'),
            'resolution_date' => Yii::t('app', 'Resolution Date'),
            'resolution_number' => Yii::t('app', 'Resolution Number'),
            'issuer_name' => Yii::t('app', 'Issuer Name'),
            'executor_name' => Yii::t('app', 'Executor Name'),
            'signing_organization' => Yii::t('app', 'Signing Organization'),
            'validity_period_start' => Yii::t('app', 'Validity Period Start'),
            'validity_period_end' => Yii::t('app', 'Validity Period End'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'file_path' => Yii::t('app', 'File Path'),
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
