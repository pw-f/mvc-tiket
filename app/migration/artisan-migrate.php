<?php

require "connection.php";
function runScript($script, $successMessage) {
    $output = [];
    $return_var = 0;
    exec("php $script", $output, $return_var);
    
    if ($return_var === 0) {
        echo "$successMessage\n";
    } else {
        echo "Error running $script. Return status: $return_var\n";
        echo "Output: " . implode("\n", $output) . "\n";
        exit(1);
    }
}

runScript('rollback.php', 'Rollback Success');

runScript('table.php', 'Berhasil Membuat Table!');

runScript('relations.php', 'Relasi Success');

runScript('seeders.php', 'Seeding Success');

?>