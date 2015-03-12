<?php

namespace MailMerge\Provider;

class ProviderConflictException extends \DomainException
{

    /**
     * Constructor
     *
     * @access public
     * @param ProviderInterface $provider
     * @param integer $code
     * @param Exception $previous
     * @return void
     */
    public function __construct(ProviderInterface $provider, $code = 0, \Exception $previous = null)
    {
        $message = sprintf('Two or more providers have the same, non-unique identifier: "%s".', $provider->getName());
        parent::__construct($message, $code, $exception);
    }

}
