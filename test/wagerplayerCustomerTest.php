<?php

class wagerplayerCustomerTest extends PHPUnit_Framework_TestCase
{
	protected $wagerplayerCustomer;
    public function setUp()
    {
        // $wagerplayerCustomer = wagerplayerCustomer::getNewCustomer();
    }

    public function tearDown()
    {
        // Not yet
    }

    /**
     * Test instance will throw wagerplayerBadArgumentException without $id param
     * 
     * @expectedException wagerplayerBadArgumentException
     * @expectedExceptionMessage Unable to get a customer instance without an identifier.
     * @expectedExceptionCode! 
     */
    public function test_instance_false(){
        wagerplayerCustomer::getInstance();
    }

    /**
     * Test function getInstance and function set load ID
     * @return [unittest] [assertEquals]
     */
    public function test_getinstance_id(){
        $wagerplayer = wagerplayerCustomer::getInstance(1);
    	$this->assertEquals(1, $wagerplayer->getId() , 'Can not set and load ID');
    }

    /**
     * Test: Is customer data can be loaded into it's instance
     * @return [unittest] [assertTrue]
     */
    public function test_load_data(){
        //Stub getRemoteRequest function from wagerplayerRemote.inc
        // $wagerplayerRemote = $this->getMock('wagerplayerRemote', array('getRemoteRequest'));
        // $prams = array("action"=>"account_update_customer_details",
        //     "customer_id"=>100,
        //     "salutation"=>"salutation",
        //     "dob" => "10/10/1910",
        //     "promotion_code" => "WIN",
        //     "heard_about_us_type" => "Mail",
        //     "heard_about_other" => "",
        //     "country" => "VN",
        //     "city" => "HCMC",
        //     );
        // $stub->expects($this->any())
        //      ->method('getRemoteRequest')
        //      ->will($this->returnValue($params));
        $wagerplayer = wagerplayerCustomer::getInstance(1);
        $data = $wagerplayer->load();
        var_dump($data);
    }

    /**
     * Test: Is customer address can be created
     * @return [unittest] [assertTrue]
     */
    public function test_create_customer_address(){
        $wagerplayer = wagerplayerCustomer::getInstance(1);
        $data        = (object) array("address_id"=>1,"customer_id"=>1,"address1"=> "Alex St, Bolevard Ward","address2"=> NULL,"city"=> "HCMC","state"=>"VN","zipcode"=>"70000","created_by"=>"admin","created_date"=>"10/10/1910","last_updated_by"=>"admin","last_updated_date"=>"10/10/1990","country_name"=>"VietNam","country_code"=>"008","country"=>"VN");
        $wagerplayer->createCustomerAddress($data);

        var_dump($wagerplayer);
    }

    

}

?>