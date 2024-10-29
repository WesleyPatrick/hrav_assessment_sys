<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/controllers/EvaluationController.php';

$connect = new Connect();
$pdo = $connect->getConnection();
$controller = new EvaluationController($pdo);

if (isset($_GET['route'])) {
    switch ($_GET['route']) {
        case 'submit_evaluation':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($controller->submitEvaluation($_POST)) {
                    include __DIR__ . '/../src/views/evaluation/thank_you.php';
                } else {
                    echo "<p>Tente novamente</p>";
                }
            }
            break;

        case 'show_evaluation':
            $questions = $controller->showEvaluationForm();
            include __DIR__ . '/../src/views/evaluation/evaluation_form.php';
            break;

        default:
            include __DIR__ . '/../src/views/evaluation/start_evaluation.php';
    }
} else {
    include __DIR__ . '/../src/views/evaluation/start_evaluation.php'; 
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Evaluation</title>
    <link rel="stylesheet" href="assets/css/styles.css"> 
</head>
<body>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>
</html>
