<?php

namespace App\Services;

class BookSearch {
  protected $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function find($title, $exactMatch = false, $onlyTitles = true)
  {
    $items = [];
    foreach($this->data as $item) {
      if (($exactMatch && strcasecmp($item->title, $title) == 0) || stripos($item->title, $title) !== false)  {
        $items[] = $onlyTitles ? $item->title : $item;
      }
    }

    return $items;
  }
}
