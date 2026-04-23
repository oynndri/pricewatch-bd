<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বাজারসমূহ — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .modal-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); display: none; align-items: center; justify-content: center; z-index: 9999; }
        .modal { background: white; border-radius: 24px; width: 90%; max-width: 600px; max-height: 85vh; overflow-y: auto; padding: 32px; position: relative; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .modal-close { position: absolute; top: 24px; right: 24px; cursor: pointer; color: var(--gray-500); transition: 0.2s; background: var(--gray-100); border:none; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; }
        .modal-close:hover { color: var(--red-500); background: var(--red-50); }
        .m-product-list { margin-top: 24px; display: grid; gap: 12px; }
        .m-product-item { display:flex; align-items:center; justify-content:space-between; padding:16px; border:1px solid var(--border); border-radius:16px; background:var(--gray-50); }
        .m-product-info { display:flex; align-items:center; gap:12px; }
        .m-product-icon { width:48px; height:48px; background:white; border-radius:12px; display:flex; align-items:center; justify-content:center; color:var(--green-600); box-shadow:var(--shadow-sm); }
        .filters-bar { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); }
    </style>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" class="active" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a><a href="/prediction.html" data-bn="পূর্বাভাস" data-en="Prediction">পূর্বাভাস</a><a href="/submit.html" data-bn="দাম জমা দিন" data-en="Submit Price">দাম জমা দিন</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner">
        <div class="container">
            <h1 data-bn="<i data-lucide='map'></i> বাজারসমূহ (ম্যাপ)" data-en="<i data-lucide='map'></i> Markets (Map)"><i data-lucide="map"></i> বাজারসমূহ (ম্যাপ)</h1>
            <p data-bn="বাংলাদেশের ৬৪ জেলার আসল বাজারগুলোর অবস্থান ও বিস্তারিত দাম" data-en="Locations and prices of authentic markets across 64 districts in Bangladesh">বাংলাদেশের ৬৪ জেলার আসল বাজারগুলোর অবস্থান ও বিস্তারিত দাম</p>
        </div>
    </div>

    <main class="page"><div class="container">
        <div class="filters-bar">
            <div class="filter-group">
                <label data-bn="বিভাগ" data-en="Division">বিভাগ</label>
                <select id="divisionSelect"><option value="">All Divisions</option></select>
            </div>
            <div class="filter-group">
                <label data-bn="জেলা" data-en="District">জেলা</label>
                <select id="districtSelect"><option value="">All Districts</option></select>
            </div>
            <div class="filter-group">
                <label data-bn="ধরণ" data-en="Type">ধরণ</label>
                <select id="typeSelect">
                    <option value="" data-bn="সব ধরণ" data-en="All Types">সব ধরণ</option>
                    <option value="wholesale" data-bn="পাইকারি বাজার" data-en="Wholesale">পাইকারি বাজার</option>
                    <option value="retail" data-bn="খুচরা বাজার" data-en="Retail">খুচরা বাজার</option>
                </select>
            </div>
        </div>

        <div class="map-container" style="margin-bottom:48px"><div id="marketsMap"></div></div>

        <div class="section-header">
            <h2 class="section-title" data-bn="<i data-lucide='list'></i> সকল <span>বাজার</span>" data-en="<i data-lucide='list'></i> All <span>Markets</span>"><i data-lucide="list"></i> সকল <span>বাজার</span></h2>
        </div>
        <div class="markets-grid" id="marketsGrid"><div class="loading"><div class="spinner"></div></div></div>
    </div></main>

    <!-- Market Details Modal -->
    <div class="modal-overlay" id="marketModal">
        <div class="modal">
            <button class="modal-close" onclick="closeModal()"><i data-lucide="x"></i></button>
            <div id="modalContent">
                <div style="text-align:center;padding:40px"><div class="spinner"></div></div>
            </div>
        </div>
    </div>

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
        let map, markers = [], allMarkets = [];

        async function init() {
            allMarkets = await PWBD.apiFetch('/markets') || [];
            
            // Populating divisions
            const divisions = [...new Set(allMarkets.map(m => m.division))].filter(Boolean).sort();
            document.getElementById('divisionSelect').innerHTML += divisions.map(d => `<option value="${d}">${d}</option>`).join('');
            
            document.getElementById('divisionSelect').addEventListener('change', (e) => {
                const val = e.target.value;
                const distSelect = document.getElementById('districtSelect');
                distSelect.innerHTML = '<option value="">All Districts</option>';
                if (val) {
                    const dists = [...new Set(allMarkets.filter(m => m.division === val).map(m => m.district))].filter(Boolean).sort();
                    distSelect.innerHTML += dists.map(d => `<option value="${d}">${d}</option>`).join('');
                }
                filterMarkets();
            });

            document.getElementById('districtSelect').addEventListener('change', filterMarkets);
            document.getElementById('typeSelect').addEventListener('change', filterMarkets);

            // Init Map with Google Satellite View
            map = L.map('marketsMap').setView([23.6850, 90.3563], 7);
            L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                attribution: '&copy; Google Maps',
                maxZoom: 20
            }).addTo(map);

            filterMarkets();
        }

        function filterMarkets() {
            const div = document.getElementById('divisionSelect').value;
            const dist = document.getElementById('districtSelect').value;
            const type = document.getElementById('typeSelect').value;
            
            const filtered = allMarkets.filter(m => {
                return (!div || m.division === div) && 
                       (!dist || m.district === dist) && 
                       (!type || m.type === type);
            });

            // Update Map
            markers.forEach(m => map.removeLayer(m));
            markers = [];
            filtered.forEach(m => {
                const popup = `
                    <div style="font-family:'Outfit',sans-serif;padding:4px">
                        <strong style="font-size:1.1rem;display:block;margin-bottom:4px;color:var(--gray-900)">${m.name || 'Unknown Market'}</strong>
                        <div style="color:var(--gray-600);font-size:0.85rem">${m.district || ''}, ${m.division || ''}</div>
                        <div style="margin-top:8px"><span class="market-badge ${m.type}">${m.type}</span></div>
                        <button onclick="openMarket(${m.id})" style="margin-top:12px;background:white;border:1px solid var(--border);border-radius:6px;width:100%;padding:4px 0;cursor:pointer">View Details</button>
                    </div>`;
                const marker = L.marker([m.latitude, m.longitude]).bindPopup(popup).addTo(map);
                markers.push(marker);
            });
            if (filtered.length > 0 && map) {
                const group = new L.featureGroup(markers);
                try { map.fitBounds(group.getBounds(), { padding: [50, 50], maxZoom: 12 }); } catch(e){}
            }

            // Update Grid
            const grid = document.getElementById('marketsGrid');
            if (filtered.length === 0) { grid.innerHTML = '<div style="grid-column:1/-1;text-align:center;padding:40px;color:var(--text-muted)">No markets found.</div>'; return; }
            grid.innerHTML = filtered.map(m => `
                <div class="market-card" style="cursor:pointer" onclick="openMarket(${m.id})">
                    <div class="market-card-header">
                        <div>
                            <div class="market-name"><i data-lucide="store"></i> ${m.name || 'Unknown Market'}</div>
                            <div class="market-name-bn" style="color:var(--gray-500);font-size:0.85rem">${m.district || ''}, ${m.division || ''}</div>
                        </div>
                        <div class="market-rating"><i data-lucide="star"></i> ${m.rating}</div>
                    </div>
                    <div class="market-info"><i data-lucide="map-pin" style="width:16px"></i> ${m.location}</div>
                    <div class="market-footer">
                        <span class="market-badge ${m.type}">${m.type}</span>
                        ${m.verified ? '<span class="verified-badge"><i data-lucide="check-circle"></i> Auth</span>' : ''}
                    </div>
                </div>`).join('');
            
            PWBD.LANG.init();
        }

        async function openMarket(id) {
            document.getElementById('marketModal').style.display = 'flex';
            document.getElementById('modalContent').innerHTML = '<div style="text-align:center;padding:40px"><div class="spinner"></div></div>';
            
            const res = await PWBD.apiFetch('/markets/' + id);
            if (!res || res.error) {
                document.getElementById('modalContent').innerHTML = '<h3 style="text-align:center;color:red">Failed to load</h3>';
                return;
            }

            // Deduplicate products to just show latest price per product
            let prodMap = {};
            (res.prices || []).forEach(p => {
                if(!prodMap[p.productId] || new Date(p.date) > new Date(prodMap[p.productId].date)) {
                    prodMap[p.productId] = p;
                }
            });
            const latestPrices = Object.values(prodMap);

            document.getElementById('modalContent').innerHTML = `
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
                    <div style="background:var(--green-50);padding:12px;border-radius:14px;color:var(--green-600)"><i data-lucide="store" style="width:28px;height:28px"></i></div>
                    <div>
                        <h2 style="font-size:1.6rem;font-weight:800;color:var(--gray-900);line-height:1.2">${res.name || 'Unknown'}</h2>
                        <div style="font-size:0.95rem;color:var(--gray-500);display:flex;align-items:center;gap:4px;margin-top:2px"><i data-lucide="map-pin" style="width:14px"></i> ${res.district || ''}, ${res.division || ''}</div>
                    </div>
                </div>
                <div style="margin-bottom:24px;border-bottom:1px solid var(--border);padding-bottom:16px">
                    <span class="market-badge ${res.type}">${res.type} Market</span>
                </div>
                <h3 style="font-size:1.1rem;font-weight:700;color:var(--gray-800);margin-bottom:12px">Available Products (${latestPrices.length})</h3>
                <div class="m-product-list">
                    ${latestPrices.length === 0 ? '<div style="padding:24px;text-align:center;color:var(--gray-500)">No products tracking in this market</div>' : 
                    latestPrices.map(p => `
                        <div class="m-product-item" onclick="window.location='/product.html?id=${p.productId}'" style="cursor:pointer;transition:transform 0.2s">
                            <div class="m-product-info">
                                <div class="m-product-icon"><i data-lucide="${p.product?.icon || 'box'}"></i></div>
                                <div>
                                    <strong style="display:block;font-size:1.05rem;color:var(--gray-900)">${PWBD.LANG.name(p.product)}</strong>
                                    <span style="font-size:0.85rem;color:var(--gray-500)">Last updated: ${new Date(p.date).toLocaleDateString()}</span>
                                </div>
                            </div>
                            <div style="text-align:right">
                                <div style="font-size:1.2rem;font-weight:800;color:var(--green-700)">৳${p.price}</div>
                                <div style="font-size:0.8rem;color:var(--gray-500)">/ ${p.product?.unit}</div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;
            lucide.createIcons();
        }

        function closeModal() {
            document.getElementById('marketModal').style.display = 'none';
        }
        
        // Close modal on outside click
        window.onclick = function(event) {
            const modal = document.getElementById('marketModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        init();
    </script>
</body>
</html>
