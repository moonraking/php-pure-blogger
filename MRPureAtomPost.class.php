<?php

class MRPureAtomPost
{
    private $title = '';
    private $image = '';
    private $content = '';
    private $url = '';


    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle( $title )
    {
        $this->title = (string)strip_tags($title);
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage( $image )
    {
        $this->image = (string)$image;
    }


    public function getContent()
    {
        return $this->content;
    }
    public function setContent( $content )
    {
        //in here we want to strip all a's and images etc, only text
        $this->content = (string)strip_tags( $content );
    }

    public function getUrl()
    {
        return $this->url;
    }
    public function setUrl( $url )
    {
        $this->url = (string)$url;
    }

}
