<?php

namespace CoinForBarter\V1;

class CoinForBarter
{
    // public $Transaction;
    // public $Payment;
    // public $Payout;
    // public $Transfer;
    // public $WalletAddress;
    // public $PaymentPlan;
    // public $PaymentPlanSubscriber;
    // public $BankAccount;
    // public $Customer;
    // public $Misc;
    // public $Webhook;
    // private  $Request;
    public  $publicKey;

    function __construct(
        $publicKey,
        $secretKey,
        $encryptionKey
    ) {
        $this->publicKey = $publicKey;
        // $this->Request = new CoinForBarterRequest($publicKey, $secretKey);
        // $this->Payment = new Payment($this->Request, $publicKey);
        // $this->Payout = new Payout($this->Request);
        // $this->Transfer = new Transfer($this->Request);
        // $this->WalletAddress = new WalletAddress($this->Request);
        // $this->PaymentPlan = new PaymentPlan($this->Request);
        // $this->PaymentPlanSubscriber = new PaymentPlanSubscriber($this->Request);
        // $this->BankAccount = new BankAccount($this->Request);
        // $this->Customer = new Customer($this->Request);
        // $this->Misc = new Misc($this->Request);
        // $this->Webhook = new Webhook($encryptionKey);
    }

    public function test()
    {
        return $this->publicKey;
    }
}
