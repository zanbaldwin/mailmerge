<?php

    namespace MailMerge\Document\Provider;

    interface StackInterface extends ProviderInterface
    {

        /**
         * Push Provider onto Stack
         *
         * @access public
         * @param MailMerge\Document\Provider\ProviderInterface $provider
         * @return self
         */
        public function push(ProviderInterface $provider);

    }
