<?php

namespace Tests\Magium\Magento2\Action;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Search\Search;
use Magium\Magento\Extractors\Catalog\Search\SearchSuggestions;
use Magium\Magento\Themes\Magento2\ThemeConfiguration;

class SearchTest extends \Tests\Magium\Magento\Action\SearchTest
{
    protected $fullSearch = 'shirt';
    protected $partialSearch = 'sh';

    protected function setUp()
    {
        parent::setUp();
        $this->switchThemeConfiguration(ThemeConfiguration::THEME);
    }

    public function testSearchSuggestions()
    {
        parent::testSearchSuggestions(); // TODO: Change the autogenerated stub
    }
}