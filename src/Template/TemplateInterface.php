<?php

namespace MailMerge\Template;

interface TemplateInterface
{

    /**
     * Get Template Name
     *
     * @access public
     * @return string
     */
    public function getName();

    /**
     * Get Template Contents
     *
     * @access public
     * @return string
     */
    public function getBody();

    /**
     * Get Template Format (RFC 2045)
     *
     * @access public
     * @return string
     */
    public function getFormat();

}
