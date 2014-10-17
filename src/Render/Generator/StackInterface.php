<?php

    namespace MailMerge\Render\Generator;

    interface StackInterface extends GeneratorInterface
    {

        /**
         * Push Generator onto Stack
         *
         * @access public
         * @param MailMerge\Render\Generator\GeneratorInterface $generator
         * @return self
         */
        public function push(GeneratorInterface $generator);

    }
