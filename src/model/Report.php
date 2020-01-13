<?php

namespace App\src\model;

class Report

{

	private $idReport;

	private $contentReport;

	private $dateAdded;

	private $commentID;

    private $comment;



    /**
     * @return mixed
     */
    public function getIdReport()
    {
        return $this->idReport;
    }

    /**
     * @param mixed $idReport
     */
    public function setIdReport($idReport)
    {
        $this->idReport = $idReport;
    }

        /**
     * @return mixed
     */
    public function getContentReport()
    {
        return $this->contentReport;
    }

    /**
     * @param mixed $contentReport
     */
    public function setContentReport($contentReport)
    {
        $this->contentReport = $contentReport;
    }

        /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @param mixed $dateAdded
     */
    public function setDate($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

        /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param mixed $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

        /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
    }
}

