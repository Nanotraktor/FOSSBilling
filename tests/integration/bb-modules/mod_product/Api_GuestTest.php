<?php
/**
 * @group Core
 */
class Api_Guest_ProductTest extends BBDbApiTestCase
{
    protected $_initialSeedFile = 'orders.xml';
    
    public function testGetAll()
    {
        $list = $this->api_guest->product_get_pairs();
        $this->assertInternalType('array', $list);

        $list = $this->api_guest->product_get_list();
        $this->assertInternalType('array', $list);
        
        $list = $this->api_guest->product_category_get_pairs();
        $this->assertInternalType('array', $list);

        $data = array(
            'id'    =>  10,
        );
        $list = $this->api_guest->product_get($data);
        $this->assertInternalType('array', $list);
        
        $list = $this->api_guest->product_get_slider($data);
        $this->assertInternalType('array', $list);
    }

    public function testCategoryGetList()
    {
        $pager = $this->api_guest->product_category_get_list();
        $this->assertInternalType('array', $pager);
        $this->assertArrayHasKey('list', $pager);

        $list = $pager['list'];
        $this->assertInternalType('array', $list);

        $item = $list[0];
        $this->assertArrayHasKey('price_starting_from', $item);
        $this->assertArrayHasKey('icon_url', $item);
        $this->assertArrayHasKey('type', $item);
        $this->assertArrayHasKey('products', $item);
        $this->assertInternalType('array', $item['products']);
    }

    /*
    public function testBenchmark()
    {
        $timer = new Benchmark_Timer();
        $timer->start();
        $list = $this->api_guest->product_get_categories();
        $timer->stop();
        $timer->display();
    }
    */

    public function testProductGetList()
    {
        $array = $this->api_guest->product_get_list();
        $this->assertInternalType('array', $array);

        $this->assertArrayHasKey('list', $array);
        $list = $array['list'];
        $this->assertInternalType('array', $list);
        $item = $list[0];

        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('product_category_id', $item);
        $this->assertArrayHasKey('type', $item);
        $this->assertArrayHasKey('title', $item);
        $this->assertArrayHasKey('form_id', $item);
        $this->assertArrayHasKey('slug', $item);
        $this->assertArrayHasKey('description', $item);
        $this->assertArrayHasKey('unit', $item);
        $this->assertArrayHasKey('priority', $item);
        $this->assertArrayHasKey('created_at', $item);
        $this->assertArrayHasKey('updated_at', $item);
        $this->assertArrayHasKey('pricing', $item);

        $pricing = $item['pricing'];
        $this->assertInternalType('array', $item['pricing']);
        $this->assertArrayHasKey('type', $pricing);
        $this->assertArrayHasKey('free', $pricing);
        $this->assertArrayHasKey('once', $pricing);
        $this->assertArrayHasKey('recurrent', $pricing);

        $this->assertArrayHasKey('config', $item);
        $this->assertInternalType('array', $item['config']);

        $this->assertArrayHasKey('addons', $item);
        $this->assertInternalType('array', $item['addons']);

        $this->assertArrayHasKey('price_starting_from', $item);
        $this->assertArrayHasKey('icon_url', $item);
        $this->assertArrayHasKey('allow_quantity_select', $item);
        $this->assertArrayHasKey('quantity_in_stock', $item);
        $this->assertArrayHasKey('stock_control', $item);

        $this->assertArrayNotHasKey('upgrades', $item);
        $this->assertArrayNotHasKey('status', $item);
        $this->assertArrayNotHasKey('hidden', $item);
        $this->assertArrayNotHasKey('setup', $item);
        $this->assertArrayNotHasKey('category', $item);
    }

    public function testProduct_StartingFromPrice_DomainType()
    {
        $array = $this->api_guest->product_get(array('id' => 10));
        $this->assertTrue($array['price_starting_from'] > 0);
    }

}