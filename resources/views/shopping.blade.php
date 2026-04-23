<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>স্মার্ট শপিং — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner">
        <div class="container">
            <h1 data-bn="<i data-lucide='shopping-bag'></i> স্মার্ট শপিং লিস্ট" data-en="<i data-lucide='shopping-bag'></i> Smart Shopping List"><i data-lucide="shopping-bag"></i> স্মার্ট শপিং লিস্ট</h1>
            <p data-bn="আপনার মাসিক বাজারের লিস্ট তৈরি করুন, সবচেয়ে সস্তা বাজার খুঁজে বের করুন!" data-en="Create your grocery list and find the cheapest market to buy from!">আপনার মাসিক বাজারের লিস্ট তৈরি করুন, সবচেয়ে সস্তা বাজার খুঁজে বের করুন!</p>
        </div>
    </div>

    <main class="page"><div class="container"><div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:start">
        <!-- List Editor -->
        <div class="form-card">
            <h2 class="form-title" data-bn="<i data-lucide='list-checks'></i> শপিং লিস্ট" data-en="<i data-lucide='list-checks'></i> Shopping List"><i data-lucide="list-checks"></i> শপিং লিস্ট</h2>
            <div class="form-group">
                <label data-bn="আপনার জেলা" data-en="Your District">আপনার জেলা</label>
                <select id="districtSelect" required><option value="">জেলা নির্বাচন করুন</option></select>
            </div>
            
            <div style="background:var(--gray-50);border:1px solid var(--border);border-radius:var(--radius);padding:24px;margin-bottom:24px">
                <div style="display:flex;gap:12px;margin-bottom:16px">
                    <div style="flex:1">
                        <label style="font-size:0.85rem;font-weight:700;color:var(--gray-600)">পণ্য নির্বাচন করুন</label>
                        <select id="addSelect"><option value="">Loading...</option></select>
                    </div>
                </div>
                <button class="btn btn-outline btn-block" onclick="addItem()"><i data-lucide="plus"></i> <span data-bn="লিস্টে যোগ করুন" data-en="Add to List">লিস্টে যোগ করুন</span></button>
            </div>

            <div id="shoppingItems"></div>
            
            <button class="btn btn-primary btn-block" style="margin-top:24px;font-size:1.1rem" onclick="calculateList()" data-bn="<i data-lucide='calculator'></i> সবচেয়ে সস্তা বাজার খুঁজুন" data-en="<i data-lucide='calculator'></i> Find Cheapest Market"><i data-lucide="calculator"></i> সবচেয়ে সস্তা বাজার খুঁজুন</button>
        </div>

        <!-- Result -->
        <div id="resultCard" style="display:none">
            <div class="shopping-result">
                <h3 style="font-size:1.1rem;color:var(--green-800);margin-bottom:8px" data-bn="✅ সেরা অপশন" data-en="✅ Best Option">✅ সেরা অপশন</h3>
                <div style="font-size:1.6rem;font-weight:800;color:var(--gray-900);margin-bottom:4px" id="resMarket">Market Name</div>
                <div style="font-size:0.95rem;color:var(--text-muted);display:flex;align-items:center;margin-bottom:16px"><i data-lucide="map-pin" style="width:16px;margin-right:4px"></i> <span id="resLocation">Location</span></div>
                
                <div style="background:white;padding:24px;border-radius:var(--radius-lg);margin-bottom:24px;box-shadow:var(--shadow-sm)">
                    <div style="font-size:0.85rem;font-weight:700;color:var(--gray-500);text-transform:uppercase" data-bn="মোট খরচ" data-en="Total Cost">মোট খরচ</div>
                    <div class="shopping-savings" id="resTotal">৳0</div>
                </div>

                <div class="map-container" style="border-radius:var(--radius)"><div id="shoppingMap"></div></div>
            </div>

            <div class="table-wrap" style="margin-top:24px">
                <table><thead><tr><th>Market</th><th>Total Cost</th></tr></thead><tbody id="otherMarkets"></tbody></table>
            </div>
        </div>
    </div></div></main>

    <!-- Footer Profile (Dark Theme) -->
    <footer style="margin-top:80px;background:#111526;padding:60px 40px 30px;color:#cbd5e1;font-family:'Outfit', sans-serif;">
        <div style="max-width:1200px;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:space-between;gap:40px;">
            <div style="flex:1;min-width:300px;">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                    <div style="width:40px;height:40px;background:var(--green-600);border-radius:10px;display:flex;align-items:center;justify-content:center;color:white;"><i data-lucide="shopping-cart"></i></div>
                    <span style="font-size:1.5rem;font-weight:800;color:white;letter-spacing:-0.5px">PriceWatch BD</span>
                </div>
                <p style="font-size:0.95rem;line-height:1.6;color:#94a3b8;max-width:350px;">
                    The centralized market intelligence platform for Bangladesh. Enabling users to monitor, share, and track authentic commodity prices across all 64 districts.
                </p>
            </div>
            
            <div style="flex:1;min-width:200px;">
                <h3 style="color:white;font-size:1.1rem;font-weight:600;margin-bottom:20px;">Quick Navigation</h3>
                <div style="display:flex;flex-direction:column;gap:12px;">
                    <a href="/" style="color:#94a3b8;text-decoration:none;font-weight:500;transition:0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Explore Markets</a>
                    <a href="/products.html" style="color:#94a3b8;text-decoration:none;font-weight:500;transition:0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Products Matrix</a>
                    <a href="/submit.html" style="color:#94a3b8;text-decoration:none;font-weight:500;transition:0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Submit Price</a>
                </div>
            </div>

            <div style="flex:1;min-width:300px;">
                <h3 style="color:white;font-size:1.1rem;font-weight:600;margin-bottom:20px;">Developed By</h3>
                <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px;">
                    <img src="https://github.com/oynndri.png" alt="Dev" style="width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #334155;">
                    <div>
                        <div style="color:white;font-weight:600;font-size:1.05rem;">Oynndrila Singh Purkayestha</div>
                        <div style="color:#64748b;font-size:0.85rem;">System Admin & Full Stack Developer</div>
                    </div>
                </div>
                <div style="display:flex;gap:12px;">
                    <a href="https://github.com/oynndri" target="_blank" style="width:36px;height:36px;border-radius:50%;background:#1e293b;display:flex;align-items:center;justify-content:center;color:#94a3b8;transition:0.2s;text-decoration:none" onmouseover="this.style.background='#334155';this.style.color='white'" onmouseout="this.style.background='#1e293b';this.style.color='#94a3b8'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg></a>
                    <a href="https://www.linkedin.com/in/oynndrila-singh-purkayestha" target="_blank" style="width:36px;height:36px;border-radius:50%;background:#1e293b;display:flex;align-items:center;justify-content:center;color:#94a3b8;transition:0.2s;text-decoration:none" onmouseover="this.style.background='#0077b5';this.style.color='white'" onmouseout="this.style.background='#1e293b';this.style.color='#94a3b8'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg></a>
                    <a href="https://www.facebook.com/share/1AaeCcVnkT/" target="_blank" style="width:36px;height:36px;border-radius:50%;background:#1e293b;display:flex;align-items:center;justify-content:center;color:#94a3b8;transition:0.2s;text-decoration:none" onmouseover="this.style.background='#1877f2';this.style.color='white'" onmouseout="this.style.background='#1e293b';this.style.color='#94a3b8'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                    <a href="https://www.instagram.com/oynndrilasingh?igsh=angwbGs1ZGJ5and1" target="_blank" style="width:36px;height:36px;border-radius:50%;background:#1e293b;display:flex;align-items:center;justify-content:center;color:#94a3b8;transition:0.2s;text-decoration:none" onmouseover="this.style.background='#e1306c';this.style.color='white'" onmouseout="this.style.background='#1e293b';this.style.color='#94a3b8'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
                </div>
            </div>
        </div>
        <div style="max-width:1200px;margin:40px auto 0;padding-top:24px;border-top:1px solid #1e293b;text-align:center;color:#64748b;font-size:0.9rem;">
            © 2026 PriceWatch BD. All rights reserved. Authentic Market Intelligence System.
        </div>
    </footer>

    <div class="toast-container" id="toastContainer"></div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="/app.js"></script>
    <script>
        lucide.createIcons();
        PWBD.initNav();
        let products = [], markets = [], list = [], map, marker;

        async function init() {
            [products, markets] = await Promise.all([PWBD.apiFetch('/products'), PWBD.apiFetch('/markets')]);
            const distSelect = document.getElementById('districtSelect');
            const dists = [...new Set(markets.map(m => m.district))].sort();
            dists.forEach(d => distSelect.innerHTML += `<option value="${d}">${d}</option>`);
            
            const addSelect = document.getElementById('addSelect');
            addSelect.innerHTML = '<option value="">পণ্য নির্বাচন করুন...</option>' + products.map(p => `<option value="${p.id}" data-icon="${p.icon}" data-unit="${p.unit}">${p.name} (${p.nameEn})</option>`).join('');
            
            map = L.map('shoppingMap').setView([23.6850, 90.3563], 7);
            L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                attribution: '&copy; Google Maps',
                maxZoom: 20
            }).addTo(map);
        }

        function addItem() {
            const select = document.getElementById('addSelect');
            const val = select.value;
            if(!val) return;
            if(list.find(i => i.id == val)) return PWBD.showToast('Already added!', 'error');
            const p = products.find(x => x.id == val);
            list.push({ id: p.id, qty: 1, p: p });
            renderList();
            select.value = '';
        }

        function renderList() {
            const box = document.getElementById('shoppingItems');
            box.innerHTML = list.map((item, i) => `
                <div class="shopping-item">
                    <span style="font-size:1.4rem"><i data-lucide="${item.p.icon || 'box'}"></i></span>
                    <div style="flex:1"><div style="font-weight:700">${PWBD.LANG.name(item.p)}</div><div style="font-size:0.8rem;color:var(--text-muted)">Unit: ${item.p.unit}</div></div>
                    <div style="display:flex;align-items:center;gap:8px">
                        <input type="number" class="shopping-qty" min="0.5" step="0.5" value="${item.qty}" onchange="list[${i}].qty=Number(this.value)">
                        <span style="color:var(--text-muted);font-size:0.9rem">${item.p.unit}</span>
                    </div>
                    <button class="btn btn-outline" style="border:none;color:var(--red-500);padding:8px" onclick="list.splice(${i},1);renderList()"><i data-lucide="trash-2"></i></button>
                </div>
            `).join('');
            lucide.createIcons();
        }

        async function calculateList() {
            const dist = document.getElementById('districtSelect').value;
            if(!dist) return PWBD.showToast('Please select a district!', 'error');
            
            // Auto-add selected product if list is empty
            if(list.length === 0) {
                const select = document.getElementById('addSelect');
                if(select.value) {
                    addItem();
                } else {
                    return PWBD.showToast('Please add products!', 'error');
                }
            }

            const payload = { district: dist, items: list.map(i => ({ productId: i.id, quantity: i.qty })) };
            const res = await PWBD.apiFetch('/smart-shopping', { method: 'POST', body: JSON.stringify(payload) });
            
            if(!res || !res.allMarkets || !res.allMarkets.length) {
                return PWBD.showToast('No markets found with all items in this district.', 'error');
            }

            const best = res.bestMarket;
            document.getElementById('resultCard').style.display = 'block';
            document.getElementById('resMarket').textContent = best.market.name;
            document.getElementById('resLocation').textContent = best.market.location;
            document.getElementById('resTotal').textContent = '৳' + best.total;

            if(marker) map.removeLayer(marker);
            marker = L.marker([best.market.latitude, best.market.longitude]).addTo(map).bindPopup('<b>'+best.market.name+'</b><br>Total: ৳'+best.total).openPopup();
            map.setView([best.market.latitude, best.market.longitude], 12);
            setTimeout(()=>map.invalidateSize(), 300);

            const tbody = document.getElementById('otherMarkets');
            tbody.innerHTML = res.allMarkets.slice(1).map(opt => `
                <tr><td><strong><i data-lucide="store" style="width:14px"></i> ${opt.market.name}</strong><br><small style="color:var(--text-muted)">${opt.market.location}</small></td><td style="font-weight:700">৳${opt.total}</td></tr>
            `).join('');
            lucide.createIcons();
            
            document.getElementById('resultCard').scrollIntoView({behavior:'smooth'});
        }

        init();
    </script>
</body>
</html>
