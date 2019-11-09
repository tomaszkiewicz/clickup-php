<?php

namespace ClickUp\Objects;

class Comment extends AbstractObject
{
	/* @var string $id */
	private $id;
	
	/* @var array $comment */
	private $comment;
	
	/* @var string $comment_text */
	private $comment_text;
	
	/* @var TeamMember $user */
	private $user;
	
	/* @var string $date */
	private $date;

	/**
	 * @return int
	 */
	public function id()
	{
		return $this->id;
	}

	/**
	 * @return array
	 */
	public function comment()
	{
		return $this->comment;
	}

	/**
	 * @return string
	 */
	public function comment_text()
	{
		return $this->comment_text;
	}

	/**
	 * @return TeamMember
	 */
	public function user()
	{
		return $this->user;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function date()
	{
		return $this->date;
	}

	/**
	 * @see https://jsapi.apiary.io/apis/clickup/reference/0/task/edit-task.html
	 * @param array $body
	 * @return array
	 */
	public function edit($body)
	{
		return $this->client()->put(
			"task/{$this->id()}",
			$body
		);
	}

	/**
	 * @param $array
	 * @throws \Exception
	 */
	protected function fromArray($array)
	{
		$this->id = $array['id'];
		$this->comment = $array['comment'];
		$this->comment_text = $array['comment_text'];
		$this->user = new User(
			$this->client(),
			$array['user']
		);
		$this->date = $this->getDate($array, $array['date']);
	}

	/**
	 * @param $array
	 * @param $key
	 * @return \DateTimeImmutable|null
	 * @throws \Exception
	 */
	private function getDate($array, $key)
	{
		if(!isset($array[$key])) {
			return null;
		}
		$unixTime = substr($array[$key], 0, 10);
		return new \DateTimeImmutable("@$unixTime");
	}
}
