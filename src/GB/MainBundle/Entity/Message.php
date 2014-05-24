<?php

namespace GB\MainBundle\Entity {

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Mapping\ClassMetadata;
    use Symfony\Component\Validator\Constraints as Assert;
    use GB\MainBundle\Model\MessageManager;
    use Silex\Application;

    /**
     * @\Doctrine\ORM\Mapping\Entity(repositoryClass="GB\MainBundle\Repository\MessageEntityRepository")
     */
    class Message
    {
        /**
         * @\Doctrine\ORM\Mapping\Id
         * @\Doctrine\ORM\Mapping\Column(type="integer")
         * @\Doctrine\ORM\Mapping\GeneratedValue
         */
        private $id;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="text")
         */
        private $userName;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="text")
         */
        private $email;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="text")
         */
        private $text;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="text", nullable=true)
         */
        private $homePage;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="integer", nullable=true)
         */
        private $creationDate;

        /**
         * @param string
         *
         * @return Message
         */
        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }

        /**
         * @param string
         *
         * @return Message
         */
        public function setUserName($userName)
        {
            $this->userName = $userName;

            return $this;
        }

        /**
         * @param string
         *
         * @return Message
         */
        public function setText($text)
        {
            $this->text = $text;

            return $this;
        }

        /**
         * @param string
         *
         * @return Message
         */
        public function setHomePage($homePage)
        {
            $this->homePage = $homePage;

            return $this;
        }

        /**
         * @param int
         *
         * @return Message
         */
        public function setCreationDate($creationDate)
        {
            $this->creationDate = $creationDate;

            return $this;
        }
        /**
         * @return string
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @return string
         */
        public function getUserName()
        {
            return $this->userName;
        }

        /**
         * @return string
         */
        public function getText()
        {
            return $this->text;
        }

        /**
         * @return string
         */
        public function getHomePage()
        {
            return $this->homePage;
        }

        /**
         * @return int
         */
        public function getCreationDate()
        {
            return $this->creationDate;
        }

        /**
         * @return string
         */
        public function getFormatCreationDate()
        {
            $date = date('d-m-Y', $this->creationDate);
            return $date;
        }

        static public function loadValidatorMetadata(ClassMetadata $metadata)
        {
            $metadata->addPropertyConstraint('userName', new Assert\NotBlank());

            $metadata->addPropertyConstraint('text', new Assert\NotBlank());

            $metadata->addPropertyConstraint('homePage', new Assert\Url());

            $metadata->addPropertyConstraint('email', new Assert\Email());
            $metadata->addPropertyConstraint('email', new Assert\NotBlank());
            $metadata->addPropertyConstraint('email', new Unique(array('field' => 'email')));
        }
    }
}