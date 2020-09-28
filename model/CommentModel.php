<?php
class commentModel extends GenericModel
{
    private $commentId;
    private $commentDate; //date a laquelle le commentaire a été posté
    private $commentTitle; //titre (ou "Objet") du commentaire
    private $commentBody;
    private $commentStars; //evalutation qui va avec le commentaire (de 0 à 5 étoiles)
    private $userId; //l'id compte qui a posté le commentaire, permet de faire le lien pour obtenir le nom de la personne ayant posté

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Saves the comment into the database
     */
    public function saveComment($residneceid, $residentid, $residentName, $commentText, $stars){
        $request = parent::getConnexion()->prepare("CALL insert_comment_residence(?, ?, ?, ?, ?)");
        $request->execute(array($residneceid,
            $residentid,
            $residentName,
            $commentText,
            $stars));
    }

    //Getters & Setters ------------------------
    public function getCommentId()
    {
        return $this->commentId;
    }

    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    public function getCommentTitle()
    {
        return $this->commentTitle;
    }

    public function setCommentTitle($commentTitle)
    {
        $this->commentTitle = $commentTitle;
    }

    public function getCommentBody()
    {
        return $this->commentBody;
    }

    public function setCommentBody($commentBody)
    {
        $this->commentBody = $commentBody;
    }

    public function getCommentStars()
    {
        return $this->commentStars;
    }

    public function setCommentStars($commentStars)
    {
        $this->commentStars = $commentStars;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

}