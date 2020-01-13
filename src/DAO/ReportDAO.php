<?php

namespace App\src\DAO;

use App\src\model\Report;
use App\src\model\Comment;

class ReportDAO extends DAO
{
	public function getReport()
	{
		$sql = 'SELECT * FROM Report JOIN Comment WHERE Comment.idComment = Report.commentId ORDER BY idReport DESC';
        $result = $this->sql($sql);
        $reports = [];
        foreach ($result as $row) {
            $reportId = $row['idReport'];
            $reports[$reportId] = $this->buildObject($row);
        }
        return $reports;		
	}

	public function addReport($report)
	{
		extract($report);
		$contentReport = htmlspecialchars($_POST['contentReport']);
		$sql = 'INSERT INTO Report (contentReport, dateAdded, commentId) VALUES (?, NOW(), ?)';
		$this->sql($sql,[$contentReport, $commentId]);
	}

	public function deleteReport($idReport)
	{
		$sql = 'DELETE FROM Report WHERE idReport = ?';
		$this->sql($sql,[$idReport]);
	}


	private function buildObject(array $row)
	{
		$report = new Report();
		$report->setIdReport($row['idReport']);
		$report->setContentReport($row['contentReport']);
		$report->setDate($row['dateAdded']);
		$report->setCommentId($row['commentId']);
		$comment = new Comment();
		$comment->setIdComment($row['idComment']);
		$comment->setContent($row['content']);
		$report->setComment($comment);
		return $report;

	}

}