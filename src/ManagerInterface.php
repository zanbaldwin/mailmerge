<?php

    namespace MailMerge;

    use MailMerge\Document\Provider\ProviderInterface;
    use MailMerge\Render\EngineInterface as RenderEngineInterface;
    use MailMerge\Transformer\TransformerInterface;
    use Doctrine\Common\Cache\Cache as DoctrineCacheInterface;
    use MailMerge\Render\Generator\GeneratorInterface;
    use MailMerge\Render\Parser\ParserInterface;
    use MailMerge\Render\Placeholder\CollectionInterface as PlaceholderCollectionInterface;

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
         * Set: Placeholder Collection Callback
         *
         * @access public
         * @param Closure $callback
         * @return self
         */
        public function setPlaceholderCallback(\Closure $callback);

        /**
         * Set: Persistant Placeholder Collection
         *
         * @access public
         * @param MailMerge\Render\Placeholder\CollectionInterface $placeholders
         * @return self
         */
        public function setPersistantPlaceholders(PlaceholderCollectionInterface $placeholders);

        /**
         * Add: Document Template Provider
         *
         * @access public
         * @param MailMerge\Document\Provider\ProviderInterface $provider
         * @return self
         */
        public function addProvider(ProviderInterface $provider);

        /**
         * Add: Transformer
         *
         * @access public
         * @param MailMerge\Transformer\TransformerInterface $transformer
         * @return self
         */
        public function addTransformer(TransformerInterface $transformer);

        /**
         * Set: Render Engine
         *
         * @access public
         * @param MailMerge\Render\EngineInterface $renderer
         * @return self
         */
        public function setRenderer(RenderEngineInterface $renderer);

        /**
         * Add: Document Generator
         *
         * @access public
         * @param MailMerge\Render\Generator\GeneratorInterface $generator
         * @return self
         */
        public function addGenerator(GeneratorInterface $generator);

        /**
         * Set: Template Parser
         *
         * @access public
         * @param MailMerge\Render\Parser\ParserInterface $parser
         * @return self
         */
        public function setParser(ParserInterface $parser);

    }
