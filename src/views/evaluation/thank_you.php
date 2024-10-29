<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado</title>
    <link rel="stylesheet" href="/hrav_assessment_sys/public/assets/css/styles.css">
</head>
<body>

<div class="thank-you-container">
    <h1 class="thank-you-title">Obrigado!</h1>
    <p class="thank-you-message">Sua avaliação é importante para nós e nos ajuda a melhorar continuamente nossos serviços.</p>
    <p class="thank-you-timer">Você será redirecionado para a tela inicial em <span id="countdown">5</span> segundos...</p>
    
    <div class="progress-container">
        <div id="progress-bar" class="progress-bar"></div>
    </div>
</div>


<script>
        let countdown = 5;
        let progressBarWidth = 100;

        function startCountdown() {
            const countdownElement = document.getElementById("countdown");
            const progressBarElement = document.getElementById("progress-bar");

            const interval = setInterval(() => {
                countdown--;
                progressBarWidth -= 20;
                countdownElement.innerText = countdown;
                progressBarElement.style.width = progressBarWidth + "%";

                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = "/hrav_assessment_sys/public/index.php";
                }
            }, 1000);
        }

        window.onload = startCountdown;
    </script>
</body>
</html>
