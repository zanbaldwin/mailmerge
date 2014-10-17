<?php

    namespace MailMerge\Render\Generator;

    interface StackInterface extends GeneratorInterface
    {

        public function push(GeneratorInterface $generator);

    }
