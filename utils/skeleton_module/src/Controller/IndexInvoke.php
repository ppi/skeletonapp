<?php
namespace [MODULE_NAME]\Controller;

use [MODULE_NAME]\Controller\Shared as SharedController;
use Psr\Http\Message\RequestInterface;

class Index extends SharedController
{
    public function __invoke(RequestInterface $request)
    {
        return $this->render('[MODULE_NAME]:index:index.html.[TPL_ENGINE_EXT]');
    }
}
