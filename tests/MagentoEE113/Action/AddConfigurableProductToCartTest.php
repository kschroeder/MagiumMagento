<?php

namespace Tests\Magium\MagentoEE113\Action;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddConfigurableProductToCart;
use Magium\Magento\Actions\Cart\AddSimpleProductToCart;
use Magium\Magento\Navigators\BaseMenu;
use Magium\Magento\Navigators\Catalog\Product;
use Magium\WebDriver\WebDriver;

class AddConfigurableProductToCartTest extends \Tests\Magium\Magento\Action\AddConfigurableProductToCartTest
{

    protected function setUp()
    {
        parent::setUp();
        $this->switchThemeConfiguration('Magium\Magento\Themes\MagentoEE113\ThemeConfiguration');
    }


    public function testBasicAddToCartWithSwatchesSpecified()
    {
        self::markTestSkipped('Magento EE 1.13 does not support configurable swatches');
    }

    public function testBasicAddToCartWithSwatchesSpecifiedOrderReversed()
    {
        self::markTestSkipped('Magento EE 1.13 does not support configurable swatches');
    }

    public function testBasicAddToCartWithOptionsSpecified()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getNavigator(BaseMenu::NAVIGATOR)->navigateTo($this->getTheme()->getNavigationPathToConfigurableProductCategory());
        $this->getNavigator(Product::NAVIGATOR)->navigateTo($this->getTheme()->getDefaultConfigurableProductName());
        $action = $this->getAction(AddConfigurableProductToCart::ACTION);
        /* @var $action AddConfigurableProductToCart */
        $action->setOption('color', 'green');
        $action->setOption('size', 'small');
        $action->execute();
        $this->assertElementExists('//dl[@class="item-options"]/dd[contains(., "Green")]', WebDriver::BY_XPATH);
        $this->assertElementExists('//dl[@class="item-options"]/dd[contains(., "Small")]', WebDriver::BY_XPATH);
    }


    public function testBasicAddToCartWithOptionsSpecifiedAndReversed()
    {
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getNavigator(BaseMenu::NAVIGATOR)->navigateTo($this->getTheme()->getNavigationPathToConfigurableProductCategory());
        $this->getNavigator(Product::NAVIGATOR)->navigateTo($this->getTheme()->getDefaultConfigurableProductName());
        $action = $this->getAction(AddConfigurableProductToCart::ACTION);
        /* @var $action AddConfigurableProductToCart */
        $action->setOption('size', 'small');
        $action->setOption('color', 'green');
        $action->execute();
        $this->assertElementExists('//dl[@class="item-options"]/dd[contains(., "Green")]', WebDriver::BY_XPATH);
        $this->assertElementExists('//dl[@class="item-options"]/dd[contains(., "Small")]', WebDriver::BY_XPATH);
    }


}