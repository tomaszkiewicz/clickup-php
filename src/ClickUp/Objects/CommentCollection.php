<?php

namespace ClickUp\Objects;

use ClickUp\Client;

/**
 * @method Comment   getByKey(int $spaceId)
 * @method Comment   getByName(string $spaceName)
 * @method Comment[] objects()
 * @method Comment[] getIterator()
 */
class CommentCollection extends AbstractObjectCollection
{
	public function __construct(Client $client, $array)
	{
		parent::__construct($client, $array);
	}

	/**
	 * @return string
	 */
	protected function objectClass()
	{
		return Comment::class;
	}
}
