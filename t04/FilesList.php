<?php 
class FileList
{
    private $path;

    function __construct(string $path)
    {
        $this->path = $path;
        $this->fileArr = scandir($path);
        $this->fileArr = array_diff($this->fileArr, ['.',  '..']);
    }

    function getPath() : string
    {
        return $this->path;
    }
    
    function getFileArr() : array
    {
        return $this->fileArr;
    }

    function toList() : string
    {
        $strlist = "<ul>";
        foreach ($this->fileArr as $key => $value)
          $strlist .= '<li><a href="?file='.$value.'">'.$value.'</a></li>';
        
        $strlist .= "</ul>";

        return $strlist;
    }
}
