<?php

namespace ClickUp\Objects;

class Task extends AbstractObject
{
	/* @var string $text */
	private $text;

	/* @var array $attributes */
	private $attributes;

	/**
	 * @return int
	 */
	public function text()
	{
		return $this->text;
	}

	/**
	 * @return array
	 */
	public function attributes()
	{
		return $this->attributes;
	}

	/**
	 * @param $array
	 * @throws \Exception
	 */
	protected function fromArray($array)
	{
		$this->text = $array['text'];
		$this->attributes = $array['attributes'];
	}
}
