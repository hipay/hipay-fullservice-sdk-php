<?php
/**
 * HiPay Fullservice SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */
namespace HiPay\Fullservice\Gateway\Model;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Security Settings Model
 * 
 * @package HiPay\Fullservice
 * @author Etienne Landais <elandais@hipay.com>
 * @copyright Copyright (c) 2018 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SecuritySettings extends AbstractModel
{
	/**
	 * @var string hash algorithm used for signature
	 */
	private $hashingAlgorithm;

	/**
	 * SecuritySettings constructor.
	 * @param string $hashingAlgorithm
	 */
	public function __construct($hashingAlgorithm)
	{
		$this->hashingAlgorithm = $hashingAlgorithm;
	}

	/**
	 * @return string
	 */
	public function getHashingAlgorithm()
	{
		return $this->hashingAlgorithm;
	}

	/**
	 * @param string $hashingAlgorithm
	 */
	public function setHashingAlgorithm($hashingAlgorithm)
	{
		$this->hashingAlgorithm = $hashingAlgorithm;
	}

}
