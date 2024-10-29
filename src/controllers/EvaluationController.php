<?php

require_once __DIR__ . '/../models/Evaluation.php';

class EvaluationController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Evaluation($db);
    }

    public function showEvaluationForm(): mixed
    {
        return $this->model->getQuestions();
    }

    public function submitEvaluation($data)
    {

        foreach ($data['responses'] as $questionId => $score) {
            $feedback = isset($data['feedback'][$questionId]) ? $data['feedback'][$questionId] : null;
            $response = [
                'sector_id' => 1, 
                'question_id' => $questionId,
                'device_id' => 1, 
                'score' => $score,
                'feedback_text' => $feedback,
            ];
            if (!$this->model->saveResponse($response)) {

                echo "<p>Erro ao salvar a resposta da questão: $questionId</p>";
                return false;
            }
        }
        return true;
    }
}

