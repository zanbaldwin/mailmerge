<?php

    namespace MailMerge;

    use MailMerge\Document\Provider\ProviderInterface;
    use MailMerge\Render\EngineInterface as RenderEngineInterface;
    use MailMerge\Transformer\TransformerInterface;
    use Doctine\Common\Cache\Cache as DoctrineCacheInterface;
    use MailMerge\Render\Placeholder\Collection as PlaceholderCollection;
    use MailMerge\Render\Parser\ParserInterface;
    use MailMerge\Render\Generator\GeneratorInterface;
    use MailMerge\Transformer\TransformerInterface;
    use MailMerge\Render\Placeholder\CollectionInterface as PlaceholderCollectionInterface;

    class Manager implements ManagerInterface
    {

        /**
         * @access protected
         * @var MailMerge\Document\Provider\ProviderInterface $providers
         */
        protected $providers;

        /**
         * @access protected
         * @var MailMerge\Render\EngineInterface $renderer
         */
        protected $renderer;

        /**
         * @access protected
         * @var MailMerge\Transformer\TranformerInterface $transformers
         */
        protected $transformers;

        /**
         * @access protected
         * @var Doctrine\Common\Cache\Cache $cache
         */
        protected $cache;

        /**
         * @access protected
         * @var Closure $callback
         */
        protected $callback;

        /**
         * @access protected
         * @var MailMerge\Render\Placeholder\CollectionInterface $persistant
         */
        protected $persistant;

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
        ) {
            // Set class properties from method arguments.
            $this->providers = (new ProviderStack)->push($providers);
            $this->renderer = $renderer;
            $this->transformers = (new TransformerStack)->push($transformers);
            $this->cache = $cache;
            // Set the initial placeholder callback.
            $this->callback = function(array $placeholders) {
                return new PlaceholderCollection($placeholders);
            };
        }

        /**
         * Add: Document Template Provider
         *
         * @access public
         * @param MailMerge\Document\Provider\ProviderInterface $provider
         * @return self
         */
        public function addProvider(ProviderInterface $provider)
        {
            $this->providers->push($provider);
            return $this;
        }

        /**
         * Set: Render Engine
         *
         * @access public
         * @param MailMerge\Render\EngineInterface $renderer
         * @return self
         */
        public function setRenderer(RenderEngineInterface $renderer)
        {
            $this->renderer = $renderer;
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
            $this->renderer->setParser($parser);
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
            $this->renderer->addGenerator($generator);
            return $this;
        }

        /**
         * Add: Transformer
         *
         * @access public
         * @param MailMerge\Transformer\TransformerInterface $transformer
         * @return self
         */
        public function addTransformer(TransformerInterface $transformer)
        {
            $this->transformers->push($transformer);
        }

        /**
         * Set: Placeholder Collection Callback
         *
         * @access public
         * @param Closure $callback
         * @return self
         */
        public function setPlaceholderCallback(\Closure $callback)
        {
            $this->placeholderCallback = $callback;
        }

        /**
         * Create Placeholder Collection from Array
         *
         * @access protected
         * @param array $placeholders
         * @return MailMerge\Render\Placeholder\CollectionInterface
         */
        protected function createPlaceholderCollection(array $placeholders)
        {
            return call_user_func($this->callback, $placeholders);
        }

        /**
         * Set: Persistant Placeholder Collection
         *
         * @access public
         * @param MailMerge\Render\Placeholder\CollectionInterface $placeholders
         * @return self
         */
        public function setPersistantPlaceholders(PlaceholderCollectionInterface $placeholders)
        {
            $this->persistant = $placeholders;
        }

    }
