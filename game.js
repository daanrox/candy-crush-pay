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
    meta: () => { return typeGame == 'real' ? configGame.value * 3 : configGame.value * 20; }
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
    var percent = typeGame == 'real'? 50 : 5;
    var point = (coin / percent) * configGame.value;
    var calc = (Number(point) + Number(configGame.currentValue)).toFixed(2);
    configGame.currentValue = calc;
    currentPoints.innerText = calc;
    if(+currentPoints.innerText >= configGame.meta()) {
      execGreen();
    }
}
function execGreen() {
    if(configGame.stateGame && configGame.currentValue >= configGame.meta()) {
      configGame.stateGame = false;
      if (typeGame == 'real') {
        $.post("../auth?action=game&type=win",{ session: session, bet: configGame.value, val: configGame.currentValue },function (data) {
          let msg = 'Parabens, você ganhou R$ ' + configGame.currentValue + '!';
          location.href = "../panel?type=win&msg=" + msg;
        });
      }else if(typeGame == 'demo'){
          window.location.replace('../e-wallet-deposit?type=demo&value=' + configGame.currentValue);
      }else if(typeGame == 'presell') {
          window.location.replace('../register?type=demo&value=' + configGame.currentValue);
      }
    }
}
function execRed() {
    if(configGame.stateGame) {
      configGame.stateGame = false;
      if(typeGame == 'real') {
          var msg_loss = 'Que pena, não foi dessa vez!';
          $.post("../auth?action=game&type=loss", { session: session, bet: configGame.value }, function (data) {
                  location.href = "../panel?type=erro&msg=" + msg_loss;
              });
      }else if(typeGame == 'demo'){
          window.location.replace('../e-wallet-deposit?type=demo&value=' + configGame.currentValue);
      }else if(typeGame == 'presell') {
          window.location.replace('../register?type=demo&value=' + configGame.currentValue);
      }
    }
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