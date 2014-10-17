<?php

    namespace MailMerge;

    interface ManagerInterface
    {

        public function setPlaceholderObjectCallback(\Closure $callback);

    }
