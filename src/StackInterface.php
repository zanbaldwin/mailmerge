<?php

namespace MailMerge;

interface StackInterface
{

    /**
     * Push Object to Stack
     *
     * @access public
     * @throws InvalidArgumentException
     * @param object $object
     * @return self
     */
    public function push($object);

    /**
     * Pop Object from Stack
     *
     * @access public
     * @throws InvalidArgumentException
     * @param object|string $object
     * @return self
     */
    public function pop($object);

    /**
     * List Objects in Stack
     *
     * @access public
     * @return array
     */
    public function listStack();

}
