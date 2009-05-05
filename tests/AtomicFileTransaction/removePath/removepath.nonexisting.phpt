--TEST--
PEAR2_Pyrus_AtomicFileTransaction::removePath(), path doesn't exist
--FILE--
<?php
define('MYDIR', __DIR__);
require dirname(__DIR__) . '/setup.empty.php.inc';

$atomic = PEAR2_Pyrus_AtomicFileTransaction::getTransactionObject(__DIR__ . '/testit/src');

PEAR2_Pyrus_AtomicFileTransaction::begin();

$test->assertFileNotExists(__DIR__ . '/testit/.journal-src/foo', 'before');
$atomic->removePath('foo');
$test->assertFileNotExists(__DIR__ . '/testit/.journal-src/foo', 'should still exist');

?>
===DONE===
--CLEAN--
<?php
$dir = __DIR__ . '/testit';
include __DIR__ . '/../../clean.php.inc';
?>
--EXPECT--
===DONE===