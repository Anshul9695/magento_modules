<?php

   namespace jc\SuperHero\Controller\Adminhtml\allenquery;

   use Magento\Backend\App\Action;

   class Index extends \Magento\Backend\App\Action{

       /**
        * @var \Magento\Framework\View\Result\PageFactory
        */
       private $resultPageFactory;

       /**
        * @param \Magento\Backend\App\Action\Context $context
        * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
        */
       public function __construct(
           \Magento\Backend\App\Action\Context $context,
           \Magento\Framework\View\Result\PageFactory $resultPageFactory
       ) {
           parent::__construct($context);
           $this->resultPageFactory = $resultPageFactory;
       }

       public function execute(){
           return $resultPage = $this->resultPageFactory->create();

        //    $resultPage->setActiveMenu('[Vendor_Name]_[Namespace]::myadmingrid');
        //    $resultPage->getConfig()->getTitle()->prepend(__('My Admin Grid'));
        //    return $resultPage;
       }
   }