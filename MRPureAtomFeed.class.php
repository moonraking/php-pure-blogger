<?php 
class MRPureAtomFeed
{
    private $posts = null;
    private $url = '';
    function __construct( $url )
    {
        $this->url = (string)$url;
        $this->posts = array();
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