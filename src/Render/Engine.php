<?php

    namespace MailMerge\Render;

    class Engine
    {

        /**
         * @access protected
         * @var MailMerge\Render\Parser\ParserInterface $parser
         */
        protected $parser;

        /**
         * @access protected
         * @var MailMerge\Render\Generator\GeneratorInterface $generator
         */
        protected $generators;

        /**
         * Constructor
         *
         * @access public
         * @param MailMerge\Render\Parser\ParserInterface $parser
         * @param MailMerge\Render\Generator\GeneratorInterface $generators
         * @return void
         */
        public function __construct(ParserInterface $parser, GeneratorInterface $generators)
        {
            $this->parser = $parser;
            $this->generators = (new GeneratorStack)->push($generators);
        }

        /**
         * Set: Template Parser
         *
         * @access public
         * @param MailMerge\Render\Parser\ParserInterface $parser
         * @return self
         */
        public function setParser(ParserInterface $parser)
        {
            $this->parser = $parser;
            return $this;
        }

        /**
         * Add: Document Generator
         *
         * @access public
         * @param MailMerge\Render\Generator\GeneratorInterface $generator
         * @return self
         */
        public function addGenerator(GeneratorInterface $generator)
        {
            $this->generators->push($generator);
            return $this;
        }

    }
