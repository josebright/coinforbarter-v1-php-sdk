<?php

namespace CoinForBarter\V1;

use CoinForBarter\V1\Services\CoinForBarterRequest;
use CoinForBarter\V1\Lib\Misc;
use CoinForBarter\V1\Lib\Customer;
use CoinForBarter\V1\Lib\Payout;
use CoinForBarter\V1\Lib\PaymentPlan;
use CoinForBarter\V1\Lib\BankAccount;
use CoinForBarter\V1\Lib\Payment;
use CoinForBarter\V1\Lib\Transfer;
use CoinForBarter\V1\Lib\WalletAddress;
use CoinForBarter\V1\Lib\Transaction;
use CoinForBarter\V1\Lib\PaymentPlanSubscriber;

class CoinForBarter
{
    public $Transaction;
    public $Payment;
    public $Payout;
    public $Transfer;
    public $WalletAddress;
    public $PaymentPlan;
    public $PaymentPlanSubscriber;
    public $BankAccount;
    public $Customer;
    public $Misc;
    // public $Webhook;
    private  $Request;
    public  $public_key;

    function __construct(
        $public_key,
        $private_key,
        $encryptionKey
    ) {
        $this->Request = new CoinForBarterRequest($public_key, $private_key);
        $this->Payment = new Payment($this->Request, $public_key);
        $this->Payout = new Payout($this->Request);
        $this->Transfer = new Transfer($this->Request);
        $this->WalletAddress = new WalletAddress($this->Request);
        $this->PaymentPlan = new PaymentPlan($this->Request);
        $this->PaymentPlanSubscriber = new PaymentPlanSubscriber($this->Request);
        $this->BankAccount = new BankAccount($this->Request);
        $this->Transaction = new Transaction($this->Request);
        $this->Customer = new Customer($this->Request);
        $this->Misc = new Misc($this->Request);
        // $this->Webhook = new Webhook($encryptionKey);
    }
}
