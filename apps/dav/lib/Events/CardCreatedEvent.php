<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2020, Georg Ehrke
 *
 * @author Georg Ehrke <oc.list@georgehrke.com>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\DAV\Events;

use OCP\EventDispatcher\Event;

/**
 * Class CardCreatedEvent
 *
 * @package OCA\DAV\Events
 * @since 20.0.0
 */
class CardCreatedEvent extends Event {

	/** @var int */
	private $addressBookId;

	/** @var string */
	private $cardUri;

	/** @var string */
	private $cardData;

	/**
	 * CardCreatedEvent constructor.
	 *
	 * @param int $addressBookId
	 * @param string $cardUri
	 * @param string $cardData
	 * @since 20.0.0
	 */
	public function __construct(int $addressBookId,
								string $cardUri,
								string $cardData) {
		parent::__construct();
		$this->addressBookId = $addressBookId;
		$this->cardUri = $cardUri;
		$this->cardData = $cardData;
	}

	/**
	 * @return int
	 * @since 20.0.0
	 */
	public function getAddressBookId(): int {
		return $this->addressBookId;
	}

	/**
	 * @return string
	 * @since 20.0.0
	 */
	public function getCardUri(): string {
		return $this->cardUri;
	}

	/**
	 * @return string
	 * @since 20.0.0
	 */
	public function getCardData(): string {
		return $this->cardData;
	}
}
