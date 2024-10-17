/*jshint browser:true jquery:true*/
/*global alert*/
define([
    'jquery',
    'mage/utils/wrapper'
], function ($, wrapper) {
    'use strict';

    return function(targetModule){

        $('h1 span').attr("data-dynamic", "name");

        var updatePrice = targetModule.prototype._UpdatePrice;
        targetModule.prototype.dynamic = {};

        $('[data-dynamic]').each(function(){
            var code = $(this).data('dynamic');
            var value = $(this).html();

            targetModule.prototype.dynamic[code] = value;
        });

        var updatePriceWrapper = wrapper.wrap(updatePrice, function(original){
            var dynamic = this.options.jsonConfig.dynamic;
            console.log(dynamic);
            for (var code in dynamic){
                if (dynamic.hasOwnProperty(code)) {

                    var value = "";
                    var $placeholder = $('[data-dynamic='+code+']');
                    var allSelected = true;

                    if(!$placeholder.length) {
                        continue;
                    }

                    for(var i = 0; i<this.options.jsonConfig.attributes.length;i++){
                        if (!$('div.product-info-main .product-options-wrapper .swatch-attribute.' + this.options.jsonConfig.attributes[i].code).attr('option-selected')){
                            allSelected = false;
                        }
                    }

                    if(allSelected){
                        var products = this._CalcProducts();
                        value = this.options.jsonConfig.dynamic[code][products.slice().shift()].value;

                        // Set the value of the input field to the product ID
                        $('.product-id-loan').val(products.slice().shift());

                        // Get the SKU
                        var sku = this.options.jsonConfig.dynamic[code][products.slice().shift()].sku;
                        $('.product.attribute.sku .value').text(sku);
                        // Select the first option (index 0) for the select elements
                        $('.price-after-text .select-terms').prop('selectedIndex', 0);
                        $('.price-after-text .select-branch').prop('selectedIndex', 0);
                        //$('#toloan-product-view-button').prop('disabled', true);

                    } else {
                        value = this.dynamic[code];


                    }

                    $placeholder.html(value);
                }
            }

            return original();
        });

        targetModule.prototype._UpdatePrice = updatePriceWrapper;
        return targetModule;
    };
});
