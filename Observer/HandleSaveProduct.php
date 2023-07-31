<?php

namespace Training\CurrencyPrice\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class HandleSaveProduct implements ObserverInterface
{
    protected $request;

    /**
     * HandleSaveProduct constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {

        $params = $this->request->getParams();
        $customFieldData = $params['currency']['decimal'];
        //dd($customFieldData);


        // Logic to process custom fields data
        // For example, you can access specific custom fields like this:
        // $customField1 = $customFieldData['custom_field_1'];
        // $customField2 = $customFieldData['custom_field_2'];

        // Perform actions with the custom field data
        // ...

        // For example, you may want to set the custom field data to the product:
        // $product = $observer->getEvent()->getProduct();
        // $product->setData('custom_field_1', $customField1);
        // $product->setData('custom_field_2', $customField2);
        // $product->save();
    }
}
