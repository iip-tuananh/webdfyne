<?php
namespace App\Services;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

class PayPalService
{
    protected ApiContext $apiContext;

    public function __construct()
    {
        $config = config('paypal');
        $mode   = $config['mode'];
        $creds  = $config[$mode];

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($creds['client_id'], $creds['secret'])
        );
        $this->apiContext->setConfig(['mode' => $mode]);
    }

    public function createPayment(float $total, string $currency = 'USD', string $returnUrl, string $cancelUrl)
    {
        $payer = (new Payer())->setPaymentMethod('paypal');
        $amount = (new Amount())
            ->setTotal(number_format($total, 2, '.', ''))
            ->setCurrency($currency);

        $transaction = (new Transaction())
            ->setAmount($amount)
            ->setDescription('Thanh toán đơn hàng');

        $redirectUrls = (new RedirectUrls())
            ->setReturnUrl($returnUrl)
            ->setCancelUrl($cancelUrl);

        $payment = (new Payment())
            ->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

        return $payment->create($this->apiContext);
    }

    public function executePayment(string $paymentId, string $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = (new PaymentExecution())->setPayerId($payerId);
        return $payment->execute($execution, $this->apiContext);
    }
}
