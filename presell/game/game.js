function hideDiv(el) {
  el.style.display = 'none';
}
function showDiv(el) {
  el.style.display = '';
}

/******************* TIMER CONFIG ******************/
function updateTimer(el, seconds) {
  if(configGame.stateGame) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
    const formattedSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
    el.innerText = formattedMinutes + ':' + formattedSeconds;
  }
}
function startTimer(el, seconds) {
  updateTimer(el, seconds);
  const timerInterval = setInterval(function () {
    seconds--;
    if(seconds <= 20) {
        el.style.color = 'red';
        el.style.fontSize = '28px';
    }
    if (seconds <= 0) {
      clearInterval(timerInterval);
      execRed();
    }
    updateTimer(el, seconds);
  }, 1000);
}

/******************* GAME CONFIG  *********************/
const configGame = {
  stateGame: true,
  value: '',
  currentValue: 0,
  timer: typeGame == 'real' ? 90 : 90,
  meta: () => { return typeGame == 'real' ? configGame.value * 10 : configGame.value * 10; }
}
function setText(el, value) {
  el.innerText = value;
}
const els = {
  currentRound: () => {
    return  document.querySelector(`#round-1`);
  },
  currentPoints: () => {
    return  document.querySelector(`#round-1 .currentPoint`);
  },
  currentMeta: () => {
    return  document.querySelector(`#round-1 .currentMeta`);
  },
  currentTimer: () => {
    return document.querySelector(`#round-1 .currentTimer`);
  }
}
function extTriggerPoints(coin = 7) {
  var currentPoints = els.currentPoints();
  var percent = typeGame == 'real'? 60 : 5;
  var point = (coin / percent) * configGame.value;
  var calc = (Number(point) + Number(configGame.currentValue)).toFixed(2);
  configGame.currentValue = calc;
  currentPoints.innerText = calc;
  if(currentPoints.innerText >= configGame.meta()) {
    execGreen();
  }
}
function execGreen() {
  

    var betValue = configGame.currentValue;
    var currentPoints = els.currentPoints();
    
    sessionStorage.setItem('betValue', betValue)

    // Cria um formulário dinamicamente
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', `/presell/win.php?msg=${Number(currentPoints.innerText)}`);

    // Cria um input hidden para enviar o parâmetro 'bet'
    var betInput = document.createElement('input');
    betInput.setAttribute('type', 'hidden');
    betInput.setAttribute('name', 'bet');
    betInput.setAttribute('value', betValue);

    // Adiciona o input ao formulário
    form.appendChild(betInput);

    // Adiciona o formulário à página
    document.body.appendChild(form);

    // Submete o formulário
    form.submit();
}
function execRed() {
    
    console.log(configGame.value)
    var betValue = configGame.value;
    var currentPoints = els.currentPoints();
    sessionStorage.setItem('betValue', betValue)

    // Cria um formulário dinamicamente
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', `/presell/loss.php?msg=${configGame.meta()}`);

    // Cria um input hidden para enviar o parâmetro 'bet'
    var betInput = document.createElement('input');
    betInput.setAttribute('type', 'hidden');
    betInput.setAttribute('name', 'bet');
    betInput.setAttribute('value', betValue);

    // Adiciona o input ao formulário
    form.appendChild(betInput);

    // Adiciona o formulário à página
    document.body.appendChild(form);

    // Submete o formulário
    form.submit();
   
}

function loadGame() {
  var currentRound = els.currentRound();
  var currentMeta = els.currentMeta();
  var currentTimer = els.currentTimer();
  
  currentRound.style.display = '';
  setText(currentMeta, configGame.meta().toFixed(2));
  startTimer(currentTimer, configGame.timer);
}

window.addEventListener('load', (event) => {
  var container = document.querySelector('#containerFormBet');
  var inpBet   = document.querySelector('#valueBet');
  var btnStart = document.querySelector('#startGame');
  btnStart.addEventListener('click', () => {
    if(+inpBet.value > balance && typeGame == 'real') {
      alert("Valor da aposta acima do saldo em conta!");
    }else{
      hideDiv(container);
      configGame.value = +inpBet.value;
      loadGame();
    }
  });
});