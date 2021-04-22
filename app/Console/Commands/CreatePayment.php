<?php


namespace App\Console\Commands;


use App\Services\Payments\PaymentBase;
use App\Services\Payments\PaymentCard;
use App\Services\Payments\PaymentCash;
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

        switch ($payment_type) {
            case PaymentBase::TYPE_CARD:
                if(is_null($payer_account)){
                    $this->warn('Please enter payer account');
                } else{
                    $payment = (new PaymentCard($order_id, $payer_account));
                }
                break;
            case PaymentBase::TYPE_CASH:
                $this->info('Не забудьте взять у клиента деньги');
                $payment = (new PaymentCash($order_id));
                break;
            default:
                $payment = null;
                $this->warn('Not defined payment type:' . PHP_EOL . $payment_type);
        }

        try {
            $payment->doPayment()
                ? $this->info('success')
                : $this->info('decline');
        } catch (\Throwable $exception) {
            $this->warn($exception->getMessage());
        }
    }
}
