<?php
/**
 * Override wagerplayerCustomer class
 */
class wagerplayerCustomerOb extends wagerplayerCustomer{
    public function __construct(){
        $this->setId($id);
        $this->load();
    } //override private construct method
}
class wagerplayerCustomerTest extends PHPUnit_Framework_TestCase
{
	protected $wagerplayerCustomer;
    public function setUp()
    {
        // $wagerplayerCustomer = wagerplayerCustomer::getNewCustomer();
    }

    public function tearDown()
    {
        // unset_new_overload();
    }

    /**
     * @test instance will throw wagerplayerBadArgumentException without $id param
     * 
     * @expectedException wagerplayerBadArgumentException
     * @expectedExceptionMessage Unable to get a customer instance without an identifier.
     * @expectedExceptionCode! 
     */
    public function instance_false(){
        wagerplayerCustomer::getInstance();
    }

    /**
     * @test function getInstance and function set load ID
     * @return [unittest] [assertEquals]
     * @
     */
    public function getinstance_id(){
        // $wagerplayer = wagerplayerCustomer::getInstance(1);
    	// $this->assertEquals(1, $wagerplayer->getId() , 'Can not set and load ID');
          $this->assertAttributeEquals(
          1,  /* expected value */
          'id',  /* attribute name */
          wagerplayerCustomer::getInstance(1) /* object         */
        );
    }

    /**
     * @test Is customer data can be loaded into it's instance
     * @return [unittest] [assertTrue]
     */
    public function load_data(){
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
       
        $class = $this->getMockClass(
          'wagerplayerCustomer',          /* name of class to mock     */
          array('getRemoteRequest','getId') /* list of methods to mock   */
        );
 
        // $class::staticExpects($this->any())
        //       ->method('getRemoteRequest')
        //       ->will($this->returnValue('bar'));
 
        // $class::Expects($this->any())
        //       ->method('getId')
        //       ->will($this->returnValue(1));
 
        // $this->assertEquals(
        //   'bar',
        //   $class::load()
        // );
    
        // $wagerplayer = wagerplayerCustomer::getInstance(1);
        // $data = $wagerplayer->load();
        // var_dump($data);
    }

    /**
     * @test Is customer address can be created
     * @return [unittest] [assertTrue]
     */
    public function create_customer_address(){
        // $wagerplayer = wagerplayerCustomer::getInstance(1);
        // $data        = (object) array("address_id"=>1,"customer_id"=>1,"address1"=> "Alex St, Bolevard Ward","address2"=> NULL,"city"=> "HCMC","state"=>"VN","zipcode"=>"70000","created_by"=>"admin","created_date"=>"10/10/1910","last_updated_by"=>"admin","last_updated_date"=>"10/10/1990","country_name"=>"VietNam","country_code"=>"008","country"=>"VN");
        // $wagerplayer->createCustomerAddress($data);

        // var_dump($wagerplayer);
    }


    /**
     * @test Is customer address can be created
     * Test a private method and simple create address data using ReflectionMethod
     * @return [unittest] [assertObjectHasAttribute] id, customerId
     */
    public function sample_private(){
        $method = new ReflectionMethod(
          'wagerplayerCustomerOb', 'createCustomerAddress'
        );
        $address_data        = (object) array("address_id"=>1,"customer_id"=>1,"address1"=> "Alex St, Bolevard Ward","address2"=> NULL,"city"=> "HCMC","state"=>"VN","zipcode"=>"70000","created_by"=>"admin","created_date"=>"10/10/1910","last_updated_by"=>"admin","last_updated_date"=>"10/10/1990","country_name"=>"VietNam","country_code"=>"008","country"=>"VN");
        $method->setAccessible(TRUE);
        $actual = $method->invoke(new wagerplayerCustomerOb,$address_data);

        /** Successful data
        
          ["id":"wagerplayerCustomerAddress":private]=>
          int(1)
          ["customerId":"wagerplayerCustomerAddress":private]=>
          int(1)
          ["address1":"wagerplayerCustomerAddress":private]=>
          string(22) "Alex St, Bolevard Ward"
          ["address2":"wagerplayerCustomerAddress":private]=>
          NULL
          ["city":"wagerplayerCustomerAddress":private]=>
          string(4) "HCMC"
          ["state":"wagerplayerCustomerAddress":private]=>
          string(2) "VN"
          ["zipcode":"wagerplayerCustomerAddress":private]=>
          string(5) "70000"
          ["country":"wagerplayerCustomerAddress":private]=>
          object(wagerplayerCountry)#217 (3) {
            ["id":"wagerplayerCountry":private]=>
            string(2) "VN"
            ["name":"wagerplayerCountry":private]=>
            string(7) "VietNam"
            ["code":"wagerplayerCountry":private]=>
            string(3) "008"
          }
          ["createdBy":"wagerplayerCustomerAddress":private]=>
          string(5) "admin"
          ["createdDate":"wagerplayerCustomerAddress":private]=>
          string(10) "10/10/1910"
          ["lastUpdatedBy":"wagerplayerCustomerAddress":private]=>
          string(5) "admin"
          ["lastUpdatedDate":"wagerplayerCustomerAddress":private]=>
          string(10) "10/10/1990"
        }
        */

        $this->assertObjectHasAttribute('id', $actual, 'Can not create CustomerAddress Id');
        $this->assertObjectHasAttribute('customerId', $actual, 'Can not create CustomerAddress customerId');
        
    }

    

    /**
     * @test getRemoteRequest from wagerplayeRemote
     * Test a private method and simple create address data using ReflectionMethod
     * @return [unittest] [assertObjectHasAttribute] id, customerId
     */
    public function sample_mock_inheritance(){
           $this->getMock(
          'wagerplayerRemote',   
          array('getRemoteRequest'), 
          array(),                  /* constructor arguments     */
          'wagerplayerRemoteMock'            
        );
 
        set_new_overload(array($this, '_getRemoteRequest'));

        $wagerplayer = new wagerplayerCustomerOb;
        // $wagerplayer-> 



    }

    /**
     * Callback for _getRemoteRequest funtion
     * @return [object] [result of RemoteRequest]
     */
    private function _getRemoteRequest(){
        return (object) array('isSuccess'=>TRUE);
    }


    

}

?>