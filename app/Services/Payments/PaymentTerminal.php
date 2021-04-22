<?php


namespace App\Services\Payments;


use App\Models\Payment;
use App\Repositories\OrderRepository;

class PaymentTerminal
{
    public $payment;

    public function __construct(PaymentBase $payment)
    {
        $this->payment = $payment;
    }

    public function createPayment(): bool
    {
        $order = (new OrderRepository())->findById($this->payment->order_id);

        $resultCheckSum = $this->checkSum($order->sum, $this->payment->payer_account);

        /* @var Payment $payment */
        $payment = Payment::create([
            'order_id' => $order->id,
            'type' => $this->payment->type,
            'payer_account' => $this->payment->payer_account,
        ]);

        return $payment->update(['paid' => $resultCheckSum]);
    }

    private function checkSum($sum, $payer_account): bool
    {
        return (bool) $sum + $payer_account;
    }
}
