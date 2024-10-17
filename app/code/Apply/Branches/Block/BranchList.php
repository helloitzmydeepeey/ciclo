<?php
namespace Apply\Branches\Block;

use Magento\Framework\View\Element\Template;
use Apply\Branches\Model\Branch;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\ResourceModel\Address\CollectionFactory;
use Customer\Province\Model\Province;
use Downpayment\Terms\Model\Term;
use Magento\Framework\Registry;

class BranchList extends Template
{
    protected $customerSession;
    protected $myBranches;
    protected $customerRepository;
    protected $addressRepository;
    private $addressCollectionFactory;
    protected $_myTerm;
    protected $myProvince;

    protected $registry;

    public function __construct(
        Template\Context $context,
        CustomerSession $customerSession,
        Branch $myBranches,
        Province $myProvince,
        CustomerRepositoryInterface $customerRepository,
        AddressRepositoryInterface $addressRepository,
        CollectionFactory $addressCollectionFactory,
        Term $myTerm,
        Registry $registry,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        $this->myBranches = $myBranches;
        $this->myProvince = $myProvince;
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
        $this->addressCollectionFactory = $addressCollectionFactory;
        $this->_myTerm = $myTerm;
        $this->registry = $registry;
        parent::__construct($context, $data);
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

    public function getBranchesById($id)
    {
        return $this->myBranches->getBranchesById($id);
    }

    public function getAllBranches()
    {
        $provinces = $this->getAllProvince();
        if(!empty($provinces)){
            $collection = $this->myBranches->getCollection()->addFieldToFilter('branch_province', ['in' => $provinces]);
            if ($collection->getSize() == 0) {
                $collection = $this->myBranches->getCollection();
             }
        }else{
        $collection = $this->myBranches->getCollection();
      
        }
        return $collection;
    }



    public function getCustomerId()
    {
        return $this->customerSession->getCustomerId();
    }


    public function getRegionId()
    {

        $customerAddress = $this->customerSession->getCustomer()->getDefaultShippingAddress();
        if(!empty($customerAddress)){
        $customerAddressId = $customerAddress->getId();
        $address = $this->addressRepository->getById($customerAddressId);
        $regionIdAttribute = $address->getCustomAttribute('sub_region_id')->getValue();
        return $regionIdAttribute;
        }
    }

    public function getAllProvince()
    {
        $regionID = $this->getRegionId();

        if (empty($regionID)) {
            // If $regionID is empty or false, return all branches without filtering.
            $collection = $this->myProvince->getCollection();
        } else {
            $collection = $this->myProvince->getCollection()->addFieldToFilter('customer_province_id', ['eq' => $regionID]);
        }

        

        $titles = [];
        if(!empty($collection) || $collection!=NULL || $collection!=""){
        foreach ($collection as $province) {
            $titles[] = $province->getData('customer_province_title');
        }
        }else{
            $collection = $this->myProvince->getCollection();
            foreach ($collection as $province) {
                $titles[] = $province->getData('customer_province_title');
            }
        }
        return $titles;
    }



    public function getTermById($id)
    {
        return $this->_myTerm->getTermById($id);
    }

    public function getAllTerm()
    {
        return $this->_myTerm->getAllTerm();
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
