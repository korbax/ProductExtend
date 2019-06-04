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
namespace DA\ProductExtend\Api;

/**
 * Interface SalesInformationProviderInterface
 * @package DA\ProductExtend\Api
 */
interface SalesInformationProviderInterface
{
    /**
     * @param int $productId
     * @return \DA\ProductExtend\Api\Data\SalesInformationInterface
     */
    public function getSalesInformation($productId);
}