<?php

namespace ClickUp\Objects;

use ClickUp\Client;

/**
 * @method CommentContent   getByKey(int $spaceId)
 * @method CommentContent   getByName(string $spaceName)
 * @method CommentContent[] objects()
 * @method CommentContent[] getIterator()
 */
class CommentContentCollection extends AbstractObjectCollection
{
	public function __construct(Client $client, $array, $teamId)
	{
		parent::__construct($client, $array);
		foreach ($this as $comment_content) {
			$comment_content->setTeamId($teamId);
		}
	}

	/**
	 * @return string
	 */
	protected function objectClass()
	{
		return CommentContent::class;
	}
}
