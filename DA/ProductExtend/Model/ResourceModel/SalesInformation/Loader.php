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
namespace DA\ProductExtend\Model\ResourceModel\SalesInformation;

use Magento\Framework\App\ResourceConnection;
use Magento\Sales\Model\ResourceModel\Order\Item\CollectionFactory;

/**
 * Class Loader
 * @package DA\ProductExtend\Model\ResourceModel\SalesInformation
 */
class Loader
{
    /** @var  ResourceConnection\ */
    private $resourceConnection;

    /**
     * @var CollectionFactory
     */
    private $itemCollection;

    /**
     * @var array
     */
    private $salesInformationData;

    /**
     * Loader constructor.
     * @param ResourceConnection $resourceConnection
     * @param CollectionFactory $itemCollection
     * @param array $salesInformationData
     */
    public function __construct
    (
        ResourceConnection $resourceConnection,
        CollectionFactory $itemCollection,
        array $salesInformationData = []
    ) {
        print '<br/><b>__construct Loader</b>';
        $this->resourceConnection = $resourceConnection;
        $this->itemCollection = $itemCollection;
        $this->salesInformationData = $salesInformationData;
    }

    /**
     * @param $productId
     * @param null $status
     * @return mixed|null
     */
    public function getIdsByProductId($productId, $status = null)
    {
        print '<br/><b>getIdsByProductId($productId, $status = null) Loader</b>';
        if ($collection = $this->getCollection($productId, $status)) {
            return $collection->getFirstItem()->getData('total_sale');
        }

        return null;
    }

    /**
     * @param $productId
     * @param null $status
     * @return \Magento\Sales\Model\ResourceModel\Order\Item\Collection|null
     */
    private function getCollection($productId, $status = null)
    {
        print '<br/><b>getCollection($productId, $status = null) Loader</b>';
        if (!$productId) {
            return null;
        }

        $collection =  $this->itemCollection->create()
            ->join(
                ['sales_order' => 'sales_order'],
                'main_table.order_id = sales_order.entity_id',
                'status'
            )
            ->addFieldToSelect(['order_id', 'product_id']);

        if (isset($status)) {
            $collection->addAttributeToFilter('status', ['eq' => $status]);
        }

        $collection->addAttributeToFilter('product_id', ['eq' => $productId])
            ->addExpressionFieldToSelect('total_sale', 'SUM({{qty_ordered}})', 'qty_ordered');

        return $collection;
    }

    /**
     * @param $productId
     * @return |null
     */
    public function getLastOrder($productId)
    {
        print '<br/><b>getLastOrder($productId) Loader</b>';

        if ($productId) {
            return $this->itemCollection->create()
                ->addFieldToFilter('product_id', $productId)
                ->getLastItem()
                ->getCreatedAt();
        }

        return null;
    }
}