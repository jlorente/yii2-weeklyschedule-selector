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
use yii\helpers\Html,
    yii\helpers\Json;
use jlorente\weeklyschedule\models\Schedulable;
use yii\base\InvalidConfigException;

/**
 * Widget that renders the scheduler view.
 * 
 * @see https://github.com/artsy/day-schedule-selector
 * @see http://www.jqueryscript.net/time-clock/Create-A-Basic-Weekly-Schedule-with-Hour-Selector-Using-jQuery.html
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
     * @var Schedulable
     */
    protected $model;

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
        if ($this->model === null) {
            throw new InvalidConfigException('Schedulable model must be provided on initialization');
        }
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
        $this->getView()->registerJs("$('#{$this->options['id']}').dayScheduleSelector({$options});$('#{$this->options['id']}').data('artsy.dayScheduleSelector').serialize()");
    }

    /**
     * Sets the schedulable model.
     * 
     * @param Schedulable $model
     */
    public function setModel(Schedulable $model) {
        $this->model = $model;
    }

    /**
     * Gets the schedulabe model.
     * 
     * @return Schedulable
     */
    public function getModel() {
        return $this->model;
    }

}
