<?php

interface Db 
{
  public function set_table($table);
  public function select_record_by_id($id);
  public function select_records($start);
}