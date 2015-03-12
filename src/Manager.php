<?php

    namespace MailMerge;

    use MailMerge\Provider\ProviderInterface as Provider;
    use MailMerge\Render\EngineInterface as Engine;
    use MailMerge\Transformer\TransformerInterface as Transformer;
    use Doctine\Common\Cache\Cache;

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
         * Constructor
         *
         * @access public
         * @param MailMerge\Document\Provider\ProviderInterface $providers
         * @param MailMerge\Render\EngineInterface $renderer
         * @param MailMerge\Transformer\TransformerInterface $transformers
         * @param Doctrine\Common\Cache\Cache $cache
         * @return void
         */
        public function __construct(Provider $providers, Engine $renderer, Transformer $transformers = null, Cache $cache = null)
        {
            $this->setProviders($providers);
            $this->setRenderer($renderer);
            is_object($transformers) && $this->setTransformers($transformers);
            is_object($cache) && $this->setCache($cache);
        }

        /**
         * Set: Template Provider
         *
         * @access public
         * @param Provider $provider
         * @return self
         */
        public function setProviders(Provider $provider)
        {
            $this->providers->push($provider);
            return $this;
        }

        /**
         * Set: Render Engine
         *
         * @access public
         * @param Engine $renderer
         * @return self
         */
        public function setRenderer(Engine $renderer)
        {
            $this->renderer = $renderer;
            return $this;
        }

        /**
         * Set: Transformer
         *
         * @access public
         * @param Transformer $transformer
         * @return self
         */
        public function setTransformers(Transformer $transformer)
        {
            $this->transformers = $transformer;
            return $this;
        }

        /**
         * Set: Cache Component
         *
         * @access public
         * @param Cache $cache
         * @return self
         */
        public function setCache(Cache $cache)
        {
            $this->cache = $cache;
            return $this;
        }

    }
