<?php
namespace WeltPixel\OwlCarouselSlider\Block\Slider;

class Products extends \Magento\Catalog\Block\Product\AbstractProduct implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Core registry.
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
    protected $_helperProducts;
    protected $_helperCustom;
    protected $_productType;
    protected $_sliderConfiguration;

    protected $_currentProduct;
    /**
     * Products visibility
     * @var \Magento\Reports\Model\Event\TypeFactory
     */
    protected $_catalogProductVisibility;

    protected $_productCollectionFactory;
    protected $_reportsCollectionFactory;
    protected $_viewProductsBlock;

    /**
     * @var \Magento\Eav\Api\AttributeRepositoryInterface
     */
    protected $attributeRepository;

    /**
     * Products constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \WeltPixel\OwlCarouselSlider\Helper\Products $helperProducts
     * @param \WeltPixel\OwlCarouselSlider\Helper\Custom $helperCustom
     * @param \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productsCollectionFactory
     * @param \Magento\Reports\Model\ResourceModel\Product\CollectionFactory $reportsCollectionFactory
     * @param \Magento\Reports\Block\Product\Widget\Viewed $viewedProductsBlock
     * @param \Magento\Eav\Api\AttributeRepositoryInterface $attributeRepository
     * @param array $data
     */

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \WeltPixel\OwlCarouselSlider\Helper\Products $helperProducts,
        \WeltPixel\OwlCarouselSlider\Helper\Custom $helperCustom,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productsCollectionFactory,
        \Magento\Reports\Model\ResourceModel\Product\CollectionFactory $reportsCollectionFactory,
        \Magento\Reports\Block\Product\Widget\Viewed $viewedProductsBlock,
        \Magento\Eav\Api\AttributeRepositoryInterface $attributeRepository,
        array $data = []
    )
    {
        $this->_coreRegistry              = $context->getRegistry();
        $this->_helperCustom              = $helperCustom;
        $this->_helperProducts            = $helperProducts;
        $this->_catalogProductVisibility  = $catalogProductVisibility;
        $this->_productCollectionFactory  = $productsCollectionFactory;
        $this->_reportsCollectionFactory  = $reportsCollectionFactory;
        $this->_viewProductsBlock         = $viewedProductsBlock;
        $this->attributeRepository = $attributeRepository;

        $this->setTemplate('sliders/products.phtml');

        if (is_null($this->_currentProduct)) {
            $this->_currentProduct = $this->_coreRegistry->registry('current_product');
        }

        parent::__construct($context, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        parent::_construct();

        $this->addData([
            'cache_lifetime' => 86400,
            'cache_tags' => [\Magento\Catalog\Model\Product::CACHE_TAG,
            ], ]);
    }

    /**
     * Get key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        return [
            'WELTPIXEL_PRODUCTS_LIST_WIDGET',
            $this->_storeManager->getStore()->getId(),
            $this->_storeManager->getStore()->getCurrentCurrency()->getCode(),
            $this->_design->getDesignTheme()->getId(),
            $this->getData('products_type'),
            json_encode($this->getRequest()->getParams())
        ];
    }


    /**
     * Retrieve the product collection based on product type.
     *
     * @return array|\Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollection()
    {
        $productsType = $this->getData('products_type');

        switch ($productsType) {
            case 'new_products':
                $productCollection =  $this->_getNewProductCollection($this->_productCollectionFactory->create());
                break;
            case 'bestsell_products':
                $productCollection = $this->_getBestsellProductCollection($this->_productCollectionFactory->create());
                break;
            case 'sell_products':
                $productCollection =  $this->_getSellProductCollection($this->_productCollectionFactory->create());
                break;
            case 'recently_viewed':
                $productCollection =  $this->_getRecentlyViewedCollection($this->_productCollectionFactory->create());
                break;
            case 'related_products':
                $productCollection = $this->getProductCollectionRelated();
                break;
            case 'upsell_products':
                $productCollection = $this->getProductCollectionUpSell();
                break;
            case 'crosssell_products':
                $productCollection = $this->getProductCollectionCrossSell();
                break;
            default:
                $productCollection = [];
        }

        return $productCollection;
    }

    /**
     * Retrieve the Slider settings.
     *
     * @return array
     */
    public function getSliderConfiguration()
    {
        $productsType = $this->getData('products_type');

        if (is_null($this->_sliderConfiguration) && $this->_productType != $productsType) {
            $this->_productType = $productsType;
            $this->_sliderConfiguration = $this->_helperProducts->getSliderConfigOptions($productsType);
        }

        return $this->_sliderConfiguration;
    }

    /**
     * Retrieve the Slider Breakpoint settings.
     *
     * @return array
     */
    public function getBreakpointConfiguration()
    {
        return $this->_helperCustom->getBreakpointConfiguration();
    }

    /**
     * Get new slider products.
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection $_collection
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    protected function _getNewProductCollection($_collection)
    {
        $limit  = $this->_getProductLimit('new_products');
        $random = $this->_getRandomSort('new_products');

        if (!$limit || $limit == 0) {
            return [];
        }

        $_collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        if ($random) {
            $allIds = $_collection->getAllIds();
            $randomIds = [];
            $maxKey = count($allIds) - 1;
            while (count($randomIds) <= count($allIds) - 1) {
                $randomKey = random_int(0, $maxKey);
                $randomIds[$randomKey] = $allIds[$randomKey];
            }

            $_collection->addIdFilter($randomIds);
        };

        $_collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        $_collection = $this->_addProductAttributesAndPrices($_collection)
            ->addAttributeToFilter(
                'news_from_date',
                ['date' => true, 'to' => $this->getEndOfDayDate()],
                'left')
            ->addAttributeToFilter(
                'news_to_date',
                [
                    'or' => [
                        0 => ['date' => true, 'from' => $this->getStartOfDayDate()],
                        1 => ['is' => new \Zend_Db_Expr('null')],
                    ]
                ],
                'left')
            ->addAttributeToSort(
                'news_from_date',
                'desc')
            ->addStoreFilter($this->getStoreId())->setCurPage(1);

        if ($limit && $limit > 0 ) {
            $_collection->setPageSize($limit);
        };

        return $_collection;
    }

    /**
     * Get best-sell slider products.
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection $_collection
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    protected function _getBestsellProductCollection($_collection)
    {
        $limit  = $this->_getProductLimit('bestsell_products');
        $random = $this->_getRandomSort('bestsell_products');

        if (!$limit || $limit == 0) {
            return [];
        };

        $_collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        if ($random) {
            $allIds = $_collection->getAllIds();
            $candidateIds = $_collection->getAllIds();
            $randomIds = [];
            $maxKey = count($candidateIds) - 1;
            while (count($randomIds) <= count($allIds) - 1) {
                $randomKey = random_int(0, $maxKey);
                $randomIds[$randomKey] = $candidateIds[$randomKey];
            }

            $_collection->addIdFilter($randomIds);
        };

        $_collection = $this->_addProductAttributesAndPrices($_collection);
        $_collection->getSelect()
            ->join(['bestsellers' => $_collection->getTable('sales_bestsellers_aggregated_yearly')],
                'e.entity_id = bestsellers.product_id AND bestsellers.store_id = '.$this->getStoreId(),
                ['qty_ordered','rating_pos'])
            ->group('bestsellers.product_id')
            ->order('rating_pos');

        $_collection->addStoreFilter($this->getStoreId())->setCurPage(1);

        if ($limit && $limit > 0 ) {
            $_collection->setPageSize($limit);
        };

        return $_collection;
    }

    /**
     * Get sell slider products.
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection $_collection
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    protected function _getSellProductCollection($_collection)
    {
        $limit  = $this->_getProductLimit('sell_products');
        $random = $this->_getRandomSort('sell_products');

        if(!$limit || $limit == 0) {
            return [];
        };

        $_collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        if ($random) {
            $allIds = $_collection->getAllIds();
            $candidateIds = $_collection->getAllIds();
            $randomIds = [];
            $maxKey = count($candidateIds) - 1;
            while (count($randomIds) <= count($allIds) - 1) {
                $randomKey = random_int(0, $maxKey);
                $randomIds[$randomKey] = $candidateIds[$randomKey];
            }

            $_collection->addIdFilter($randomIds);
        }

        $saleAttributeCode = 'sale';
        $addSaleAttributeToCollection = true;
        try {
            $saleAttribute = $this->attributeRepository
                ->get(\Magento\Catalog\Api\Data\ProductAttributeInterface::ENTITY_TYPE_CODE, $saleAttributeCode);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $ex) {
            $addSaleAttributeToCollection = false;
        }

        $_collection = $this->_addProductAttributesAndPrices($_collection)
            ->addAttributeToSelect('special_from_date', true)
            ->addAttributeToSelect('special_to_date', true);

        if ($addSaleAttributeToCollection) {
            $_collection->addAttributeToSelect($saleAttributeCode, true);
        }

        $_collection->addAttributeToSort(
            'news_from_date',
            'desc'
        )
            ->addStoreFilter($this->getStoreId())
            ->setCurPage(1);

        $startOfDay = $this->getStartOfDayDate();
        $endOfDay = $this->getEndOfDayDate();
        $_collection->getSelect()->where(
            "((at_sale.value = 1)" .
            " OR (IF(at_special_from_date.value_id > 0, at_special_from_date.value, at_special_from_date_default.value) <= '$endOfDay')" .
            " AND (((((IF(at_special_to_date.value_id > 0, at_special_to_date.value, at_special_to_date_default.value) >= '$startOfDay')" .
            " OR (IF(at_special_to_date.value_id > 0, at_special_to_date.value, at_special_to_date_default.value) IS null))))))"
        );

        if ($limit && $limit > 0) {
            $_collection->setPageSize($limit);
        }

        return $_collection;
    }

    /**
     * Get recently viewed slider products.
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection $_collection
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    protected function _getRecentlyViewedCollection($_collection)
    {
        $limit  = $this->_getProductLimit('recently_viewed');
        $random = $this->_getRandomSort('recently_viewed');

        if($limit == 0) {
            return [];
        };

        $_collection = $this->_viewProductsBlock->getItemsCollection();

        if ($random) {
            $allIds = $_collection->getAllIds();
            $candidateIds = $_collection->getAllIds();
            $randomIds = [];
            $maxKey = count($candidateIds) - 1;
            while (count($randomIds) <= count($allIds) - 1) {
                $randomKey = random_int(0, $maxKey);
                $randomIds[$randomKey] = $candidateIds[$randomKey];
            }

            $_collection->addIdFilter($randomIds);
        };

        if ($limit && $limit > 0 ) {
            $_collection->setPageSize($limit);
        };

        return $_collection;
    }

    /**
     * Get related slider products.
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollectionRelated()
    {
        if (!$this->_currentProduct) {
            return [];
        }

        return $this->getRelatedProducts($this->_currentProduct);
    }

    /**
     * Retrieve array of related products.
     *
     * @return array
     */
    public function getRelatedProducts($currentProduct)
    {
        if (!$currentProduct->hasRelatedProducts()) {
            $products = [];
            $_collection = $currentProduct->getRelatedProductCollection();
            $_collection->addAttributeToSelect('*');
            foreach ($_collection as $product) {
                $products[] = $product;
            }
            $currentProduct->setRelatedProducts($products);
        }

        return $currentProduct->getData('related_products');
    }

    /**
     * Get up-sell slider products.
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollectionUpSell()
    {
        if(!$this->_currentProduct) {
            return [];
        }
        return $this->getUpSellProducts($this->_currentProduct);
    }

    /**
     * Retrieve array of up sell products.
     *
     * @return array
     */
    public function getUpSellProducts($currentProduct)
    {
        if (!$currentProduct->hasUpSellProducts()) {
            $products = [];
            $_collection = $currentProduct->getUpSellProductCollection();
            $_collection->addAttributeToSelect('*');
            foreach ($_collection as $product) {
                $products[] = $product;
            }
            $currentProduct->setUpSellProducts($products);
        }

        return $currentProduct->getData('up_sell_products');
    }

    /**
     * Get cross-sell slider products.
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollectionCrossSell()
    {
        if(!$this->_currentProduct) {
            return [];
        }

        return $this->getCrossSellProducts($this->_currentProduct);
    }

    /**
     * Retrieve array of cross sell products
     *
     * @return array
     */
    public function getCrossSellProducts($currentProduct)
    {
        if (!$currentProduct->hasCrossSellProducts()) {
            $products = [];
            $_collection = $currentProduct->getCrossSellProductCollection();
            $_collection->addAttributeToSelect('*');
            foreach ($_collection as $product) {
                $products[] = $product;
            }
            $currentProduct->setCrossSellProducts($products);
        }

        return $currentProduct->getData('cross_sell_products');
    }

    /**
     * Retrieve the products limit based on type.
     *
     * @param $type
     * @return int
     */
    protected function _getProductLimit($type)
    {
        return $this->_helperProducts->getProductLimit($type);
    }

    /**
     * Retrieve the products random sort flag based on type.
     *
     * @param $type
     * @return mixed
     */
    protected function _getRandomSort($type)
    {
        return $this->_helperProducts->getRandomSort($type);
    }

    /**
     * Get start of day date.
     * @return string
     */
    public function getStartOfDayDate()
    {
        return $this->_localeDate->date()->setTime(0, 0, 0)->format('Y-m-d H:i:s');
    }

    /**
     * Get end of day date.
     * @return string
     */
    public function getEndOfDayDate()
    {
        return $this->_localeDate->date()->setTime(23, 59, 59)->format('Y-m-d H:i:s');
    }

    /**
     * Retrieve the current store id.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }
}
