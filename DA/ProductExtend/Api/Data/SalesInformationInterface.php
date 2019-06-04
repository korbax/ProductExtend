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

namespace DA\ProductExtend\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface SalesInformationInterface
 * @package DA\ProductExtend\Api\Data
 */
interface SalesInformationInterface extends ExtensibleDataInterface
{
    const LAST_ORDER = "last_order";

    const QTY = "qty";

    const PRODUCT_ID = "product_id";


    /**
     * @return string
     */
    public function getLastOrder();

    /**
     * @param string $lastOrder
     * @return self
     */
    public function setLastOrder($lastOrder);

    /**
     * @return int
     */
    public function getQty();

    /**
     * @param int $qty
     * @return self
     */
    public function setQty($qty);

    /**
     * Set Product Id for further updates
     *
     * @param int $id
     * @return self
     */
    public function setProductId($id);

    /**
     * Retrieve product id
     *
     * @return int
     */
    public function getProductId();

    /**
     * @return \DA\ProductExtend\Api\Data\SalesInformationExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \DA\ProductExtend\Api\Data\SalesInformationExtensionInterface $extensionAttributes
     * @return self
     */
    public function setExtensionAttributes
    (
        \DA\ProductExtend\Api\Data\SalesInformationExtensionInterface $extensionAttributes
    );
}