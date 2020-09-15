<?php

namespace ClickUp\Objects;

use ClickUp\Client;
use JsonSerializable;

abstract class AbstractObject implements JsonSerializable
{
    /* @var Client $client */
	private $client;

	/* @var array $extra */
	private $extra;

	/**
	 * @param Client $client
	 * @param array  $array
	 */
	public function __construct(Client $client, $array)
	{
		$this->setClient($client);
		$this->fromArray($array);
		$this->setExtra($array);
	}

	abstract protected function fromArray($array);

	/**
	 * @return Client
	 */
	protected function client()
	{
		return $this->client;
	}

	private function setClient(Client $client)
	{
		$this->client = $client;
	}

	private function setExtra($array)
	{
		$this->extra = $array;
	}

	public function extra()
	{
		return $this->extra;
	}

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
