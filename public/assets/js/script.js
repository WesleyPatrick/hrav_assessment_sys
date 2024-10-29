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
