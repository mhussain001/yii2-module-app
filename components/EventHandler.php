<?php

namespace app\components;

use app\modules\example_billing\events\ExampleInvoiceEvent;

abstract class EventHandler
{
    /**
     * @param ExampleInvoiceEvent $event
     */
    public function invoiceCreateHandler($event)
    {
        echo 'Handler for example_billing.invoice.create in core has been firing.';
    }
}