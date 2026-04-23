// ═══════════════════════════════════════════════════════════════════════════
// PriceWatch BD — Main Application JavaScript
// Features: Bilingual (BN/EN), Voice Search, Charts, Smart Shopping
// ═══════════════════════════════════════════════════════════════════════════

const API = '/api';

// ─── Bilingual System ─────────────────────────────────────────────────
const LANG = {
    current: localStorage.getItem('pwbd_lang') || 'bn',
    toggle() {
        this.current = this.current === 'bn' ? 'en' : 'bn';
        localStorage.setItem('pwbd_lang', this.current);
        this.apply();
    },
    apply() {
        document.querySelectorAll('[data-bn]').forEach(el => {
            if (!el.dataset.en) el.dataset.en = el.innerHTML;
            el.innerHTML = this.current === 'bn' ? el.dataset.bn : el.dataset.en;
        });
        document.querySelectorAll('[data-bn-placeholder]').forEach(el => {
            el.placeholder = this.current === 'bn' ? el.dataset.bnPlaceholder : el.dataset.enPlaceholder;
        });
        const btn = document.getElementById('langToggle');
        if (btn) {
            btn.innerHTML = this.current === 'bn' ? 'EN' : 'বাং';
        }
        document.documentElement.lang = this.current;
        if (window.lucide) window.lucide.createIcons();
    },
    get(bn, en) {
        return this.current === 'bn' ? bn : en;
    },
    init() {
        this.apply();
        const btn = document.getElementById('langToggle');
        if (btn) {
            btn.onclick = () => this.toggle();
        }
    },
    name(item) {
        if (!item) return '';
        const bn = item.name || item.productName || item.marketName;
        const en = item.nameEn || item.name_en || item.productName || item.marketName;
        return this.current === 'bn' ? bn : en;
    }
};

// ─── API Helper ───────────────────────────────────────────────────────
async function apiFetch(path, options = {}) {
    try {
        const url = path.startsWith('http') ? path : API + path;
        const res = await fetch(url, {
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            credentials: 'same-origin',
            ...options,
        });
        if (!res.ok) {
            const err = await res.json().catch(() => ({}));
            return err;
        }
        return await res.json();
    } catch (e) {
        console.error('API Error:', e);
        return null;
    }
}

// ─── Voice Search ─────────────────────────────────────────────────────
function initVoiceSearch(inputId, callback) {
    const btn = document.getElementById(inputId + 'Voice');
    if (!btn) return;
    if (!('webkitSpeechRecognition' in window || 'SpeechRecognition' in window)) {
        btn.style.display = 'none';
        return;
    }
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();
    recognition.lang = LANG.current === 'bn' ? 'bn-BD' : 'en-US';
    recognition.continuous = false;
    recognition.interimResults = false;

    btn.addEventListener('click', () => {
        recognition.lang = LANG.current === 'bn' ? 'bn-BD' : 'en-US';
        btn.classList.add('listening');
        btn.textContent = '🔴';
        recognition.start();
    });

    recognition.onresult = (event) => {
        const text = event.results[0][0].transcript;
        const input = document.getElementById(inputId);
        if (input) { input.value = text; input.dispatchEvent(new Event('input')); }
        if (callback) callback(text);
        btn.classList.remove('listening');
        btn.textContent = '🎤';
    };
    recognition.onerror = () => { btn.classList.remove('listening'); btn.textContent = '🎤'; };
    recognition.onend = () => { btn.classList.remove('listening'); btn.textContent = '🎤'; };
}

// ─── Chart Drawing ────────────────────────────────────────────────────
function drawSparkline(canvas, data, color) {
    if (!canvas || !data || !data.length) return;
    const ctx = canvas.getContext('2d');
    const w = canvas.width = canvas.offsetWidth || 200;
    const h = canvas.height = canvas.offsetHeight || 60;
    ctx.clearRect(0, 0, w, h);

    const min = Math.min(...data);
    const max = Math.max(...data);
    const range = (max - min) || 1;
    const pad = 4;

    // Gradient fill
    const gradient = ctx.createLinearGradient(0, 0, 0, h);
    gradient.addColorStop(0, color + '30');
    gradient.addColorStop(1, color + '05');

    const pts = data.map((v, i) => [
        pad + (i / (data.length - 1)) * (w - pad * 2),
        pad + (1 - (v - min) / range) * (h - pad * 2)
    ]);

    // Fill
    ctx.beginPath();
    ctx.moveTo(pts[0][0], h);
    pts.forEach(([x, y]) => ctx.lineTo(x, y));
    ctx.lineTo(pts[pts.length - 1][0], h);
    ctx.fillStyle = gradient;
    ctx.fill();

    // Line
    ctx.beginPath();
    ctx.moveTo(pts[0][0], pts[0][1]);
    for (let i = 1; i < pts.length; i++) {
        const cp1x = (pts[i - 1][0] + pts[i][0]) / 2;
        ctx.bezierCurveTo(cp1x, pts[i - 1][1], cp1x, pts[i][1], pts[i][0], pts[i][1]);
    }
    ctx.strokeStyle = color;
    ctx.lineWidth = 2;
    ctx.lineJoin = 'round';
    ctx.stroke();

    // End dot
    const last = pts[pts.length - 1];
    ctx.beginPath();
    ctx.arc(last[0], last[1], 3, 0, Math.PI * 2);
    ctx.fillStyle = color;
    ctx.fill();
}

// ─── Trend Badge ──────────────────────────────────────────────────────
function trendBadge(trend) {
    if (trend > 0) return `<span class="trend-badge up">▲ +${trend}%</span>`;
    if (trend < 0) return `<span class="trend-badge down">▼ ${trend}%</span>`;
    return `<span class="trend-badge flat">→ 0%</span>`;
}

// ─── Product Cards ────────────────────────────────────────────────────
function renderProductCards(products, container) {
    if (!products.length) {
        container.innerHTML = '<div class="empty-state" style="grid-column:1/-1"><div class="empty-icon">📦</div><h3>' + LANG.get('কোনো পণ্য পাওয়া যায়নি', 'No products found') + '</h3></div>';
        return;
    }
    container.innerHTML = products.map(p => `
    <div class="product-card fade-up" onclick="window.location='/product.html?id=${p.id}'">
      <div style="display:flex;justify-content:space-between;align-items:flex-start">
        <span class="card-icon">${p.icon}</span>
        ${trendBadge(p.trend)}
      </div>
      <div class="card-name">${LANG.name(p)}</div>
      <div class="card-name-sub">${LANG.current === 'bn' ? p.nameEn : p.name}</div>
      <div class="card-price-row" style="margin-top:8px">
        <div class="card-price">৳${p.avgPrice ?? '—'}</div>
        <div class="card-unit">/ ${p.unit}</div>
      </div>
      <canvas class="mini-chart" style="height:45px;margin-top:10px" id="card_chart_${p.id}"></canvas>
    </div>`).join('');

    requestAnimationFrame(() => {
        products.forEach(p => {
            const canvas = document.getElementById('card_chart_' + p.id);
            if (canvas && p.history && p.history.length > 1) {
                drawSparkline(canvas, p.history, p.trend >= 0 ? '#ef4444' : '#16a34a');
            }
        });
    });
}

// ─── Toast ────────────────────────────────────────────────────────────
function showToast(msg, type = 'success') {
    const container = document.getElementById('toastContainer');
    if (!container) return;
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<span>${type === 'success' ? '✅' : type === 'error' ? '❌' : 'ℹ️'}</span> ${msg}`;
    container.appendChild(toast);
    setTimeout(() => toast.classList.add('show'), 10);
    setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 3500);
}

// ─── Auth State ───────────────────────────────────────────────────────
let currentUser = JSON.parse(localStorage.getItem('pwbd_user') || 'null');

function saveUser(user) {
    currentUser = user;
    localStorage.setItem('pwbd_user', JSON.stringify(user));
}

function clearUser() {
    currentUser = null;
    localStorage.removeItem('pwbd_user');
}

// ─── Nav Init ─────────────────────────────────────────────────────────
async function initNav() {
    // Check session
    const res = await apiFetch('/auth/me');
    if (res && res.success && res.user) {
        saveUser(res.user);
    }

    const navRight = document.getElementById('navRight');
    if (navRight) {
        if (currentUser) {
            const isAdmin = currentUser.role === 'admin';
            navRight.innerHTML = `
                <button id="langToggle" class="btn-lang" title="Switch Language"></button>
                ${isAdmin ? '<a href="/admin.html" class="btn btn-outline btn-sm" data-bn="🛡️ অ্যাডমিন" data-en="🛡️ Admin">🛡️ Admin</a>' : ''}
                <a href="/shopping.html" class="btn btn-yellow btn-sm" data-bn="🛒 স্মার্ট শপিং" data-en="🛒 Smart Shop">🛒 ${LANG.get('স্মার্ট শপিং', 'Smart Shop')}</a>
                <div class="nav-user" onclick="window.location='/profile.html'">
                    <div class="nav-avatar">${currentUser.avatar || 'U'}</div>
                    <span class="nav-uname">${currentUser.name.split(' ')[0]}</span>
                </div>
                <button class="btn btn-danger-outline btn-sm" onclick="logout()" data-bn="লগআউট" data-en="Logout">Logout</button>`;
        } else {
            navRight.innerHTML = `
                <button id="langToggle" class="btn-lang" title="Switch Language"></button>
                <a href="/auth.html" class="btn btn-outline btn-sm" data-bn="লগইন" data-en="Login">${LANG.get('লগইন', 'Login')}</a>
                <a href="/submit.html" class="btn btn-primary btn-sm" data-bn="+ দাম জমা দিন" data-en="+ Submit Price">+ ${LANG.get('দাম জমা দিন', 'Submit Price')}</a>`;
        }

    }

    // Hamburger
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            hamburger.classList.toggle('active');
        });
    }

    // Init bilingual
    LANG.init();
}

async function logout() {
    await apiFetch('/auth/logout', { method: 'POST' });
    clearUser();
    window.location = '/';
}

// ─── PWBD Global Object ──────────────────────────────────────────────
window.PWBD = {
    apiFetch,
    initNav,
    renderProductCards,
    drawSparkline,
    trendBadge,
    showToast,
    saveUser,
    clearUser,
    LANG,
    initVoiceSearch,
    get currentUser() { return currentUser; },
};
