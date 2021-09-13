<?php
/**
*
* @package magento2
* @author Codilar Technologies
* @license https://opensource.org/licenses/OSL-3.0 Open Software License v. 3.0 (OSL-3.0)
* @link https://www.codilar.com/
*/
namespace Codilar\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Module\Manager;



//class Index extends \Magento\Framework\App\Action\Action
class Index extends Action{
    /**
     * @var PageFactory
     */
    private $pageFactory;

protected $moduleManager;
    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        Manager $moduleManager,
        PageFactory $pageFactory
    )
    {
        $this->moduleManager = $moduleManager;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }


    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        if ($this->moduleManager->isEnabled('Codilar_HelloWorld')){
            //die("Module is Enabled");
            $page = $this->pageFactory->create();
            return $page;
        }
 
    }
}
