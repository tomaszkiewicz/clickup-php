<?php

namespace ClickUp\Objects;

use ClickUp\Client;

class User extends AbstractObject
{
	/* @var int $id */
	private $id;

	/* @var string $username */
	private $username;

	/* @var string $color */
	private $color;

	/* @var string $profilePicture */
	private $profilePicture;

	/* @var string|null $initials */
	private $initials = null;

	/**
	 * @return int
	 */
	public function id()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function username()
	{
		return $this->username;
	}

	/**
	 * @return string
	 */
	public function color()
	{
		return $this->color;
	}

	/**
	 * @return string
	 */
	public function profilePicture()
	{
		return $this->profilePicture;
	}

	/**
	 * @return string|null
	 */
	public function initials()
	{
		return $this->initials;
	}

	/**
	 * @param array $array
	 */
	protected function fromArray($array)
	{
		$this->id = $array['id'];
		$this->username = $array['username'];
		$this->color = $array['color'];
		$this->profilePicture = $array['profilePicture'];
		$this->initials = isset($array['initials']) ? $array['initials'] : null;
	}

    public function jsonSerialize()
    {
    	parent::jsonSerialize();
        $vars = get_object_vars($this);
        return $vars;
    }
}
