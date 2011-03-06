<?php
class Object implements Iterator, IteratorAggregate {

    private $obj;
    private $max;
    private $num;

    function __construct() {
    }
    
    function rewind() {
        $this->num = 0;
    }
    function valid() {
        return $this->num < $this->max;
    }
    function key() {
        return $this->num;
    }
    function current() {
        return $this->num . '-й';
    }
    function next() {
        $this->num++;
    }
    function getIterator() {
        return $this;
    }
}


$obj = new Object();

foreach ($obj as $key => $val) {
    echo "$key = $val\n";
}

$it = $obj->getIterator();
for ($it->rewind(); $it->valid(); $it->next()) {
    $val = $it->current();
    $key = $it->key();
    echo "$key = $val\n";
}
unset($it);
?> 