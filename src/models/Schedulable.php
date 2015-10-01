<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace jlorente\weeklyschedule\models;

interface Schedulable {
    
    /**
     * @return \jlorente\weeklyschedule\db\Schedule[]
     */
    public function getSchedules();
}