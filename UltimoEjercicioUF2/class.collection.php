<?php
class KeyInUseException extends Exception {}

class KeyInvalidException extends Exception {}

class Collection {

  private $_members = array();    // collection members

  public function addItem($obj, $key = null) {
    if ($key !== null) {
      if ($this->exists($key)) {
        throw new KeyInUseException("Key \"$key\" already in use!");
      } else {
        $this->_members[$key] = $obj;
      }
    } else {
      $this->_members[] = $obj;
    }
  }

  public function removeItem($key) {
    if ($this->exists($key)) {
      unset($this->_members[$key]);
    } else {
      throw new KeyInvalidException("Invalid key \"$key\"!");
    }
  }

  public function getItem($key) {
    if ($this->exists($key)) {
      return $this->_members[$key];
    } else {
      throw new KeyInvalidException("Invalid key \"$key\"!");
    }
  }

  public function keys() {
    return array_keys($this->_members);
  }

  public function length() {
    return count($this->_members);
  }

  public function exists($key) {
    return isset($this->_members[$key]);
  }

  public function __toString() {
    $result = "Showing all elements in the collection:\n";
    foreach ($this->_members as $key => $value) {
      $result .= "Key: $key, Value: $value\n"; // __toString must be defined
    }
    return $result;
  }
}

?>