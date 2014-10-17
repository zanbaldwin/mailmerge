<?php

    namespace MailMerge\Document\Provider;

    interface StackInterface extends ProviderInterface
    {

        public function push(ProviderInterface $provider);

    }
