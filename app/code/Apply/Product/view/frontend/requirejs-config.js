var config = {
    config: {
        mixins: {
            'Magento_ConfigurableProduct/js/configurable': {
                'Apply_Product/js/model/attswitch': true
            },
            'Magento_Swatches/js/swatch-renderer': {
                'Apply_Product/js/model/swatch-attswitch': true
            }
        }
    }
};
