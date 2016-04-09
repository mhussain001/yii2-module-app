<?php

namespace app\modules\example_billing\modules\v1\models\entities;

use app\interlayers\ModuleActiveRecord;
use app\modules\example_billing\events\ExampleInvoiceEvent;
use app\modules\example_billing\ExampleBilling;
use app\modules\example_billing\modules\v1\models\queries\ExampleInvoiceQuery;

class ExampleInvoice extends ModuleActiveRecord
{
    /** @return ExampleInvoiceQuery */
    public static function find()
    {
        return new ExampleInvoiceQuery(static::class);
    }

    public function create()
    {
        // Creates Modify and fire event after that.
        \Yii::$app->eventManager->fire(ExampleBilling::EVENT_EXAMPLE_INVOICE_CREATE, new ExampleInvoiceEvent($this));
    }

    public function modify()
    {
        // Modify invoice and fire event after that.
        \Yii::$app->eventManager->fire(ExampleBilling::EVENT_V1_EXAMPLE_INVOICE_MODIFY, new ExampleInvoiceEvent($this));
    }
}