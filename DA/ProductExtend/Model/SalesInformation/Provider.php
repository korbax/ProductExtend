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

namespace DA\ProductExtend\Model\SalesInformation;

use DA\ProductExtend\Api\SalesInformationProviderInterface;
use DA\ProductExtend\Model\ResourceModel\SalesInformation\Loader;
use Magento\Framework\EntityManager\EntityManager;
use DA\ProductExtend\Model\SalesInformationFactory;
use DA\ProductExtend\Model\SalesInformation;

/**
 * Class Provider
 * @package DA\ProductExtend\Model\SalesInformation
 */
class Provider implements SalesInformationProviderInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var Loader
     */
    private $loader;

    /**
     * @var SalesInformation
     */
    private $salesInformation;

    /**
     * @var string|null
     */
    private $orderStatus;

    /**
     * Provider constructor.
     * @param EntityManager $entityManager
     * @param Loader $loader
     * @param SalesInformation $salesInformation
     * @param null $orderStatus
     * @param array $salesInformationArray
     */
    public function __construct
    (
        EntityManager $entityManager,
        Loader $loader,
        SalesInformation $salesInformation,
        $orderStatus = null
    ) {
        print '<br/><b>__construct Provider</b>';

        $this->entityManager = $entityManager;
        $this->loader = $loader;
        $this->salesInformation = $salesInformation;
        $this->orderStatus = $orderStatus;
    }

    /**
     * @param int $productId
     * @return array|\DA\ProductExtend\Api\Data\SalesInformationInterface
     */
    public function getSalesInformation($productId)
    {
        print '<br/><b>getSalesInformation($productId) Provider</b>';

        $salesInformation = [
            'qty' => $this->loader->getIdsByProductId($productId, $this->orderStatus),
            'last_order' => $this->loader->getLastOrder($productId)
        ];

        return $salesInformation;
    }
}