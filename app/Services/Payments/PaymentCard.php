<?php


namespace App\Services\Payments;


class PaymentCard extends PaymentBase
{
    public function __construct($order_id, $payer_account)
    {
        parent::__construct($order_id, $payer_account);

        $this->type = self::TYPE_CARD;
    }

    public function doPayment(): bool
    {
        return (new PaymentTerminal($this))->createPayment();
    }
}
