<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace jlorente\weeklyschedule\assets;

use yii\web\AssetBundle;

/**
 * Asset that loads the Jquery plugin day-schedule-selector developed by artsy.
 * 
 * @see https://github.com/artsy/day-schedule-selector
 * @see http://www.jqueryscript.net/time-clock/Create-A-Basic-Weekly-Schedule-with-Hour-Selector-Using-jQuery.html
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class SchedulerAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/jlorente/yii2-weeklyschedule-selector/src/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/scheduler.js'
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/scheduler.css'
    ];

}
