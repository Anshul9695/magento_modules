<?php
 
namespace Bizspice\PreviousNext\Controller\Index;
 
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Magento\Customer\Model\Session;
use  Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
use Bizspice\PreviousNext\Model\BlogFactory; 
use Magento\Framework\Stdlib\DateTime\DateTime;
//to getting prouduct details
use Magento\Catalog\Model\ProductFactory;


class Index extends Action
{
    protected $resultPageFactory;
    protected $_session;
    private $resultJsonFactory;
    protected $_modelBlogFactory;
    protected $product;  
//get connection
  

    public function __construct(Context $context, PageFactory $resultPageFactory, Session $session,
    RedirectInterface $redirect,
    JsonFactory $resultJsonFactory,
    BlogFactory $modelBlogFactory,
    DateTime $date,
    ProductFactory $product
 
    )
    { 
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_session = $session;
        $this->RedirectInterface=$redirect;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_modelBlogFactory = $modelBlogFactory;
        $this->date = $date;
        $this->product=$product;
    
    }
    //getting product detail by id its a function 
    public function getProduct($id)
    {
        return $this->product->create()->load($id);
    }
 
    public function execute()
    {  
       

// by using Session model
if(!$this->_session->isLoggedIn()) {
    $response['redirectUrl'] = $this->_url->getUrl('customer/account/login');
    $resultJson = $this->resultJsonFactory->create();
    return $resultJson->setData($response);
  
}else{
   $BlogModel= $this->_modelBlogFactory->create();
   //getting over all data from data base table using collection
    // $collection = $BlogModel->getCollection()
    //                       ->addFieldToFilter('customer_id',$customer_id)
    //                        ->addFieldToFilter('product_id',$product_id);
    //     echo "<pre>";
    //    var_dump($collection->getData());
    //     exit;

   $data = $this->getRequest()->getParams();
   $date = $this->date->gmtDate();
  
   // Getting data to save in database
   $likecount=$data["like"];
    $dislikecount=$data["dislike"];
    $product_id=$data["product"];

     $product=$this->getProduct($product_id);//getting product name 
      $product_name=$product->getName(); //Get Product Name
      $customer_id= $this->_session->getCustomer()->getId();
      $customer_name=$this->_session->getCustomer()->getName(); 
      $customer_email=$this->_session->getCustomer()->getEmail(); 

     // set the data in table     
       $BlogModel->setProductId($product_id);
       $BlogModel->setProductName($product_name);
       $BlogModel->setCustomerId($customer_id);
       $BlogModel->setCustomerName($customer_name);
       $BlogModel->setCustomerEmail($customer_email);
         $BlogModel->setlikecount($likecount);
         $BlogModel->setdislikecount($dislikecount);
       $BlogModel->setcreated_at($date );


     
      //checking for already exist from database 
 $Idexist = $BlogModel->getCollection()
 ->addFieldToFilter('product_id',$product_id)
       ->addFieldToFilter('customer_id',$customer_id)->getFirstItem();
                //   var_dump($filterdata);
                //for updating the record with two fields 
 if ($Idexist->getData()){
        if (!empty($Idexist)){
              echo "already exist"; 
              $Idexist->setData('likecount',$likecount);
              $Idexist->setData('dislikecount',$dislikecount);
              $Idexist->save();
                 }
                }else{
                    $BlogModel->save();
                    echo "new record";
                   }
      //  $this->messageManager->addSuccess(__('Thanks for your opinion .'));
   
}
}
}


