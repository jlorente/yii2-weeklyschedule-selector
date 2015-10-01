<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */

namespace jlorente\weeklyschedule\widgets;

use yii\base\Widget;
use jlorente\weeklyschedule\assets\SchedulerAsset;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Widget that renders the scheduler view.
 * 
 * @see 
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class Scheduler extends Widget {

    /**
     *
     * @var array
     */
    protected static $ids = [];

    /**
     *
     * @var array
     */
    public $options;

    /**
     *
     * @var array
     */
    public $pluginOptions;

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        if (isset($this->options['id']) === false) {
            $this->createId();
        }
        if (isset($this->options['class']) === false) {
            $this->options['class'] = 'weekly-scheduler';
        }
        SchedulerAsset::register($this->getView());
    }

    /**
     * Creates an id based on the times the widget has been created on the 
     * current request.
     */
    protected function createId() {
        $this->options['id'] = 'wScheduler';
        while (isset(static::$ids[$this->options['id']])) {
            $n = 1;
            if (($pos = strrpos($this->options['id'], '-')) !== false) {
                $nFrag = substr($this->options['id'], $pos + 1);
                if (is_numeric($nFrag)) {
                    $n = $nFrag;
                } else {
                    $n = 1;
                }
                $this->options['id'] = substr($this->options['id'], 0, $pos);
            }
            $this->options['id'] .= '-' . ($n + 1);
        }
        static::$ids[$this->options['id']] = true;
    }

    /**
     * @inheritdoc
     */
    public function run() {
        echo Html::tag('div', '', $this->options);
        $this->registerJs();
    }

    /**
     * Registers the js necessary to initialize the plugin.
     */
    protected function registerJs() {
        $options = Json::encode($this->pluginOptions);
        $this->getView()->registerJs("$('#{$this->options['id']}').dayScheduleSelector({$options});");
    }

}
