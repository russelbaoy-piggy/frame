<?php

namespace Frame\Request;

class Post extends Foundation implements RequestInterface
{

    protected $post = [];

    /*
     * POST values are simply stored as object properties - unsanitized!
     */
    public function __construct(\Frame\Core\Context $context)
    {

        parent::__construct($context);

        $this->type = 'Post';
        $this->post = $_POST;

    }

    /*
     * Return all properties as an array
     */
    public function toArray()
    {

        return $this->post;

    }

    /*
     * Magic getter method maps requests to the protected $post property
     */
    public function __get($property)
    {

        return (isset($this->post[$property]) ? $this->post[$property] : null);

    }

    /*
     * Magic isset method maps requests to the protected $post property
     */
    public function __isset($property)
    {

        return isset($this->post[$property]);

    }

}
