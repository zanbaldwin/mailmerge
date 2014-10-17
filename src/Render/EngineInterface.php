<?php

    namespace MailMerge\Render;

    interface EngineInterface
    {

        /**
         * Constructor
         *
         * @access public
         * @param MailMerge\Render\Parser\ParserInterface $parser
         * @param MailMerge\Render\Generator\GeneratorInterface $generator
         * @return void
         */
        public function __construct(ParserInterface $parser, GeneratorInterface $generators);

        /**
         * Set: Template Parser
         *
         * @access public
         * @param MailMerge\Render\Parser\ParserInterface $parser
         * @return self
         */
        public function setParser(ParserInterface $parser);

        /**
         * Add: Document Generator
         *
         * @access public
         * @param MailMerge\Render\Generator\GeneratorInterface $generator
         * @return self
         */
        public function addGenerator(GeneratorInterface $generator);

    }
