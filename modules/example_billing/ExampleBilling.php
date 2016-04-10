<?php

namespace app\modules\example_billing;

use app\components\MainModule;

class ExampleBilling extends MainModule
{
    const EVENT_EXAMPLE_INVOICE_CREATE = 'example_billing.invoice.create';
    const EVENT_V1_EXAMPLE_INVOICE_MODIFY = 'example_billing.v1.invoice.modify';
}