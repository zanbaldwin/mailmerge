<?php

    class MailMerge
    {

        /**
         * Load A Library Class
         *
         * Perform checks to make sure only local library classes are loaded,
         * and the class file exists within the library path.
         *
         * @static
         * @access public
         * @param string $class
         * @return void
         */
        public static function load($class)
        {
            $psr4 = 'MailMerge\\';
            if(substr($class, 0, strlen($psr4)) !== $psr4) {
                return;
            }

            $root = rtrim(realpath(__DIR__ . '/../src'), '/') . '/';
            $file = str_replace('\\', '/', substr($class, strlen($psr4))) . '.php';
            if(is_readable($filepath = $root . $file)) {
                include $filepath;
            }
        }

        /**
         * Register Autoloader
         *
         * Register an autoloader for Nosco's Experian library.
         *
         * @static
         * @access public
         * @return boolean
         */
        public static function registerAutoloader()
        {
            return spl_autoload_register(array('MailMerge', 'load'));
        }

    }

    // Add the MailMerge autoloader method to PHP's SPL Autoloader.
    MailMerge::registerAutoloader();
