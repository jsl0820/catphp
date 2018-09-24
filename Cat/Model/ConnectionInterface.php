<?php
namespace Cat\Model;

interface ConnectionInterface {

	public function table();

	public function insert();

	public function find();

	public function delete();

	public function update();

	public function where();

	public function inWhere();

	public function orWhere();

	public function andWhere();

	public function leftJoin();

	public function rightJoin();

	public function get();

	public function query();

}
