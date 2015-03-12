<?php

namespace MailMerge;

use MailMerge\Provider\ProviderInterface;
use MailMerge\Render\EngineInterface;
use MailMerge\Transformer\TransformerInterface;
use Doctrine\Common\Cache\Cache as DoctrineCacheInterface;

interface ManagerInterface
{

    /**
     * Set Providers
     *
     * @access public
     * @param MailMerge\Template\ProviderInterface $providers
     * @return void
     */
    public function setProviders(ProviderInterface $providers);

    /**
     * Set Render Engine
     *
     * @access public
     * @param MailMerge\Render\EngineInterface $renderer
     * @return void
     */
    public function setRenderer(EngineInterface $renderer);

    /**
     * Set Transformers
     *
     * @access public
     * @param MailMerge\Transformer\StackInterface $transformers
     * @return void
     */
    public function setTransformers(TransformerInterface $transformers);

    /**
     * Set Cache
     *
     * @access public
     * @param Doctrine\Common\Cache $cache
     * @return void
     */
    public function setCache(DoctrineCacheInterface $cache);

}
