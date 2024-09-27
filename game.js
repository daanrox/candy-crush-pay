function toggleDisplay(el, show) {
    el.style.display = show ? '' : 'none';
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes < 10 ? '0' : ''}${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
}

function updateTimer(el, seconds) {
    if (configGame.stateGame) {
        el.innerText = formatTime(seconds);
    }
}

function startTimer(el, seconds) {
    updateTimer(el, seconds);
    const timerInterval = setInterval(() => {
        seconds--;
        if (seconds <= 20) {
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

const configGame = {
    stateGame: true,
    value: 0,
    currentValue: 0,
    timer: 90,
    meta: () => typeGame === 'real' ? configGame.value * 3 : configGame.value * 20
};

function setText(el, value) {
    el.innerText = value;
}

const els = {
    currentRound: () => document.querySelector(`#round-1`),
    currentPoints: () => document.querySelector(`#round-1 .currentPoint`),
    currentMeta: () => document.querySelector(`#round-1 .currentMeta`),
    currentTimer: () => document.querySelector(`#round-1 .currentTimer`)
};

function updatePoints(coin = 7) {
    const currentPoints = els.currentPoints();
    const percent = typeGame === 'real' ? 50 : 5;
    const point = ((coin / percent) * configGame.value).toFixed(2);
    configGame.currentValue = (Number(point) + Number(configGame.currentValue)).toFixed(2);
    currentPoints.innerText = configGame.currentValue;

    if (+currentPoints.innerText >= configGame.meta()) {
        execGreen();
    }
}

function execGreen() {
    if (configGame.stateGame && configGame.currentValue >= configGame.meta()) {
        configGame.stateGame = false;
        const postUrl = typeGame === 'real' ? "../auth?action=game&type=win" : (typeGame === 'demo' ? '../e-wallet-deposit?type=demo&value=' : '../register?type=demo&value=');
        const msg = `Parabéns, você ganhou R$ ${configGame.currentValue}!`;

        if (typeGame === 'real') {
            $.post(postUrl, { session, bet: configGame.value, val: configGame.currentValue }, () => {
                location.href = `../panel?type=win&msg=${msg}`;
            });
        } else {
            window.location.replace(postUrl + configGame.currentValue);
        }
    }
}

function execRed() {
    if (configGame.stateGame) {
        configGame.stateGame = false;
        const postUrl = typeGame === 'real' ? "../auth?action=game&type=loss" : (typeGame === 'demo' ? '../e-wallet-deposit?type=demo&value=' : '../register?type=demo&value=');
        const msg = 'Que pena, não foi dessa vez!';

        if (typeGame === 'real') {
            $.post(postUrl, { session, bet: configGame.value }, () => {
                location.href = `../panel?type=erro&msg=${msg}`;
            });
        } else {
            window.location.replace(postUrl + configGame.currentValue);
        }
    }
}

function loadGame() {
    const currentMeta = els.currentMeta();
    const currentTimer = els.currentTimer();
    
    toggleDisplay(els.currentRound(), true);
    setText(currentMeta, configGame.meta().toFixed(2));
    startTimer(currentTimer, configGame.timer);
}

window.addEventListener('load', () => {
    const container = document.querySelector('#containerFormBet');
    const inpBet = document.querySelector('#valueBet');
    const btnStart = document.querySelector('#startGame');

    btnStart.addEventListener('click', () => {
        if (+inpBet.value > balance && typeGame === 'real') {
            alert("Valor da aposta acima do saldo em conta!");
        } else {
            toggleDisplay(container, false);
            configGame.value = +inpBet.value;
            loadGame();
        }
    });
});
