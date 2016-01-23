<?php

namespace Magium\Magento\Extractors\Catalog\Product\Magento2;

use Magium\Magento\Extractors\Catalog\Product\Option;
use Magium\Magento\Extractors\Catalog\Product\Value;
use Magium\WebDriver\WebDriver;
use Magium\WebDriver\WebDriverElementProxy;

class StandardProcessor extends \Magium\Magento\Extractors\Catalog\Product\StandardProcessor
{


    public function process($name, $count)
    {
        /* I really do not like this approach.  I don't like depending on JS for this data.  But my only other option
         * is to do a recursive iteration over all of the OPTION elements to extract all of the possible options and
         * that is just craziness.
        */

        $productOption = new Option($name);
        $jsVals = $this->webDriver->executeScript('return spConfig');
        foreach ($jsVals['config']['attributes'] as $attribute) {
            if ($attribute['label'] == $name) {
                foreach ($attribute['options'] as $option) {
                    $productOption->addValue(new Value(
                        $option['label'],
                        new WebDriverElementProxy(
                            $this->webDriver,
                            $this->theme->getConfigurableProductOptionXpath($count, $option['label']),
                            WebDriver::BY_XPATH
                        )
                    ));
                }
            }
        }


        return $productOption;
    }
}