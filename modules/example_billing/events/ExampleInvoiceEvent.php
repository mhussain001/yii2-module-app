<?php

namespace app\modules\example_billing\events;

use app\modules\example_billing\modules\v1\models\entities\ExampleInvoice;
use yii\base\Event;

class ExampleInvoiceEvent extends Event
{
    public $invoice;

    /**
     * @param ExampleInvoice $invoice
     * @param array $config
     */
    public function __construct($invoice, $config = [])
    {
        parent::__construct($config);
        $this->invoice = $invoice;
    }
}