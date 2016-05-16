<?php

namespace app\modules\personnel\modules\interview\events;

use yii\base\Event;

class InterviewEvent extends Event
{
    /** @var \app\modules\personnel\modules\interview\models\Interview */
    public $interview;

    /**
     * @param \app\modules\personnel\modules\interview\models\Interview $interview
     * @param array $config = []
     */
    public function __construct($interview, $config = [])
    {
        parent::__construct($config);
        $this->interview = $interview;
    }
}