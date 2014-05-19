<?php

namespace GB\MainBundle\Model {


    /**
     * @Entity
     */
    class Article
    {

        /**
         * @Id @Column(type="integer")
         * @GeneratedValue
         */
        private $id;

        /** @Column(type="text") */
        private $content;

    }
}