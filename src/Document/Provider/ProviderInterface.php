<?php

    namespace MailMerge\Document\Provider;

    interface ProviderInterface
    {

        public function getTemplateList(array $availablePlaceholders = null);

    }
