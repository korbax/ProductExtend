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

namespace DA\ProductExtend\Plugin\Catalog\Model;

use Magento\Catalog\Api\Data\ProductExtensionFactory;
use Magento\Framework\EntityManager\EntityManager;
use DA\ProductExtend\Api\SalesInformationProviderInterface;
use Magento\Framework\Registry;

/**
 * Class ProductPlugin
 * @package DA\ProductExtend\Plugin\Catalog\Model
 */
class ProductPlugin
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * ProductPlugin constructor.
     * @param ProductExtensionFactory $productExtensionFactory
     * @param EntityManager $entityManager
     * @param SalesInformationProviderInterface $salesInformationProvider
     * @param Registry $registry
     */
    public function __construct(
        ProductExtensionFactory $productExtensionFactory,
        EntityManager $entityManager,
        SalesInformationProviderInterface $salesInformationProvider,
        Registry $registry
    ) {
        $this->productExtensionFactory = $productExtensionFactory;
        $this->entityManager = $entityManager;
        $this->salesInformationProvider = $salesInformationProvider;
        $this->registry = $registry;

    }

    /**
     * @param $subject
     * @param $result
     * @return \DA\ProductExtend\Api\Data\SalesInformationInterface
     */
    public function afterGetSalesInformation($subject, $result)
    {
        $product = $this->registry->registry('productObj');
        $result = $this->addSalesInformation($product);

        return $result;
    }

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return \DA\ProductExtend\Api\Data\SalesInformationInterface
     */
    private function addSalesInformation(\Magento\Catalog\Api\Data\ProductInterface $product)
    {
        $extensionAttributes = $product->getExtensionAttributes();

        if (empty($extensionAttributes)) {
            $extensionAttributes = $this->productExtensionFactory->create();
        }
        $externalLinks = $this->salesInformationProvider->getSalesInformation($product->getId());
        $extensionAttributes->setSalesInformation($externalLinks);
        $product->setExtensionAttributes($extensionAttributes);

        return $externalLinks;
    }
}