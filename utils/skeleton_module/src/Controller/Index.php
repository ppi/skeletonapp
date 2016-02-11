<?php
namespace [MODULE_NAME]\Controller;

use [MODULE_NAME]\Controller\Shared as SharedController;
use PPI\Framework\Http\Request;

class Index extends SharedController
{
    public function indexAction(Request $request)
    {
        return $this->render('[MODULE_NAME]:index:index.html.[TPL_ENGINE_EXT]');
    }
}
