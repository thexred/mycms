<?php
interface IInPlugin
{
	public function getFileExt ();
	public function loadByFile ($in_path);
	public function loadByUrl ($in_url);
}