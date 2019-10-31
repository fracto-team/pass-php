<?php

namespace Fracto\PassPHP;

use Fracto\PassPHP\Exceptions\SubfolderIsNotDirectoryException;

class Pass
{
    public static $instance = null;

    protected $basePath = null;

    public static function instance($prefix = null)
    {
        if(self::$instance == null)
            self::$instance = new Pass();
        return self::$instance;
    }

    public function __construct()
    {

    }

    /**
     * @param $gpgId
     * @param null $subFolder
     * @throws SubfolderIsNotDirectoryException
     */
    public function init($gpgId, $subFolder = null)
    {
        $targetPath = $this->basePath.$subFolder;
        if($subFolder && file_exists($targetPath) && is_file($targetPath))
            throw new SubfolderIsNotDirectoryException();

        $gpgIdPath = $targetPath."/.gpg-id";

        // Todo: Set git

        mkdir($targetPath);
        touch($gpgIdPath);
        file_put_contents($gpgIdPath, $gpgId);
        $this->reEncryptPath($targetPath);
        $this->gitAddFile($targetPath, "Re-encrypt password store using new GPG id ".$gpgId);
    }

    protected function reEncryptPath($path)
    {

    }

    protected function gitAddFile($path, $commit)
    {

    }
}