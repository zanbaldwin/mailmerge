<?php

    namespace MailMerge\Transformer;

    interface StackInterface extends TransformerInterface
    {

        public function push(TransformerInterface $transformer);

    }
