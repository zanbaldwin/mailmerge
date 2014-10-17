<?php

    namespace MailMerge\Document\Provider;

    use MailMerge\Render\Placeholder\CollectionInterface as PlaceholderCollectionInterface;

    interface ProviderInterface
    {

        /**
         * Get: List of Document Templates
         *
         * @access public
         * @param MailMerge\Render\Placeholder\CollectionInterface $filter
         * @return array
         */
        public function getTemplateList(PlaceholderCollectionInterface $filter = null);

        /**
         * Get: Document Template
         *
         * @access public
         * @param mixed $identifier
         * @return MailMerge\Document\Template\TemplateInterface
         */
        public function getTemplate($identifier);

    }
