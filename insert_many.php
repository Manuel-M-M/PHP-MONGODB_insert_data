<?php

$mongoManager = new \MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
//$mongoQuery = new \MongoDB\Driver\Query([]);

$insertArray = [];
$startTime = microtime(true);
$bulkWrite = new \MongoDB\Driver\BulkWrite();
for ($i = 0; $i < 1000000; ++$i) {
    $insertArray = [
        //'_id' => new \MongoDB\BSON\ObjectID(),
        'col1' => md5(uniqid(null, true)),
        'col2' => 'Data '.$i,
        'col3' => 'Data '.$i,
        'col4' => 'Data '.$i,
        'col5' => 'Data '.$i,
        'col6' => 'Data '.$i,
        'col7' => 'Data '.$i,
        'col8' => 'Data '.$i,
        'col9' => 'Data '.$i,
        'col10' => 'Data '.$i,
    ];
    $bulkWrite->insert($insertArray);

    if (0 == $i % 1000) {
        echo '.';
    }
}
$mongoManager->executeBulkWrite('testing.acollection', $bulkWrite);
$endTime = microtime(true);
echo 'done!'.PHP_EOL;
echo 'Taken time: '.($endTime - $startTime).' secs.'.PHP_EOL;