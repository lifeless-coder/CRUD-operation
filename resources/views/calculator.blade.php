<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Simple Calculator</title>
  <style>
    :root{
      --bg:#0f1724;
      --panel:#0b1220;
      --accent:#7c3aed;
      --muted:#94a3b8;
      --glass: rgba(255,255,255,0.04);
      --key-bg:#0b1220;
      --key-hover: rgba(255,255,255,0.03);
      --op-bg: #111827;
      --text:#e6eef8;
      --danger:#ef4444;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      background: radial-gradient(1200px 600px at 10% 10%, rgba(124,58,237,0.12), transparent),
                  radial-gradient(900px 400px at 90% 90%, rgba(14,165,233,0.06), transparent),
                  var(--bg);
      color:var(--text);
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
    }

    .calculator {
      width: min(420px, 96vw);
      border-radius:18px;
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      box-shadow: 0 10px 30px rgba(2,6,23,0.6), inset 0 1px 0 rgba(255,255,255,0.02);
      padding:20px;
      display:flex;
      flex-direction:column;
      gap:18px;
      border:1px solid rgba(255,255,255,0.03);
    }

    .brand{
      display:flex;
      align-items:center;
      gap:12px;
    }
    .logo{
      width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,var(--accent),#06b6d4);
      display:flex;align-items:center;justify-content:center;font-weight:700;color:white;box-shadow:0 6px 16px rgba(124,58,237,0.2);
      font-size:18px;
    }
    .brand h1{font-size:16px;margin:0}
    .brand p{margin:0;font-size:12px;color:var(--muted)}

    .display{
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border-radius:12px;padding:14px 16px;display:flex;flex-direction:column;gap:6px;
      border:1px solid rgba(255,255,255,0.02);
    }
    .display .prev{font-size:14px;color:var(--muted);min-height:18px;word-break:break-all}
    .display .curr{font-size:32px;font-weight:600;text-align:right;word-break:break-all}

    .pad{
      display:grid;grid-template-columns:repeat(4,1fr);gap:12px;
    }
    button.key{
      background:var(--key-bg);border:1px solid rgba(255,255,255,0.02);padding:14px;border-radius:10px;font-size:18px;color:var(--text);
      cursor:pointer;box-shadow:0 6px 10px rgba(2,6,23,0.45);transition:transform .06s ease, background .08s ease;
      user-select:none;
    }
    button.key:active{transform:translateY(2px)}
    button.key:hover{background:var(--key-hover)}
    button.op{background:linear-gradient(180deg,var(--op-bg), rgba(255,255,255,0.02));font-weight:600}
    button.ac{background:linear-gradient(180deg,#111827,#0b1220);color:var(--danger)}
    button.equal{grid-column: span 2;background:linear-gradient(90deg,var(--accent),#06b6d4);box-shadow:0 8px 22px rgba(124,58,237,0.28);font-weight:700}

    .small{font-size:14px;padding:10px}

    @media (max-width:420px){
      .display .curr{font-size:28px}
      button.key{padding:12px;font-size:16px}
    }

    footer{font-size:12px;color:var(--muted);text-align:center}
  </style>
</head>
 
<body>
  <main class="calculator" role="application" aria-label="Simple calculator">
    <div class="brand">
      <div class="logo">+−×</div>
      <div>
        <h1>Simple Calculator</h1>
        <p>Keyboard support • Responsive • Accessible</p>
      </div>
    </div>

    <div class="display" aria-live="polite">
      <div id="prev" class="prev" aria-hidden="false">0</div>
      <div id="curr" class="curr" role="textbox" aria-label="calculator display" tabindex="0">0</div>
    </div>

    <section class="pad" role="group" aria-label="calculator keypad">
      <button class="key ac small" data-action="all-clear" aria-label="All clear" onclick="cleardisplay()">AC</button>
      <button class="key small" data-action="toggle-sign" aria-label="Toggle sign">±</button>
      <button class="key small" data-action="percent" aria-label="Percent">%</button>
      <button class="key op" data-action="operator" data-value="/" aria-label="Divide" onclick="appendToDisplay('/')">÷</button>

      <button class="key" data-action="digit" data-value="7" onclick="appendToDisplay('7')">7</button>
      <button class="key" data-action="digit" data-value="8" onclick="appendToDisplay('8')">8</button>
      <button class="key" data-action="digit" data-value="9" onclick="appendToDisplay('9')">9</button>
      <button class="key op" data-action="operator" data-value="*" aria-label="Multiply" onclick="appendToDisplay('*')">×</button>

      <button class="key" data-action="digit" data-value="4" onclick="appendToDisplay('4')">4</button>
      <button class="key" data-action="digit" data-value="5" onclick="appendToDisplay('5')">5</button>
      <button class="key" data-action="digit" data-value="6" onclick="appendToDisplay('6')">6</button>
      <button class="key op" data-action="operator" data-value="-" aria-label="Subtract" onclick="appendToDisplay('-')">−</button>

      <button class="key" data-action="digit" data-value="1" onclick="appendToDisplay('1')">1</button>
      <button class="key" data-action="digit" data-value="2" onclick="appendToDisplay('2')">2</button>
      <button class="key" data-action="digit" data-value="3" onclick="appendToDisplay('3')">3</button>
      <button class="key op" data-action="operator" data-value="+" aria-label="Add" onclick="appendToDisplay('+')">+</button>

      <button class="key" data-action="digit" data-value="0" style="grid-column: span 2;" onclick="appendToDisplay('0')">0</button>
      <button class="key" data-action="digit" data-value="." aria-label="Decimal" onclick="appendToDisplay('.')">.</button>
      <button class="key equal" data-action="equals" aria-label="Equals" onclick="calculateResult()">=</button>
    </section>

    <footer>Tip: Use keyboard (numbers, + - * /, Enter =, Backspace to delete)</footer>
  </main>
   <script src="{{ asset('js/calculator.js') }}"></script>
  <!-- <script>
    (function(){
      const prevEl = document.getElementById('prev');
      const currEl = document.getElementById('curr');
      let current = '0';
      let previous = '';
      let operator = null;
      let justEvaluated = false;

      function updateDisplay(){
        currEl.textContent = current;
        prevEl.textContent = previous ? (previous + (operator || '')) : '';
      }

      function clearAll(){ current = '0'; previous = ''; operator = null; justEvaluated=false; updateDisplay(); }
      function appendDigit(d){
        if(justEvaluated){ current = (d === '.') ? '0.' : d; justEvaluated = false; updateDisplay(); return; }
        if(d === '.' && current.includes('.')) return;
        if(current === '0' && d !== '.') current = d;
        else current = current + d;
        updateDisplay();
      }

      function toggleSign(){
        if(current === '0') return;
        current = current.startsWith('-') ? current.slice(1) : ('-' + current);
        updateDisplay();
      }

      function percent(){
        const num = parseFloat(current);
        if(isNaN(num)) return;
        current = String(num / 100);
        updateDisplay();
      }

      function chooseOperator(op){
        if(operator && previous){
          // chain compute
          compute();
        }
        operator = op;
        previous = current;
        current = '0';
        updateDisplay();
      }

      function compute(){
        if(!operator || !previous) return;
        const a = parseFloat(previous);
        const b = parseFloat(current);
        if(isNaN(a) || isNaN(b)) return;
        let res = 0;
        switch(operator){
          case '+': res = a + b; break;
          case '-': res = a - b; break;
          case '*': res = a * b; break;
          case '/': res = b === 0 ? 'Error' : a / b; break;
          default: res = 'Error';
        }
        current = (res === 'Error') ? res : String(roundResult(res));
        previous = '';
        operator = null;
        justEvaluated = true;
        updateDisplay();
      }

      function roundResult(n){
        // avoid long floats
        if(!isFinite(n)) return 'Error';
        return Math.round((n + Number.EPSILON) * 1e12) / 1e12;
      }

      // Click handling
      document.querySelectorAll('button.key').forEach(btn=>{
        btn.addEventListener('click', ()=>{
          const action = btn.dataset.action;
          const val = btn.dataset.value;
          if(action === 'digit') appendDigit(val);
          else if(action === 'operator') chooseOperator(val);
          else if(action === 'equals') compute();
          else if(action === 'all-clear') clearAll();
          else if(action === 'toggle-sign') toggleSign();
          else if(action === 'percent') percent();
        });
      });

      // Keyboard support
      window.addEventListener('keydown', (e)=>{
        if(e.metaKey || e.ctrlKey) return; // ignore shortcuts
        const key = e.key;
        if((/^[0-9]$/).test(key)) { appendDigit(key); e.preventDefault(); }
        else if(key === '.') { appendDigit('.'); e.preventDefault(); }
        else if(key === 'Enter' || key === '=') { compute(); e.preventDefault(); }
        else if(key === 'Backspace'){
          if(justEvaluated) { clearAll(); }
          else current = current.length>1 ? current.slice(0,-1) : '0';
          updateDisplay();
          e.preventDefault();
        }
        else if(key === 'Escape') { clearAll(); e.preventDefault(); }
        else if(key === '%') { percent(); e.preventDefault(); }
        else if(key === '+'|| key === '-'|| key === '*'|| key === '/') { chooseOperator(key); e.preventDefault(); }
      });

      // Make display focusable and support copy
      currEl.addEventListener('copy', (ev)=>{
        ev.clipboardData.setData('text/plain', current);
        ev.preventDefault();
      });

      // Initialize
      clearAll();
    })();
  </script> -->
</body>



</html>
