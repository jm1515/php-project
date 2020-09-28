<?php
require_once("model/CommentModel.php");
require_once("view/ResidenceDetailsView.php");
class CommentController extends GenericController
{
    function __construct() {
        parent::__construct(new CommentModel(), new ResidenceDetailsView());
    }

    public function show() {
        $this->getView()->show();
    }

    public function postComment(){
        if (isset($_POST['commentText']) && isset($_POST['residence'])){
            $comment = $_POST['commentText'];
            $residenceid = $_POST['residence'];
            parent::getModel()->saveComment($residenceid,
                $_SESSION['userinfo']['resident_id'],
                $_SESSION['userinfo']['resident_firstname'].' '.$_SESSION['userinfo']['resident_lastname'],
                $comment
                , $_POST['rating']);
        }
        header("Location: index.php?page=ResidenceDetails&residence=".$residenceid);
        exit(0);
    }
}