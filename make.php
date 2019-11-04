#!/usr/bin/env php
<?php
$srcRoot = 'src';
$buildRoot = 'build';
try {
    $phar = new Phar($buildRoot . '/main.phar',FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, 'main.phar');
    $phar['main.php'] = file_get_contents($srcRoot . '/main.php');
    $phar['class.php'] = file_get_contents($srcRoot . '/class.php');
    $phar->compressFiles(Phar::BZ2);
    $phar->setSignatureAlgorithm(Phar::SHA1, sha1('Cvar1984'));
    $phar->setStub( "#!/usr/bin/env php\n".$phar->createDefaultStub('main.php'));
    chmod($buildRoot.'/main.phar',0777);
}
catch(Exception $e)
{
    echo $e->xdebug_message;
}
