<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace jlorente\weeklyschedule\models;

use jlorente\weeklyschedule\db\Schedule;

trait SchedulableTrait {

    /**
     * @return \jlorente\weeklyschedule\db\Schedule
     */
    public function getSchedule() {
        $schedule = [];
        foreach ($this->getSchedules()->orderBy(['day' => SORT_ASC])->all() as $data) {
            $day = (string) $data->day;
            if (isset($schedule[$day]) === false) {
                $schedule[$day] = [];
            }
            $schedule[$day][] = [$data->from, $data->to];
        }
        return $schedule;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules() {
        return $this->hasMany(Schedule::className(), ['id' => 'model_id']);
    }

}
