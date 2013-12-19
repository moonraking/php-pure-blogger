<?php
require_once('MRPureAtomPost.class.php');
require_once('MRPureAtomFeed.class.php');

$feed_serial_file = 'feed.ser';
$time_out = 10;//in seconds
$feed_url = 'http://mr-pure-blogger.blogspot.com/feeds/posts/default?alt=atom';

//here we will read the last time the feed.ser file was accessed, if more then 15 miniuts ago, refresh the feed and write out
if( file_exists($feed_serial_file)  && (time() - filectime($feed_serial_file) ) > $time_out )
{
    echo "$feed_serial_file needs a refresh";
    // get an rss feed and display it
    $feed = new MRPureAtomFeed( $feed_url );
    $feed->refreshFeed();

    //dump the feed to disk
    file_put_contents($feed_serial_file, serialize($feed));
}else
{
    echo "$feed_serial_file does NOT need a refresh";
    $feed = unserialize( file_get_contents($feed_serial_file) );
}

echo "<pre>";
print_r( $feed );
echo "</pre>";

