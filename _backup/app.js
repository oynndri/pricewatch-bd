// ─── API Helpers ──────────────────────────────────────────────────────────────// Configuration
const API = (window.location.port === '3000' || window.location.port === '5501')
    ? '/api'
    : `${window.location.protocol}//${window.location.hostname}:3000/api`;

if (!window.location.origin.includes(':3000')) {
    console.warn('⚠️ PRO TIP: Access the site via http://localhost:3000 for full login persistence!');
}

async function apiFetch(path, options = {}) {
    try {
        const res = await fetch(API + path, {
            headers: { 'Content-Type': 'application/json' },
            credentials: 'include', // Support session cookies
            ...options,
        });

        if (!res.ok) {
            const errData = await res.json().catch(() => ({}));
            if (res.status === 401) return { success: false, error: 'Unauthorized', status: 401 };
            console.error(`API Error ${res.status}: ${res.statusText}`, errData);
            return { success: false, error: errData.error || 'Server error', status: res.status };
        }

        return await res.json();
    } catch (e) {
        console.error('API connection failed:', e);
        // If fetch fails completely, it's usually a connection issue (server down)
        showToast('Backend server is offline. Please start the Node.js server (npm start).', 'error');
        return null;
    }
}

// ─── Auth State ───────────────────────────────────────────────────────────────
let currentUser = JSON.parse(localStorage.getItem('pwbd_user') || 'null');

function saveUser(user) {
    currentUser = user;
    localStorage.setItem('pwbd_user', JSON.stringify(user));
}
async function logout() {
    await apiFetch('/auth/logout', { method: 'POST' });
    currentUser = null;
    localStorage.removeItem('pwbd_user');
}

// ─── Toast ────────────────────────────────────────────────────────────────────
function showToast(message, type = 'success') {
    const container = document.getElementById('toastContainer');
    if (!container) return;
    const icons = { success: '✅', error: '❌', info: 'ℹ️' };
    const el = document.createElement('div');
    el.className = `toast ${type}`;
    el.innerHTML = `<span>${icons[type] || '✅'}</span> ${message}`;
    container.appendChild(el);
    setTimeout(() => el.remove(), 3500);
}

// ─── Trend helpers ────────────────────────────────────────────────────────────
function trendBadge(trend) {
    if (trend > 0) return `<span class="trend-badge up">▲ ${Math.abs(trend)}%</span>`;
    if (trend < 0) return `<span class="trend-badge down">▼ ${Math.abs(trend)}%</span>`;
    return `<span class="trend-badge flat">→ Stable</span>`;
}

// ─── Navbar ───────────────────────────────────────────────────────────────────
async function initNav() {
    const right = document.getElementById('navRight');
    const links = document.getElementById('navLinks');
    if (!right) return;

    // 1. Initial render from local cache (optimistic)
    renderNavContent(currentUser, right, links);

    // 2. Verify with server
    const res = await apiFetch('/auth/me');
    if (res?.success) {
        if (JSON.stringify(res.user) !== JSON.stringify(currentUser)) {
            saveUser(res.user);
            renderNavContent(currentUser, right, links);
        }
    } else {
        // If server says no session (401) or is offline
        if (currentUser) {
            currentUser = null;
            localStorage.removeItem('pwbd_user');
            renderNavContent(null, right, links);

            // Redirect from protected pages
            if (window.location.pathname.includes('profile.html') || window.location.pathname.includes('submit.html')) {
                window.location.href = 'auth.html';
            }
        }
    }

    // Mobile hamburger (bind once)
    const ham = document.getElementById('hamburger');
    if (ham && links && !ham.dataset.bound) {
        ham.addEventListener('click', () => links.classList.toggle('open'));
        document.querySelectorAll('.nav-links a').forEach(a => a.addEventListener('click', () => links.classList.remove('open')));
        ham.dataset.bound = "true";
    }
}

function renderNavContent(user, right, links) {
    if (user) {
        let adminLink = '';
        if (user.role === 'admin') {
            adminLink = '<a href="admin.html" class="nav-admin-link">🛡️ Admin</a>';
        }
        right.innerHTML = `
      <div class="user-menu">
        ${adminLink}
        <a href="profile.html" class="user-profile-link" title="View Profile">
          <div class="avatar">${user.avatar}</div>
          <span style="font-size:.9rem;font-weight:600;color:var(--gray-700)">${user.name.split(' ')[0]}</span>
        </a>
        <button class="btn-nav-logout" id="logoutBtn">Logout</button>
      </div>`;

        if (links && !document.getElementById('mobileLogout')) {
            const logoutLink = document.createElement('a');
            logoutLink.href = "#";
            logoutLink.id = "mobileLogout";
            logoutLink.className = "mobile-only";
            logoutLink.style.color = "var(--red-500)";
            logoutLink.textContent = "Logout";
            logoutLink.onclick = async (e) => { e.preventDefault(); await logout(); location.reload(); };
            links.appendChild(logoutLink);
        }

        const lBtn = document.getElementById('logoutBtn');
        if (lBtn) {
            lBtn.onclick = async () => {
                await logout();
                showToast('Logged out successfully', 'info');
                setTimeout(() => window.location.reload(), 500);
            };
        }
    } else {
        right.innerHTML = `
      <a href="auth.html" class="btn-nav-login">Login</a>
      <a href="submit.html" class="btn-nav-submit">+ Submit Price</a>`;

        const mLog = document.getElementById('mobileLogout');
        if (mLog) mLog.remove();

        if (links && !document.getElementById('mobileLogin')) {
            const loginLink = document.createElement('a');
            loginLink.href = "auth.html";
            loginLink.id = "mobileLogin";
            loginLink.className = "mobile-only";
            loginLink.textContent = "Login / Sign Up";
            links.appendChild(loginLink);
        }
    }
}

function updateNavAfterLogin() {
    initNav(); // Reuse initNav logic
}

// ─── Mini sparkline chart ─────────────────────────────────────────────────────
function drawSparkline(canvas, data, color = '#16a34a') {
    if (!canvas || !data || data.length < 2) return;
    const ctx = canvas.getContext('2d');
    const w = canvas.width = canvas.offsetWidth || 240;
    const h = canvas.height = canvas.offsetHeight || 60;
    const min = Math.min(...data), max = Math.max(...data);
    const range = max - min || 1;
    const pts = data.map((v, i) => [i / (data.length - 1) * w, h - ((v - min) / range) * (h - 10) - 5]);

    ctx.clearRect(0, 0, w, h);
    // Fill
    const grad = ctx.createLinearGradient(0, 0, 0, h);
    grad.addColorStop(0, color + '40');
    grad.addColorStop(1, color + '00');
    ctx.beginPath();
    ctx.moveTo(pts[0][0], pts[0][1]);
    pts.forEach(([x, y]) => ctx.lineTo(x, y));
    ctx.lineTo(pts[pts.length - 1][0], h);
    ctx.lineTo(0, h);
    ctx.closePath();
    ctx.fillStyle = grad;
    ctx.fill();
    // Line
    ctx.beginPath();
    ctx.moveTo(pts[0][0], pts[0][1]);
    pts.forEach(([x, y]) => ctx.lineTo(x, y));
    ctx.strokeStyle = color;
    ctx.lineWidth = 2.5;
    ctx.lineJoin = 'round';
    ctx.lineCap = 'round';
    ctx.stroke();
    // Dot
    const last = pts[pts.length - 1];
    ctx.beginPath();
    ctx.arc(last[0], last[1], 4, 0, Math.PI * 2);
    ctx.fillStyle = color;
    ctx.fill();
    ctx.strokeStyle = '#fff';
    ctx.lineWidth = 2;
    ctx.stroke();
}

// ─── Render product cards (home, products page) ───────────────────────────────
function renderProductCards(products, container) {
    if (!products || products.length === 0) {
        container.innerHTML = '<div class="no-results">No verified products found in this category.</div>';
        return;
    }
    container.innerHTML = products.map(p => `
    <div class="product-card fade-up" onclick="window.location='product.html?id=${p.id}'">
      <div style="display:flex;justify-content:space-between;align-items:flex-start">
        <span class="card-icon">${p.icon}</span>
        ${PWBD.trendBadge(p.trend)}
      </div>
      <div class="card-category">${p.category.toUpperCase()}</div>
      <div class="card-name">${p.nameEn}</div>
      <div class="card-name-bn">${p.name}</div>
      <div class="card-price-row">
        <div class="card-price">৳${p.avgPrice || '—'}</div>
        <div class="card-unit">per ${p.unit}</div>
      </div>
      <div class="card-footer">
        <span>Verified Official Price</span>
      </div>
    </div>`).join('');
}

// ─── Export ───────────────────────────────────────────────────────────────────
window.PWBD = { apiFetch, showToast, trendBadge, initNav, drawSparkline, renderProductCards, get currentUser() { return currentUser; }, saveUser, logout };
