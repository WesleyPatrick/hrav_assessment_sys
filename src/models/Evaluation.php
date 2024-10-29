<?php

class Evaluation
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getQuestions()
    {
        $stmt = $this->db->prepare("SELECT * FROM questions WHERE status = TRUE ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveResponse($data)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO evaluations (sector_id, question_id, device_id, score, feedback_text) VALUES (:sector_id, :question_id, :device_id, :score, :feedback_text)");
            $stmt->bindParam(':sector_id', $data['sector_id']);
            $stmt->bindParam(':question_id', $data['question_id']);
            $stmt->bindParam(':device_id', $data['device_id']);
            $stmt->bindParam(':score', $data['score']);
            $stmt->bindParam(':feedback_text', $data['feedback_text']);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Exibe erro de depuração
            echo "Error saving to database: " . $e->getMessage();
            return false;
        }
    }
}

