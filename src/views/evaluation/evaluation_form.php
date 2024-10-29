<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Serviços - HRAV</title>
    <link rel="stylesheet" href="/public/assets/css/styles.css">
</head>
<body>

<div class="form-container" role="main" aria-labelledby="form-title">
    <h1 id="form-title">Avaliação de Serviços</h1>
    <p id="form-description">Sua avaliação é anônima; nenhuma informação pessoal é solicitada ou armazenada.</p>

    <form id="evaluationForm" action="/hrav_assessment_sys/public/index.php?route=submit_evaluation" method="POST" aria-describedby="form-description">
        <?php if (!empty($questions)): ?>
            <?php foreach ($questions as $index => $question): ?>
                <div class="step" role="region" aria-labelledby="question-title-<?= $index ?>" aria-describedby="form-description">
                    <div class="question-container">
                        <label id="question-title-<?= $index ?>" for="rating-<?= $index ?>-0"><?= htmlspecialchars($question['text']) ?></label>
                        <div class="rating-group" role="radiogroup" aria-labelledby="question-title-<?= $index ?>">
                            <?php for ($i = 0; $i <= 10; $i++): ?>
                                <input type="radio" name="responses[<?= $question['id'] ?>]" id="rating-<?= $index ?>-<?= $i ?>" value="<?= $i ?>" required aria-label="Nota <?= $i ?>" tabindex="0">
                                <label for="rating-<?= $index ?>-<?= $i ?>" class="rating-btn" data-value="<?= $i ?>"><?= $i ?></label>
                            <?php endfor; ?>
                        </div>
                        <div class="feedback-container">
                            <label for="feedback-<?= $question['id'] ?>">Feedback Adicional (opcional):</label>
                            <textarea name="feedback[<?= $question['id'] ?>]" id="feedback-<?= $question['id'] ?>" placeholder="Deixe seu comentário aqui" aria-label="Feedback adicional"></textarea>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Não há perguntas disponíveis para avaliação.</p>
        <?php endif; ?>

        <div class="form-navigation">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)" tabindex="0" aria-label="Botão Anterior" style="display: none;">Anterior</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)" tabindex="0" aria-label="Botão Próximo">Próximo</button>
            <button type="submit" id="submitBtn" style="display: none;" tabindex="0" aria-label="Botão Enviar">Enviar</button>
        </div>
    </form>
</div>

<script>
    let currentStep = 0;
    showStep(currentStep);

    function showStep(n) {
        const steps = document.querySelectorAll(".step");
        steps.forEach(step => step.style.display = "none");
        steps[n].style.display = "block";

        document.getElementById("prevBtn").style.display = n === 0 ? "none" : "inline";
        document.getElementById("nextBtn").style.display = n === (steps.length - 1) ? "none" : "inline";
        document.getElementById("submitBtn").style.display = n === (steps.length - 1) ? "inline" : "none";
    }

    function nextPrev(n) {
        const steps = document.querySelectorAll(".step");
        steps[currentStep].style.display = "none";
        currentStep += n;

        if (currentStep >= steps.length) {
            document.getElementById("evaluationForm").submit();
            return false;
        }

        showStep(currentStep);
    }
</script>
</body>
</html>
