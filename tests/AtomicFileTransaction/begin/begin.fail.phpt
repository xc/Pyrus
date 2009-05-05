--TEST--
PEAR2_Pyrus_AtomicFileTransaction::begin(), journal dir exists as file
--FILE--
<?php
define('MYDIR', __DIR__);
require dirname(__DIR__) . '/setup.empty.php.inc';

touch(__DIR__ . '/testit/.journal-src');

$atomic = PEAR2_Pyrus_AtomicFileTransaction::getTransactionObject(__DIR__ . '/testit/src');

try {
    PEAR2_Pyrus_AtomicFileTransaction::begin();
} catch (PEAR2_Pyrus_AtomicFileTransaction_Exception $e) {
    $test->assertEquals('Unable to begin transaction', $e->getMessage(), 'main message');
    $causes = array();
    $e->getCauseMessage($causes);
    $test->assertEquals('unrecoverable transaction error: journal path ' .
                        __DIR__ . DIRECTORY_SEPARATOR . 'testit' . DIRECTORY_SEPARATOR .
                        '.journal-src exists and is not a directory', $causes[0]['message'], 'error message');
}
?>
===DONE===
--CLEAN--
<?php
$dir = __DIR__ . '/testit';
include __DIR__ . '/../../clean.php.inc';
?>
--EXPECT--
===DONE===