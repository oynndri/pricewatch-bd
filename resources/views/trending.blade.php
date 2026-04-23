<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ট্রেন্ডিং — PriceWatch BD</title>
    <meta name="description" content="See which products are rising or falling in price across Bangladesh markets.">
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" class="active" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a><a href="/prediction.html" data-bn="পূর্বাভাস" data-en="Prediction">পূর্বাভাস</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner" style="background:linear-gradient(135deg,var(--gray-900),var(--gray-800))"><div class="container"><h1 data-bn="<i data-lucide='trending-up'></i> দামের ট্রেন্ড ড্যাশবোর্ড" data-en="<i data-lucide='trending-up'></i> Price Trend Dashboard"><i data-lucide="trending-up"></i> দামের ট্রেন্ড ড্যাশবোর্ড</h1><p data-bn="বাংলাদেশের বাজারে গত ৭ দিনের দামের উত্থান-পতন" data-en="Live price movements across Bangladesh markets — last 7 days">বাংলাদেশের বাজারে গত ৭ দিনের দামের উত্থান-পতন</p></div></div>

    <main class="page" style="padding-top:0"><div class="container">
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:24px;margin-top:24px;margin-bottom:40px" id="kpiRow"><div class="loading"><div class="spinner"></div></div></div>
        
        <div class="section-header"><h2 class="section-title" data-bn="<i data-lucide='activity'></i> সকল পণ্য — <span>দামের পরিবর্তন</span>" data-en="<i data-lucide='activity'></i> All Products — <span>Movement</span>"><i data-lucide="activity"></i> সকল পণ্য — <span>দামের পরিবর্তন</span></h2></div>
        
        <div class="table-wrap" style="margin-bottom:48px"><table><thead><tr><th data-bn="পণ্য" data-en="Product">পণ্য</th><th data-bn="বিভাগ" data-en="Category">বিভাগ</th><th data-bn="গড় দাম" data-en="Avg Price">গড় দাম</th><th data-bn="৭ দিনের পরিবর্তন" data-en="7d Change">৭ দিনের পরিবর্তন</th><th data-bn="দিকনির্দেশনা" data-en="Direction">দিকনির্দেশনা</th><th data-bn="পূর্বাভাস" data-en="Predict">পূর্বাভাস</th></tr></thead><tbody id="trendTableBody"><tr><td colspan="6"><div class="loading"><div class="spinner"></div></div></td></tr></tbody></table></div>
        
        <div class="section-header"><h2 class="section-title" data-bn="<i data-lucide='bar-chart-2'></i> স্পার্কলাইন <span>চার্ট</span>" data-en="<i data-lucide='bar-chart-2'></i> Sparkline <span>Charts</span>"><i data-lucide="bar-chart-2"></i> স্পার্কলাইন <span>চার্ট</span></h2></div>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:24px;" id="sparklineGrid"><div class="loading"><div class="spinner"></div></div></div>
    </div></main>

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
        async function load() {
            const trending = await PWBD.apiFetch('/trending') || [];
            const top50 = trending.slice(0, 50);
            const rising = top50.filter(p => p.trend > 0);
            const falling = top50.filter(p => p.trend < 0);
            const stable = top50.filter(p => p.trend === 0);
            const largest = top50.reduce((a, b) => Math.abs(b.trend) > Math.abs(a.trend) ? b : a, { trend: 0, nameEn: '—' });

            document.getElementById('kpiRow').innerHTML = `
                <div class="stat-card" style="display:flex;align-items:center;gap:20px;text-align:left;padding:24px"><span style="color:var(--red-500);background:var(--red-100);padding:12px;border-radius:12px"><i data-lucide="trending-up" style="width:32px;height:32px"></i></span><div><div style="font-size:1.8rem;font-weight:800;color:var(--gray-900);line-height:1">${rising.length}</div><div style="font-size:.85rem;color:var(--gray-500);margin-top:4px;font-weight:600" data-bn="দাম বৃদ্ধি" data-en="Rising">দাম বৃদ্ধি</div></div></div>
                <div class="stat-card" style="display:flex;align-items:center;gap:20px;text-align:left;padding:24px"><span style="color:var(--green-700);background:var(--green-100);padding:12px;border-radius:12px"><i data-lucide="trending-down" style="width:32px;height:32px"></i></span><div><div style="font-size:1.8rem;font-weight:800;color:var(--gray-900);line-height:1">${falling.length}</div><div style="font-size:.85rem;color:var(--gray-500);margin-top:4px;font-weight:600" data-bn="দাম হ্রাস" data-en="Falling">দাম হ্রাস</div></div></div>
                <div class="stat-card" style="display:flex;align-items:center;gap:20px;text-align:left;padding:24px"><span style="color:var(--gray-600);background:var(--gray-100);padding:12px;border-radius:12px"><i data-lucide="minus" style="width:32px;height:32px"></i></span><div><div style="font-size:1.8rem;font-weight:800;color:var(--gray-900);line-height:1">${stable.length}</div><div style="font-size:.85rem;color:var(--gray-500);margin-top:4px;font-weight:600" data-bn="স্থিতিশীল" data-en="Stable">স্থিতিশীল</div></div></div>
                <div class="stat-card" style="display:flex;align-items:center;gap:20px;text-align:left;padding:24px"><span style="color:${largest.trend > 0 ? 'var(--red-500)' : 'var(--green-700)'};background:${largest.trend > 0 ? 'var(--red-100)' : 'var(--green-100)'};padding:12px;border-radius:12px"><i data-lucide="alert-triangle" style="width:32px;height:32px"></i></span><div><div style="font-size:1.8rem;font-weight:800;color:var(--gray-900);line-height:1">${Math.abs(largest.trend).toFixed(1)}%</div><div style="font-size:.85rem;color:var(--gray-500);margin-top:4px;font-weight:600">${PWBD.LANG.name(largest)}</div></div></div>`;

            document.getElementById('trendTableBody').innerHTML = top50.map(p => {
                let badgeClass = p.trend > 0 ? "up" : (p.trend < 0 ? "down" : "flat");
                let badgeText = p.trend > 0 ? `<i data-lucide="arrow-up-right"></i>` : (p.trend < 0 ? `<i data-lucide="arrow-down-right"></i>` : `<i data-lucide="arrow-right"></i>`);
                return `
                <tr style="cursor:pointer" onclick="window.location='/product.html?id=${p.id}'">
                    <td>
                        <div style="display:flex;align-items:center;gap:12px">
                            <span style="background:var(--gray-100);padding:10px;border-radius:10px;color:var(--gray-700)"><i data-lucide="${p.icon || 'box'}" style="width:20px;height:20px"></i></span>
                            <div><div style="font-weight:700;font-size:1.05rem">${PWBD.LANG.name(p)}</div><div style="font-size:.8rem;color:var(--gray-500)">${PWBD.LANG.current === 'bn' ? p.nameEn : p.name}</div></div>
                        </div>
                    </td>
                    <td><span style="text-transform:capitalize;font-size:.85rem;background:var(--gray-100);padding:4px 10px;border-radius:6px;font-weight:600;color:var(--gray-600)">${p.category}</span></td>
                    <td style="font-weight:800;color:var(--green-700);font-size:1.1rem">৳${p.avgPrice ?? '—'}</td>
                    <td style="font-weight:800;color:${p.trend > 0 ? 'var(--red-500)' : p.trend < 0 ? 'var(--green-600)' : 'var(--gray-500)'}">${p.trend > 0 ? '+' : ''}${p.trend}%</td>
                    <td><span class="trend-badge ${badgeClass}">${badgeText}</span></td>
                    <td><a href="/prediction.html?id=${p.id}" style="color:var(--green-600);font-weight:700;font-size:.85rem;display:flex;align-items:center;gap:4px" data-bn="<i data-lucide='sparkles' style='width:14px'></i> দেখুন" data-en="<i data-lucide='sparkles' style='width:14px'></i> View"><i data-lucide="sparkles" style="width:14px"></i> দেখুন</a></td>
                </tr>`;
            }).join('');

            const sgrid = document.getElementById('sparklineGrid');
            sgrid.innerHTML = top50.slice(0, 12).map(p => {
                let badgeClass = p.trend > 0 ? "up" : (p.trend < 0 ? "down" : "flat");
                let badgeText = p.trend > 0 ? `<i data-lucide="trending-up"></i>` : (p.trend < 0 ? `<i data-lucide="trending-down"></i>` : `<i data-lucide="minus"></i>`);
                return `
                <div class="chart-card">
                    <div class="chart-card-header">
                        <div style="display:flex;align-items:center;gap:8px"><i data-lucide="${p.icon || 'box'}" style="color:var(--gray-500)"></i><strong style="font-size:1.05rem">${PWBD.LANG.name(p)}</strong></div>
                        <span class="trend-badge ${badgeClass}">${badgeText}</span>
                    </div>
                    <canvas id="spark_${p.id}" style="height:60px;width:100%"></canvas>
                </div>`;
            }).join('');
            
            lucide.createIcons();
            PWBD.LANG.init();
            
            requestAnimationFrame(() => { top50.slice(0, 12).forEach(p => { PWBD.drawSparkline(document.getElementById('spark_' + p.id), p.history, p.trend >= 0 ? '#ef4444' : '#16a34a'); }); });
        }
        load();
    </script>
</body>
</html>
