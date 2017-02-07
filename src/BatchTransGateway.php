<?php

namespace Omnipay\Alipay;

use Omnipay\Alipay\Requests\BatchTransPurchaseRequest;
use Omnipay\Alipay\Requests\BatchTransCompletePurchaseRequest;

/**
 * Class BatchTransGateway
 *
 * @package Omnipay\Alipay
 */
class BatchTransGateway extends AbstractLegacyGateway
{
    public function getName()
    {
        return 'Batch Trans Notify';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest(BatchTransPurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(BatchTransCompletePurchaseRequest::class, $parameters);
    }
}