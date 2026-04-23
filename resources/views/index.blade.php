<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PriceWatch BD — বাংলাদেশের বাজার দর</title>
    <meta name="description" content="Track real-time prices of daily essentials across 64 districts and 640+ markets in Bangladesh.">
    <link rel="stylesheet" href="/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner">
        <a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a>
        <nav class="nav-links" id="navLinks">
            <a href="/" class="active" data-bn="হোম" data-en="Home">হোম</a>
            <a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a>
            <a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a>
            <a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a>
            <a href="/prediction.html" data-bn="পূর্বাভাস" data-en="Prediction">পূর্বাভাস</a>
            <a href="/submit.html" data-bn="দাম জমা দিন" data-en="Submit Price">দাম জমা দিন</a>
        </nav>
        <div class="nav-right" id="navRight"></div>
        <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    </div></nav>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1 data-bn="বাংলাদেশের বাজার দর — রিয়েল টাইম" data-en="Bangladesh Market Prices — Real Time">বাংলাদেশের বাজার দর — রিয়েল টাইম</h1>
            <p data-bn="৬৪ জেলার বাজার থেকে সঠিক বাজার দর জানুন। AI দিয়ে দামের পূর্বাভাস পান।" data-en="Track products across major markets in all 64 districts. Get AI-powered price predictions.">৬৪ জেলার বাজার থেকে সঠিক বাজার দর জানুন। AI দিয়ে দামের পূর্বাভাস পান।</p>
            <div class="hero-search">
                <div style="position:relative;flex:1;display:flex;align-items:center">
                    <span style="position:absolute;left:16px;color:var(--gray-400)"><i data-lucide="search"></i></span>
                    <input type="text" id="heroSearch" style="padding-left:48px;width:100%" data-bn-placeholder="চাল, মাছ, সবজি খুঁজুন..." data-en-placeholder="Search rice, fish, vegetables..." placeholder="চাল, মাছ, সবজি খুঁজুন...">
                    <button class="voice-btn" id="heroSearchVoice" title="Voice Search" style="position:absolute;right:8px"><i data-lucide="mic"></i></button>
                </div>
                <button class="btn btn-primary" onclick="window.location='/products.html?q='+document.getElementById('heroSearch').value" data-bn="খুঁজুন" data-en="Search"><i data-lucide="search"></i> খুঁজুন</button>
            </div>
            <div class="hero-features">
                <span><i data-lucide="bar-chart-2"></i> <span data-bn="সকল পণ্য" data-en="All Products">সকল পণ্য</span></span>
                <span><i data-lucide="store"></i> <span data-bn="অথেন্টিক বাজার" data-en="Authentic Markets">অথেন্টিক বাজার</span></span>
                <span><i data-lucide="map-pin"></i> <span data-bn="৬৪ জেলা" data-en="64 Districts">৬৪ জেলা</span></span>
                <span><i data-lucide="sparkles"></i> <span data-bn="AI পূর্বাভাস" data-en="AI Prediction">AI পূর্বাভাস</span></span>
            </div>
        </div>
    </section>

    <!-- Price Ticker -->
    <div class="ticker-bar"><div class="ticker-track" id="tickerTrack"><span class="ticker-loading" data-bn="দামের তথ্য লোড হচ্ছে..." data-en="Loading prices...">দামের তথ্য লোড হচ্ছে...</span></div></div>

    <!-- Stats KPI -->
    <section class="page" style="padding-bottom:16px"><div class="container">
        <div class="stats-grid" id="statsGrid"><div class="loading"><div class="spinner"></div></div></div>
    </div></section>

    <!-- Quick Feature Cards -->
    <section class="page" style="padding-top:0;padding-bottom:16px"><div class="container">
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:16px;margin-bottom:32px">
            <a href="/shopping.html" class="feature-card" style="background:linear-gradient(135deg, var(--green-50), white); border: 1px solid var(--green-200);">
                <i data-lucide="shopping-bag" style="color:var(--green-600)"></i>
                <h3 style="color:var(--green-800)" data-bn="স্মার্ট শপিং লিস্ট" data-en="Smart Shopping List">স্মার্ট শপিং লিস্ট</h3>
                <p style="color:var(--green-600)" data-bn="সবচেয়ে সস্তা বাজার খুঁজুন" data-en="Find the cheapest market">সবচেয়ে সস্তা বাজার খুঁজুন <i data-lucide="arrow-right"></i></p>
            </a>
            <a href="/prediction.html" class="feature-card" style="background:linear-gradient(135deg, #f0f9ff, white); border: 1px solid #bae6fd;">
                <i data-lucide="sparkles" style="color:#0ea5e9"></i>
                <h3 style="color:#0369a1" data-bn="দাম পূর্বাভাস (AI)" data-en="Price Prediction (AI)">দাম পূর্বাভাস (AI)</h3>
                <p style="color:#0284c7" data-bn="আগামী ৭ দিনের দাম জানুন" data-en="Predict next 7 days prices">আগামী ৭ দিনের দাম জানুন <i data-lucide="arrow-right"></i></p>
            </a>
            <a href="/markets.html" class="feature-card" style="background:linear-gradient(135deg, #fffbeb, white); border: 1px solid #fde68a;">
                <i data-lucide="map" style="color:#d97706"></i>
                <h3 style="color:#92400e" data-bn="ম্যাপে বাজার দেখুন" data-en="View Markets on Map">ম্যাপে বাজার দেখুন</h3>
                <p style="color:#b45309" data-bn="সকল বাজারের লোকেশন" data-en="Location of all markets">সকল বাজারের লোকেশন <i data-lucide="arrow-right"></i></p>
            </a>
            <a href="/trending.html" class="feature-card" style="background:linear-gradient(135deg, #fef2f2, white); border: 1px solid #fecaca;">
                <i data-lucide="trending-up" style="color:#ef4444"></i>
                <h3 style="color:#991b1b" data-bn="দামের ট্রেন্ড" data-en="Price Trends">দামের ট্রেন্ড</h3>
                <p style="color:#dc2626" data-bn="কোন পণ্যের দাম বাড়ছে/কমছে" data-en="Which prices are rising/falling">কোন পণ্যের দাম বাড়ছে/কমছে <i data-lucide="arrow-right"></i></p>
            </a>
        </div>
    </div></section>

    <!-- Hot Trending Products -->
    <section class="page" style="padding-top:0"><div class="container">
        <div class="section-header">
            <h2 class="section-title" data-bn="<i data-lucide='flame'></i> এখন <span>ট্রেন্ডিং</span>" data-en="<i data-lucide='flame'></i> Now <span>Trending</span>"><i data-lucide="flame"></i> এখন <span>ট্রেন্ডিং</span></h2>
            <a href="/trending.html" class="section-link" data-bn="সব দেখুন &rarr;" data-en="View All &rarr;">সব দেখুন &rarr;</a>
        </div>
        <div class="trending-grid" id="trendingGrid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:24px;"><div class="loading"><div class="spinner"></div></div></div>

        <div class="section-header" style="margin-top:44px">
            <h2 class="section-title" data-bn="<i data-lucide='package'></i> জনপ্রিয় <span>পণ্য</span>" data-en="<i data-lucide='package'></i> Popular <span>Products</span>"><i data-lucide="package"></i> জনপ্রিয় <span>পণ্য</span></h2>
            <a href="/products.html" class="section-link" data-bn="সব পণ্য &rarr;" data-en="All Products &rarr;">সব পণ্য &rarr;</a>
        </div>
        <div class="cards-grid" id="productsGrid"><div class="loading"><div class="spinner"></div></div></div>
    </div></section>


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
    <script src="/app.js"></script>
    <script>
        lucide.createIcons();
        PWBD.initNav();
        PWBD.initVoiceSearch('heroSearch');

        // Stats
        (async () => {
            const stats = await PWBD.apiFetch('/stats') || {};
            document.getElementById('statsGrid').innerHTML = `
                <div class="stat-card"><span class="ico"><i data-lucide="package"></i></span><span class="val">${stats.totalProducts || 0}</span><span class="lbl" data-bn="মোট পণ্য" data-en="Total Products">মোট পণ্য</span></div>
                <div class="stat-card"><span class="ico"><i data-lucide="store"></i></span><span class="val">${stats.totalMarkets || 0}</span><span class="lbl" data-bn="মোট বাজার" data-en="Total Markets">মোট বাজার</span></div>
                <div class="stat-card"><span class="ico"><i data-lucide="bar-chart-2"></i></span><span class="val">${stats.totalPriceUpdates || 0}</span><span class="lbl" data-bn="দামের তথ্য" data-en="Price Updates">দামের তথ্য</span></div>
                <div class="stat-card"><span class="ico"><i data-lucide="users"></i></span><span class="val">${stats.totalUsers || 0}</span><span class="lbl" data-bn="ব্যবহারকারী" data-en="Users">ব্যবহারকারী</span></div>`;
            PWBD.LANG.init();
        })();

        // Ticker
        (async () => {
            const products = await PWBD.apiFetch('/products') || [];
            const track = document.getElementById('tickerTrack');
            if (!products.length) return;
            const top20 = products.filter(p => p.avgPrice).slice(0, 30);
            const items = top20.map(p => {
                let badgeClass = p.trend > 0 ? "up" : (p.trend < 0 ? "down" : "flat");
                let badgeText = p.trend > 0 ? `<i data-lucide="trending-up"></i>` : (p.trend < 0 ? `<i data-lucide="trending-down"></i>` : `<i data-lucide="minus"></i>`);
                return `<span class="ticker-item"><i data-lucide="${p.icon || 'box'}"></i> ${PWBD.LANG.name(p)}: <strong>৳${p.avgPrice}</strong> <span class="trend-badge ${badgeClass}">${badgeText}</span></span>`;
            }).join('');
            track.innerHTML = items + items;
            lucide.createIcons();
        })();

        // Trending
        (async () => {
            const trending = await PWBD.apiFetch('/trending') || [];
            const grid = document.getElementById('trendingGrid');
            const top = trending.slice(0, 3);
            if (!top.length) { grid.innerHTML = '<p style="color:var(--text-muted)">No data yet</p>'; return; }
            grid.innerHTML = top.map(p => {
                let badgeClass = p.trend > 0 ? "up" : (p.trend < 0 ? "down" : "flat");
                let badgeText = p.trend > 0 ? `<i data-lucide="trending-up"></i>` : (p.trend < 0 ? `<i data-lucide="trending-down"></i>` : `<i data-lucide="minus"></i>`);
                return `
                <div class="chart-card" onclick="window.location='/prediction.html?id=${p.id}'" style="cursor:pointer">
                    <div class="chart-card-header">
                        <span class="chart-card-title"><i data-lucide="${p.icon || 'box'}"></i> ${PWBD.LANG.name(p)}</span>
                        <span class="trend-badge ${badgeClass}">${badgeText}</span>
                    </div>
                    <div style="font-size:1.6rem;font-weight:800;color:var(--green-700);margin:8px 0">৳${p.avgPrice ?? '—'} <small style="font-weight:600;font-size:0.85rem;color:var(--text-muted)">/ ${p.unit}</small></div>
                    <canvas id="trend_${p.id}" style="height:80px;width:100%"></canvas>
                </div>`;
            }).join('');
            lucide.createIcons();
            requestAnimationFrame(() => {
                top.forEach(p => PWBD.drawSparkline(document.getElementById('trend_' + p.id), p.history, p.trend >= 0 ? '#ef4444' : '#16a34a'));
            });
        })();

        // Products
        (async () => {
            const products = await PWBD.apiFetch('/products') || [];
            const grid = document.getElementById('productsGrid');
            grid.innerHTML = products.slice(0, 12).map(p => `
                <div class="product-card" onclick="window.location='/product.html?id=${p.id}'">
                    <div class="card-icon"><i data-lucide="${p.icon || 'box'}" style="width:28px;height:28px"></i></div>
                    <div class="card-name">${PWBD.LANG.name(p)}</div>
                    <div class="card-name-sub">${PWBD.LANG.current === 'bn' ? p.nameEn : p.name}</div>
                    <div class="card-price-row"><span class="card-price">৳${p.avgPrice ?? '—'}</span><span class="card-unit">/ ${p.unit}</span></div>
                </div>`).join('');
            lucide.createIcons();
        })();
    </script>
</body>
</html>
