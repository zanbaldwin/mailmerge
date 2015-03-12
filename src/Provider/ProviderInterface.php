<?php

namespace MailMerge\Provider;

use MailMerge\Scenario\ScenarioInterface;

interface ProviderInterface
{

    /**
     * List Templates
     *
     * @access public
     * @return array<string>
     */
    public function list();

    /**
     * Get Template
     *
     * @access public
     * @param string $identifier
     * @return TemplateInterface
     */
    public function getTemplate($identifier);

    /**
     * Filter by Scenario
     *
     * @access public
     * @param ScenarioInterface $scenario
     * @return array<string>
     */
    public function filter(ScenarioInterface $scenario);

}
