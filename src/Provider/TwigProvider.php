<?php

namespace MailMerge\Provider;

class TwigProvider implements ProviderInterface
{

    /**
     * @access protected
     * @var string
     */
    protected $directory;

    /**
     * @access protected
     * @var array<TemplateInterface>
     */
    protected $templates = [];

    /**
     * Constructor
     *
     * @access public
     * @param string $directory
     * @return void
     */
    public function __construct($directory)
    {
        if(!is_dir($this->directory = realpath($directory))) {
            throw new \InvalidArgumentException('The path provided is not a valid directory.');
        }
    }

    /**
     * List Templates
     *
     * @access public
     * @return array<string>
     */
    public function list()
    {
        $contents = array_filter(scandir($this->directory), function($value) {
            return preg_match('/\\.twig$/', $value) && is_file($this->directory . '/' . $value);
        });
        array_walk($contents, function($value) {
            $value = preg_replace('/\\.twig$/', '', $value);
        });
        return $contents;
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
        if(!isset($this->templates[$identifier])) {
            $filepath = $this->directory . '/' . $identifier . '.twig';
            $this->template[$identifier] = file_exists($filepath) && is_readable($filepath)
                ? new Template($identifier, file_get_contents($filepath))
                : false;
        }
        // Return the template cached in this class, but if there is no template (cached as false) we return null rather
        // than a different data-type than what is expected (TemplateInterface).
        return $this->templates[$identifier] ?: null;
    }

    /**
     * Filter by Scenario
     *
     * @access public
     * @param ScenarioInterface $scenario
     * @return array<string>
     */
    public function filter(ScenarioInterface $scenario)
    {
    }

}
