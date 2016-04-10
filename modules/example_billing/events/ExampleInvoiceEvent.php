<?php

namespace app\modules\example_billing\events;

use yii\base\Event;

class ExampleInvoiceEvent extends Event
{
    public $invoice;

    /**
     * @param $invoice
     * @param array $config
     */
    public function __construct($invoice, $config = [])
    {
        parent::__construct($config);
        $this->invoice = $invoice;
    }
}