<?php
/* Representa a entidade Nota */
class Note
{
    public $id;
    public $title;
    public $content;
    public $created_at;

    public function __construct($id = null, $title = null, $content = null, $created_at = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at;
    }
}
