#!/usr/bin/php
<?php
class Table {
    function Table() {
        $this->name = "VW";
    }
}
// create an object
$herbie = new Table();

// show object properties
echo $herbie->name . "\n";
?>
