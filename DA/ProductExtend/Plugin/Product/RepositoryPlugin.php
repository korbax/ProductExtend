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

namespace DA\ProductExtend\Plugin\Product;

use Magento\Catalog\Api\Data\ProductExtensionFactory;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\EntityManager\EntityManager;
use DA\ProductExtend\Api\SalesInformationProviderInterface;
use Magento\Framework\Registry;

/**
 * Class RepositoryPlugin
 * @package DA\ProductExtend\Plugin\Product
 */
class RepositoryPlugin
{
    /** @var ProductExtensionFactory */
    private $productExtensionFactory;

    /** @var  EntityManager */
    private $entityManager;

    /** @var SalesInformationProviderInterface */
    private $salesInformationProvider;

    private $registry;

    /**
     * RepositoryPlugin constructor.
     * @param ProductExtensionFactory $productExtensionFactory
     * @param EntityManager $entityManager
     * @param SalesInformationProviderInterface $salesInformationProvider
     */
    public function __construct(
        ProductExtensionFactory $productExtensionFactory,
        EntityManager $entityManager,
        SalesInformationProviderInterface $salesInformationProvider,
        Registry $registry
    )
    {
        $this->productExtensionFactory = $productExtensionFactory;
        $this->entityManager = $entityManager;
        $this->salesInformationProvider = $salesInformationProvider;
        $this->registry = $registry;
    }

    /**
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $subject
     * @param ProductInterface $product
     * @return ProductInterface
     */
    public function afterGet
    (
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $product
    ) {

        $this->registry->register('productObj', $product);

        return $product;
    }
}