<?php

class Post
{
    /**
     * @param integer $id
     * @param string $title
     * @param string $content
     */
    public function __construct($id = null, $title = '', $content = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
    
    /**
     * Echos the title for this post.
     *
     * @param $before
     * @param $after
     */
    public function the_title($before = '', $after = '')
    {
        echo $before . $this->title . $after;
    }
    
    /**
     * Echos the content for this post instance.
     */
    public function the_content()
    {
        echo $this->content;
    }
}

/**
 * Returns a set of posts.
 *
 * @param $id null
 * @return array
 */
function get_posts($id = null)
{
    if (is_null($id)) {
        $sql = 'SELECT * from posts';
    } else {
        $sql = sprintf('SELECT * from posts WHERE id = %d', $id);
    } 
    
    $posts = DB::query($sql);
    return create_posts($posts);
}

function create_posts($postArray)
{
    foreach ($postArray as $index => $post) {
       $postArray[$index] = new Post($post['id'], $post['title'], $post['content']); 
    }
    return $postArray;
}

/**
 * Tells us if we are in single page or not.
 *
 * @return bool
 */
function is_single_page()
{
    return isset($_GET['id']);
}

/**
 * Determine if a set of posts has any posts at all.
 * 
 * @param $posts
 * @return bool
 */
function has_posts($posts) {
    return count($posts) > 0;
}

/**
 * Get the comments for a single post.
 * 
 * @param $postId
 * @return array
 */
function get_comments($postId) {
    $sql = sprintf('SELECT * FROM comments WHERE post_id = %d', $postId);
    return DB::query($sql);
}






