<?php

namespace TestBundle\Listener;

use PPI\Framework\Debug\ExceptionHandler;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $data = array(
            'error' => array(
                'code' => $exception->getCode(),
                'message' => $exception->getMessage()
            )
        );
        $handler = new ExceptionHandler(true, 'UTF-8', 'PPI Framework', '2.2', true);

        $status = ob_get_status();
        if (!empty($status)) {
            ob_clean();
        }

        $response = $handler->createResponse($exception);
        $event->setResponse($response);
    }
}