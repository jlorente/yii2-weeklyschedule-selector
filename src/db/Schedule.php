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
 * Schedule class.
 * 
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class Schedule extends ActiveRecord {

    const DAY_SUNDAY = 0;
    const DAY_MONDAY = 1;
    const DAY_TUESDAY = 2;
    const DAY_WEDNESDAY = 3;
    const DAY_THURSDAY = 4;
    const DAY_FRIDAY = 5;
    const DAY_SATURDAY = 6;

    /**
     * @inheritdoc
     * 
     */
    public static function tableName() {
        return 'jl_sch_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['model_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['from', 'to'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'model_id' => Yii::t('jlorente/schedule', 'ID'),
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
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getEntries() {
        return $this->hasMany(Entry::className(), ['id' => 'schedule_id']);
    }
    
    public function fields() {
        return [
            
        ];
    }
}
