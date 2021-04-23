<?php


namespace App\Services\Payments;


abstract class PaymentBase
{
    public const TYPE_CARD = 'card';
    public const TYPE_CASH = 'cash';

    public $type;
    public $order_id;
    public $payer_account;

    public function __construct($order_id, $payer_account = null)
    {
        $this->order_id = $order_id;
        $this->payer_account = $payer_account;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    abstract public function makePayment(): bool;
}
