<?php
class File
{
    private $path;

    function __construct(string $fileName)
    {
        $this->path = $fileName;
    }

    function write(string $str)
    {
        fwrite(fopen($this->path, "w+"), $str);
    }

    function toList() : string
    {
        return file_get_contents($this->path);
    }

    function delete()
    {
        if(!file_exists($this->path)) return;
        unlink($this->path);
    }
}
