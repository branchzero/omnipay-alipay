<?php

namespace Omnipay\Alipay\Requests;

class BatchTransPurchaseRequest extends AbstractLegacyRequest
{
    protected $service = 'batch_trans_notify';

    protected function validateData()
    {
        $this->validate(
            'service',
            'partner',
            'key',
            'notify_url',
            'input_charset',
            "account_name",
            "email",
            "detail_data",
            "batch_no",
            "batch_num",
            "batch_fee",
            "pay_date"
        );
    }

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $this->validateData();
        $data              = array(
            "service"           => $this->service,
            "partner"           => $this->getPartner(),
            "_input_charset"    => $this->getInputCharset(),
            "notify_url"        => $this->getNotifyUrl(),
            "account_name"      => $this->getAccountName(),
            "email"             => $this->getEmail(),
            "detail_data"       => $this->getDetailData(),
            "batch_no"          => $this->getBatchNo(),
            "batch_num"         => $this->getBatchNum(),
            "batch_fee"         => $this->getBatchFee(),
            "pay_date"          => $this->getPayDate(),
        );
        $data              = array_filter($data);
        $data['sign']      = $this->sign($data, $this->getSignType());
        $data['sign_type'] = $this->getSignType();
        return $data;
    }

    public function getAccountName()
    {
        return $this->getParameter('account_name');
    }

    public function setAccountName($value)
    {
        $this->setParameter('account_name', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        $this->setParameter('email', $value);
    }

    public function getDetailData()
    {
        return $this->getParameter('detail_data');
    }

    public function setDetailData($value)
    {
        $this->setParameter('detail_data', $value);
    }

    public function getBatchNo()
    {
        return $this->getParameter('batch_no');
    }

    public function setBatchNo($value)
    {
        $this->setParameter('batch_no', $value);
    }

    public function getBatchNum()
    {
        return $this->getParameter('batch_num');
    }

    public function setBatchNum($value)
    {
        $this->setParameter('batch_num', $value);
    }

    public function getBatchFee()
    {
        return $this->getParameter('batch_fee');
    }

    public function setBatchFee($value)
    {
        $this->setParameter('batch_fee', $value);
    }

    public function getPayDate()
    {
        return $this->getParameter('pay_date');
    }

    public function setPayDate($value)
    {
        $this->setParameter('pay_date', $value);
    }
}