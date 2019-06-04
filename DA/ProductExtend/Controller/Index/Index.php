<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magecom.net so we can send you a copy immediately.
 *
 * @category DA
 *
 * @author A. Drobot
 * @copyright Copyright 2019 Proplazma, Inc. (http://www.proplazma.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace DA\ProductExtend\Controller\Index;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Registration;
use Magento\Framework\App\Action\Action;
use Magento\Catalog\Api\ProductRepositoryInterface;

/**
 * Class Index
 * @package DA\ProductExtend\Controller\Index
 */
class Index extends Action
{
    /**
     * @var Registration
     */
    protected $registration;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ProductRepositoryInterface $productRepository
    ){
        parent::__construct($context);

        $this->resultPageFactory = $resultPageFactory;
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        if ($sku = $this->getRequest()->getParam('sku', false)) {
            try {
                $product = $this->productRepository->get($sku);

                if ($product) {
                    foreach ($product->getData() as $k => $v) {
                        if (is_scalar($k) && is_scalar($v)) {
                            print "<br/>\n" . $k . ': ' . $v;
                        }
                    }

                    if ($this->getRequest()->getParam('extensionAttributes', false) == 'show') {
                        $salesInformation = $product->getExtensionAttributes()->getSalesInformation();
                        var_dump($salesInformation);
                    }
                }
            } catch (\Exception $exception) {
                print 'Product not found.';
            }
        }
    }
}
