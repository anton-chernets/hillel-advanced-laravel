<?php


namespace App\Console\Commands;


use App\Services\Payments\PaymentBase;
use App\Services\Payments\PaymentTerminal;
use Illuminate\Console\Command;

class CreatePayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:create
                            {order_id : id order}
                            {type : set payment type}
                            {--payer_account : set payer account}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create payment';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $order_id = $this->argument('order_id');
        $payment_type = $this->argument('type');
        $payer_account = $this->option('payer_account');

        if($payment_type === PaymentBase::TYPE_CARD && is_null($payer_account)){
            $this->warn('Please enter payer account');
        }
        if($payment_type === PaymentBase::TYPE_CASH){
            $this->info('Не забудьте взять у клиента деньги');
        }

        try {
            $payment = (new PaymentTerminal())->initializePaymentByMethod($order_id, $payment_type, $payer_account);
            $payment->makePayment() ? $this->info('success') : $this->info('decline');
        } catch (\Throwable $exception) {
            $this->warn($exception->getMessage());
        }
    }
}
