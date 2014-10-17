<?php

    namespace MailMerge;

    use MailMerge\Document\Provider\ProviderInterface;
    use MailMerge\Render\EngineInterface as RenderEngineInterface;
    use MailMerge\Transformer\TransformerInterface;
    use Doctrine\Common\Cache\Cache as DoctrineCacheInterface;
    use MailMerge\Render\Parser\ParserInterface;
    use MailMerge\Render\Generator\GeneratorInterface;

    interface ManagerInterface
    {

        /**
         * Constructor
         *
         * @access public
         * @param MailMerge\Document\Provider\ProviderInterface $providers
         * @param MailMerge\Render\EngineInterface $renderer
         * @param MailMerge\Transformer\TransformerInterface $transformers
         * @param Doctrine\Common\Cache\Cache $cache
         * @return void
         */
        public function __construct(
            ProviderInterface $providers,
            RenderEngineInterface $renderer,
            TransformerInterface $transformers = null,
            DoctrineCacheInterface $cache = null
        );

        /**
         * Add: Document Template Provider
         *
         * @access public
         * @param MailMerge\Document\Provider\ProviderInterface $provider
         * @return self
         */
        public function addProvider(ProviderInterface $provider);

        /**
         * Set: Render Engine
         *
         * @access public
         * @param MailMerge\Render\EngineInterface $renderer
         * @return self
         */
        public function setRenderer(RenderEngineInterface $renderer);

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

        /**
         * Add: Transformer
         *
         * @access public
         * @param MailMerge\Transformer\TransformerInterface $transformer
         * @return self
         */
        public function addTransformer(TransformerInterface $transformer);

    }
