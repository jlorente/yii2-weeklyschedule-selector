<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace jlorente\weeklyschedule\db;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior,
    yii\behaviors\BlameableBehavior;

/**
 * Entry class.
 * 
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class Entry extends ActiveRecord {

    /**
     * @inheritdoc
     * 
     */
    public static function tableName() {
        return 'jl_sch_entry';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['schedule_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['from', 'to'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'schedule_id' => Yii::t('jlorente/schedule', 'ID'),
            'from' => Yii::t('jlorente/schedule', 'From'),
            'to' => Yii::t('jlorente/schedule', 'To'),
            'created_at' => Yii::t('jlorente/schedule', 'Created At'),
            'updated_at' => Yii::t('jlorente/schedule', 'Updated At'),
            'created_by' => Yii::t('jlorente/schedule', 'Created By'),
            'updated_by' => Yii::t('jlorente/schedule', 'Updated By')
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function fields() {
        return [
            'from', 'to'
        ];
    }

}
