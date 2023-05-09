<?php
namespace Custom\Mymodule\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Custom\Mymodule\Model\ResourceModel\Pincode\CollectionFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|void
     * @throws LocalizedException
     */
    public function execute()
    {
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
    
        $pincode = $this->getRequest()->getParam('pincode');
        $data = ['success' => false];
        if (!empty($pincode)) {
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter('pincode', $pincode);
            $item = $collection->getFirstItem();
            if ($item->getId()) {
                $data = [
                    'success' => true,
                    'state' => $item->getState(),
                    'city' => $item->getCity(),
                ];
            }
        }
    
        $result->setData($data);
        return $result;
    }
    
}