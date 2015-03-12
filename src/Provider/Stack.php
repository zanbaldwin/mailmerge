<?php

namespace MailMerge\Provider;

use MailMerge\StackInterface;

class Stack implements StackInterface, ProviderInterface
{

    const DIVIDER = '::';

    /**
     * @access protected
     * @var array<ProviderInterface>
     */
    protected $providers = [];

    /**
     * Push Provider to Stack
     *
     * @access public
     * @param ProviderInterface $provider
     * @return self
     */
    public function push($provider)
    {
        if(!$provider instanceof ProviderInterface) {
            throw new \InvalidArgumentException('The object pushed to the stack is not an instance of ProviderInterface.');
        }
        if(!isset($this->providers[$provider->getName()])) {
            $this->providers[$provider->getName()] = $provider;
        }
        elseif(spl_object_hash($provider) !== spl_object_hash($this->providers[$provider->getName()])) {
            throw new ProviderConflictException($provider);
        }
        return $this;
    }

    /**
     * Pop Provider from Stack
     *
     * @access public
     * @param ProviderInterface|string $provider
     * @return ProviderInterface
     */
    public function pop($provider)
    {
        if($provider instanceof ProviderInterface) {
            $provider = $provider->getName();
        }
        if(!is_string($provider)) {
            throw new \InvalidArgumentException('The object to pop is not a valid identifier or ProviderInterface instance.');
        }
        $instance = $this->providers[$provider];
        unset($this->providers[$provider]);
        return $instance;
    }

    /**
     * List Providers in Stack
     *
     * @access public
     * @return array
     */
    public function listStack()
    {
        return array_keys($this->providers);
    }

    /**
     * List Templates
     *
     * @access public
     * @return array
     */
    public function list()
    {
        $list = [];
        foreach($providers as $provider) {
            $list = array_merge($list, array_walk($provider->list(), function(&$value) use ($provider) {
                $value = $provider->getName() . static::DIVIDER . $value;
            }));
        }
        return $list;
    }

    /**
     * Get Template
     *
     * @access public
     * @param string $identifier
     * @return TemplateInterface
     */
    public function getTemplate($identifier)
    {
        if(($pos = strpos($identifier, static::DIVIDER)) !== false) {
            $provider = substr($identifier, 0, $pos);
            $template = substr($identifier, $pos + strlen(static::DIVIDER));
            return isset($this->providers[$provider])
                ? $this->providers[$provider]->getTemplate($template)
                : null;
        }
    }

    /**
     * Filter by Scenario
     *
     * @access public
     * @param ScenarioInterface $scenario
     * @return array
     */
    public function filter(ScenarioInterface $scenario)
    {
        $list = [];
        foreach($providers as $provider) {
            $list = array_merge($list, array_walk($provider->filter($scenario), function(&$value) use ($provider) {
                $value = $provider->getName() . static::DIVIDER . $value;
            }));
        }
        return $list;
    }

}
