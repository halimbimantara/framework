<?php

namespace Kraken\Runtime\Command\Container;

use Kraken\Runtime\Command\Command;
use Kraken\Command\CommandInterface;

class ContainerDestroyCommand extends Command implements CommandInterface
{
    /**
     * @param mixed[] $params
     * @return mixed
     */
    protected function command($params = [])
    {
        return $this->runtime->destroy();
    }
}