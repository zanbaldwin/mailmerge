<?php

    namespace MailMerge\Transformer;

    interface StackInterface extends TransformerInterface
    {

        /**
         * Push Transformer onto Stack
         *
         * @access public
         * @param MailMerge\Document\Transformer\TransformerInterface $transformer
         * @return self
         */
        public function push(TransformerInterface $transformer);

    }
