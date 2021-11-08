<?php


namespace App\Services\Payments;


use App\Models\Payment;
use App\Repositories\OrderRepository;

class PaymentTerminal
{
    public function initializePaymentByMethod($order_id, $payment_type, $payer_account = null)
    {
        switch ($payment_type) {
            case PaymentBase::TYPE_CARD:
                return (new PaymentCard($order_id, $payer_account));
            case PaymentBase::TYPE_CASH:
                return (new PaymentCash($order_id));
            default:
                throw new \RuntimeException('not available type');
        }
    }

    public function createPayment($payment): bool
    {
        $order = (new OrderRepository())->findById($payment->order_id);

        $resultCheckSum = $this->checkSum($order->sum, $payment->payer_account);

        /* @var Payment $payment */
        $payment = Payment::create([
            'order_id' => $order->id,
            'type' => $payment->type,
            'payer_account' => $payment->payer_account,
        ]);

        return $payment->update(['paid' => $resultCheckSum]);
    }

    private function checkSum($sum, $payer_account): bool
    {
        return (bool) $sum + $payer_account;
    }
}
