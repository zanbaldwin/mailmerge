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
            if(substr($class, 0, 10) !== 'MailMerge\\') {
                return;
            }
            $library_root = realpath(__DIR__ . DIRECTORY_SEPARATOR);
            $file = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, 10)) . '.php';
            $file = realpath($library_root . DIRECTORY_SEPARATOR . $file);
            if(substr($file, 0, strlen($library_root)) == $library_root) {
                if(is_readable($file)) {
                    include $file;
                }
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

    // Add the PHPerian autoloader method to the PHP's SPL Autoloader.
    MailMerge::registerAutoloader();
