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
namespace DA\ProductExtend\Model;

use DA\ProductExtend\Api\Data\SalesInformationInterface;

/**
 * Class SalesInformation
 * @package DA\ProductExtend\Model
 */
class SalesInformation implements SalesInformationInterface
{

    /** @var  int */
    private $qty;

    /** @var  string */
    private $lastOrder;

    /** @var  int */
    private $productId;

    /** @var  array  */
    private $extenstionAttributes;


    public function setQty($qty)
    {
        $this->qty = $qty;
        return $this;
    }

    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @return string|void
     */
    public function getLastOrder()
    {
        $this->lastOrder;
    }

    /**
     * @param string $lastOrder
     * @return $this|SalesInformationInterface
     */
    public function setLastOrder($lastOrder)
    {
        $this->lastOrder = $lastOrder;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @inheritdoc
     */
    public function setProductId($id)
    {
        $this->productId = $id;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(
        \DA\ProductExtend\Api\Data\SalesInformationExtensionInterface $extensionAttributes
    )
    {
        $this->extenstionAttributes = $extensionAttributes;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        return $this->extenstionAttributes;
    }
}