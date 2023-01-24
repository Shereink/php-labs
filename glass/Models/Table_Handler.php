<?php

Class Table_Handler implements Db
{
  public $table;
  public $link;

  public function __construct($table_name)
  {
    $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $this->set_table($table_name);
  }

  public function set_table($table)
  {
    $this->table = $table;
  }

  public function select_record_by_id($id)
  {
    $query = "SELECT * FROM `{$this->table}` WHERE `id` = {$id}";
    return $this->query($query);
  }

  public function select_records($start)
  {
    $query = "SELECT * FROM `{$this->table}` LIMIT " . $start . "," . REC_PER_PAGE;
    return $this->query($query);
  }

  private function query($sql) 
  {
    $result = mysqli_query($this->link, $sql);
    $res = array();
    while($row = mysqli_fetch_array($result))
    {
      $res [] = $row;
    }
    if (count($res) === 1) return $res[0];
    else return $res;
  }
}