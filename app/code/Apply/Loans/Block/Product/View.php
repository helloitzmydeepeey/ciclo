<?php

namespace Apply\Loans\Block\Product;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\Registry;


class View extends Template
{
    protected $customerSession;
    protected $registry;
    protected $_myTerm;

    public function __construct(
        Template\Context $context,
        CustomerSession $customerSession,
        Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->registry = $registry;
    }

    /**
     * Check if the customer is logged in
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->customerSession->isLoggedIn();
    }

    /**
     * Retrieve button html
     *
     * @return string
     */
    public function getButtonHtml()
    {
        // Check if the customer is logged in
        if (!$this->customerSession->isLoggedIn()) {
            return '<p style="color:red;">Please login to apply for a loan</p>'; // Show message asking to log in
        }

        // Check if the current product belongs to category ID 6
        $product = $this->getCurrentProduct();
        if ($product && !empty($product->getCategoryIds())) {
            $categoryIds = $product->getCategoryIds();
            if (in_array(6, $categoryIds)) {
                return $this->getChildHtml('toloan.product.view.button'); // Show the button
            }
        }

        return '<p style="color:red;">This product is not eligible for a loan</p>'; // Show message indicating product is not eligible
    }

    /**
     * Get the current product object
     *
     * @return \Magento\Catalog\Api\Data\ProductInterface|null
     */
    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }


}
