<?php


namespace App\Services\Payments;


class PaymentCash extends PaymentBase
{
    private $cashier_account = '011102200210110100';

    public function __construct($order_id)
    {
        parent::__construct($order_id);

        $this->type = self::TYPE_CASH;
        $this->payer_account = $this->cashier_account;
    }

    public function makePayment(): bool
    {
        return (new PaymentTerminal())->createPayment($this);
    }
}
