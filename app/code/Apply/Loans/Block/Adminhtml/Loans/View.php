<?php
namespace Apply\Loans\Block\Adminhtml\Loans;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\AddressRepositoryInterface;

class View extends \Magento\Backend\Block\Template
{
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var AddressRepositoryInterface
     */
    protected $addressRepository;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param CustomerRepositoryInterface $customerRepository
     * @param AddressRepositoryInterface $addressRepository
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        CustomerRepositoryInterface $customerRepository,
        AddressRepositoryInterface $addressRepository,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
        parent::__construct($context, $data);
    }

    /**
     * Get Loans object
     *
     * @return \Apply\Loans\Model\Loan
     */
    public function getLoan()
    {
        return $this->_coreRegistry->registry('apply_loan');
    }

    /**
     * Get customer object by ID
     *
     * @param int $customerId
     * @return \Magento\Customer\Api\Data\CustomerInterface|null
     */
    public function getCustomerById($customerId)
    {
        try {
            return $this->customerRepository->getById($customerId);
        } catch (\Exception $e) {
            // Handle the exception if customer retrieval fails
            // You can log the error or show a specific error message
            $this->_logger->error($e->getMessage());
        }
        return null;
    }

    /**
 * Get formatted address by address object
 *
 * @param \Magento\Customer\Api\Data\AddressInterface $address
 * @return string|null
 */
public function getFormattedAddress($address)
{
    if ($address) {
        $street = implode(', ', $address->getStreet());
        $city = $address->getCity();
        $province = $address->getRegion() ? $address->getRegion()->getRegion() : '';
        $postcode = $address->getPostcode();
        $barangay = $address->getCustomAttribute('barangay_title');

        $formattedAddress = '';

        if ($street) {
            $formattedAddress .= $street . "\n";
        }

        if ($barangay && $province) {
            $barangayTitle = $barangay->getValue();
            $formattedAddress .= $barangayTitle . "\n";
            $formattedAddress .= $city . ', ' . $province . "\n";
        } else {
            $formattedAddress .= $city . "\n";
        }

        $formattedAddress .= $postcode;

        return $formattedAddress;
    }

    return null;
}


    /**
     * Get default billing address of the customer
     *
     * @param int $customerId
     * @return \Magento\Customer\Api\Data\AddressInterface|null
     */
    public function getDefaultBillingAddress($customerId)
    {
        try {
            $customer = $this->getCustomerById($customerId);
            if ($customer) {
                return $customer->getDefaultBillingAddress();
            }
        } catch (\Exception $e) {
            // Handle the exception if address retrieval fails
            // You can log the error or show a specific error message
            $this->_logger->error($e->getMessage());
        }
        return null;
    }

    /**
     * Get default shipping address of the customer
     *
     * @param int $customerId
     * @return \Magento\Customer\Api\Data\AddressInterface|null
     */
    public function getDefaultShippingAddress($customerId)
    {
        try {
            $customer = $this->getCustomerById($customerId);
            if ($customer) {
                return $customer->getDefaultShippingAddress();
            }
        } catch (\Exception $e) {
            // Handle the exception if address retrieval fails
            // You can log the error or show a specific error message
            $this->_logger->error($e->getMessage());
        }
        return null;
    }
}
