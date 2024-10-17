<?php

namespace Apply\Product\Plugin\Magento\Swatches\Block\Product\Renderer;
class Configurable
{
    public function afterGetJsonConfig(
        \Magento\Swatches\Block\Product\Renderer\Configurable $subject,
    $result
    ) {
        $jsonResult = json_decode($result, true);
        foreach ($subject->getAllowProducts() as $simpleProduct) {
            $id = $simpleProduct->getId();
            $productSku = $simpleProduct->getSku();
            foreach ($simpleProduct->getAttributes() as $attribute) {
                if (($attribute->getIsVisible() && $attribute->getIsVisibleOnFront()) || in_array($attribute->getAttributeCode(), ['sku', 'description', 'name'])) {
                    $code = $attribute->getAttributeCode();
                    $value = (string)$attribute->getFrontend()->getValue($simpleProduct);
                    $jsonResult['dynamic'][$code][$id] = [
                        'value' => $value,
                        'product_id' => $id,
                        'sku' => $productSku,
                    ];
                }
            }
        }
        $result = json_encode($jsonResult);
        return $result;
    }
}
