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
	public function __construct(Client $client, $array, $teamId)
	{
		parent::__construct($client, $array);
		foreach ($this as $comment) {
			$comment->setTeamId($teamId);
		}
	}

	/**
	 * @return string
	 */
	protected function objectClass()
	{
		return Comment::class;
	}
}
