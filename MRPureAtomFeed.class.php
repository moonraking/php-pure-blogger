<?php 


class MRPureAtomFeed implements Iterator
{
    private $posts = null;
    private $url = '';


    private $position = 0;



    function __construct( $url )
    {
        $this->url = (string)$url;
        $this->posts = array();
        $this->position = 0;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->posts[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        return $this->posts[$this->position++];
    }

    public function valid() {
        return isset($this->posts[$this->position]);
    }

    public function refreshFeed()
    {
        //get the feeds xml file and have it as a simplexmlobject
        $xmlobj = simplexml_load_file( $this->url );

        foreach( $xmlobj->entry as $entry )
        {
            //print_r($entry);
            $post = new MRPureAtomPost();
            $post->setTitle( $entry->title );
            $post->setContent( $entry->content );
            //$post->setImage( $entry-> )
            $media = $entry->children('media', true)->attributes();
            $post->setUrl( ''.$media['url'] ); //force a string
            $this->posts[] = $post;
        }

        //var_dump($this->posts);

    }

}