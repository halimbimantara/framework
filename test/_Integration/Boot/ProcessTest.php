<?php

namespace Kraken\_Integration\Boot;

use Kraken\_Integration\Boot\_Mock\RuntimeContainerMock;
use Kraken\Framework\Runtime\Boot\ProcessBoot;
use Kraken\Test\TModule;
use Composer\Autoload\ClassLoader;

class ProcessTest extends TModule
{
    /**
     *
     */
    public function testCaseProcess_DoesNotThrowException_WhenBooted()
    {
        if (ini_get('allow_url_include') !== '1')
        {
            return;
        }

        global $loader;
        $loader = $this->getMock(ClassLoader::class, [], [], '', false);

        $dataPath = realpath(__DIR__ . '/../../../') . '/data';
        $process  = (new ProcessBoot)
            ->controller(
                RuntimeContainerMock::class
            )
            ->constructor([
                'undefined',
                'alias',
                'name'
            ])
            ->boot(
                $dataPath
            );

        $process
            ->destroy();

        unset($process);
    }
}
