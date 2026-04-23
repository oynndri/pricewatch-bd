<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" class="active" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a><a href="/prediction.html" data-bn="পূর্বাভাস" data-en="Prediction">পূর্বাভাস</a><a href="/submit.html" data-bn="দাম জমা দিন" data-en="Submit Price">দাম জমা দিন</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <main class="page"><div class="container" id="pageContent"><div class="loading"><div class="spinner"></div></div></div></main>

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
        const productId = new URLSearchParams(window.location.search).get('id');
        if (!productId) window.location = '/products.html';

        async function load() {
            try {
                const p = await PWBD.apiFetch('/products/' + productId);
                
                // Detailed error handling
                if (!p || p.error || p.message) { 
                    const errorMsg = p?.error || p?.message || 'Product not found';
                    document.getElementById('pageContent').innerHTML = `
                        <div style="text-align:center;padding:100px;color:var(--gray-500)">
                            <i data-lucide="file-x" style="width:64px;height:64px;margin-bottom:16px"></i>
                            <h3>${errorMsg}</h3>
                            <a href="/products.html" class="btn btn-outline" style="margin-top:20px">Back to Products</a>
                        </div>`; 
                    lucide.createIcons(); 
                    return; 
                }

                document.title = PWBD.LANG.name(p) + ' — PriceWatch BD';
                const prices = p.prices || [];
                const lowest = prices.length ? prices.reduce((a, b) => a.price < b.price ? a : b) : null;
                const highest = prices.length ? prices.reduce((a, b) => a.price > b.price ? a : b) : null;
                
                let badgeClass = p.trend > 0 ? "up" : (p.trend < 0 ? "down" : "flat");
                let badgeText = p.trend > 0 ? `<i data-lucide="trending-up"></i>` : (p.trend < 0 ? `<i data-lucide="trending-down"></i>` : `<i data-lucide="minus"></i>`);

                document.getElementById('pageContent').innerHTML = `
                    <a href="/products.html" style="display:inline-flex;align-items:center;gap:6px;color:var(--green-600);font-weight:700;font-size:.95rem;margin-bottom:20px;padding:8px 16px;background:white;border-radius:99px;border:1px solid var(--border)" data-bn="<i data-lucide='arrow-left' style='width:16px'></i> পণ্যসমূহে ফিরুন" data-en="<i data-lucide='arrow-left' style='width:16px'></i> Back to Products"><i data-lucide="arrow-left" style="width:16px"></i> পণ্যসমূহে ফিরুন</a>
                    
                    <div style="background:white;border-radius:var(--radius-xl);padding:40px;box-shadow:var(--shadow-sm);border:1px solid var(--border)">
                        <div style="display:flex;flex-wrap:wrap;gap:40px;align-items:center">
                            <div style="width:120px;height:120px;background:var(--green-50);border-radius:24px;display:flex;align-items:center;justify-content:center;color:var(--green-600);font-size:3rem">
                                <i data-lucide="${p.icon || 'box'}" style="width:64px;height:64px"></i>
                            </div>
                            <div style="flex:1">
                                <h1 style="font-size:2.4rem;font-weight:800;color:var(--gray-900);line-height:1.2;margin-bottom:4px">${PWBD.LANG.name(p)}</h1>
                                <h2 style="font-size:1.1rem;font-weight:600;color:var(--gray-500);margin-bottom:12px">${p.nameEn || p.name}</h2>
                                <p style="color:var(--gray-600);font-size:1rem;margin-bottom:16px;max-width:600px">${p.description || ''}</p>
                                <div style="display:flex;align-items:center;gap:16px">
                                    <span class="trend-badge ${badgeClass}">${badgeText} ${p.trend || 0}%</span>
                                    <div style="font-weight:600;color:var(--gray-600)">Avg Price/Unit: <span style="font-size:1.25rem;color:var(--gray-900);font-weight:800">৳${p.avgPrice ?? '—'}</span></div>
                                </div>
                            </div>
                            <div style="display:flex;gap:20px">
                                <div style="text-align:center;background:var(--green-50);border:1px solid var(--green-200);border-radius:var(--radius);padding:24px;min-width:140px">
                                    <div style="font-size:.85rem;color:var(--green-800);font-weight:700;text-transform:uppercase" data-bn="সর্বনিম্ন" data-en="Lowest">সর্বনিম্ন</div>
                                    <div style="font-size:2rem;font-weight:800;color:var(--green-700);line-height:1.2;margin-top:8px">৳${lowest?.price ?? '—'}</div>
                                </div>
                                <div style="text-align:center;background:var(--red-50);border:1px solid var(--red-200);border-radius:var(--radius);padding:24px;min-width:140px">
                                    <div style="font-size:.85rem;color:var(--red-800);font-weight:700;text-transform:uppercase" data-bn="সর্বোচ্চ" data-en="Highest">সর্বোচ্চ</div>
                                    <div style="font-size:2rem;font-weight:800;color:var(--red-500);line-height:1.2;margin-top:8px">৳${highest?.price ?? '—'}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:3fr 1fr;gap:24px;margin-top:24px;margin-bottom:40px">
                        <div class="chart-card" style="height:350px;padding:32px">
                            <div class="chart-card-header"><span class="chart-card-title" data-bn="<i data-lucide='bar-chart-2'></i> ১৪ দিনের দামের ট্রেন্ড" data-en="<i data-lucide='bar-chart-2'></i> 14-Day Price Trend"><i data-lucide="bar-chart-2"></i> ১৪ দিনের দামের ট্রেন্ড</span></div>
                            <div style="height:250px;width:100%"><canvas id="mainChart"></canvas></div>
                        </div>
                        <div class="form-card" style="padding:32px;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center">
                            <i data-lucide="sparkles" style="width:48px;height:48px;color:#0ea5e9;margin-bottom:16px"></i>
                            <h3 style="font-size:1.4rem;font-weight:800;color:#0f172a;margin-bottom:12px" data-bn="AI দিয়ে ভবিষ্যৎ দাম জানুন" data-en="Predict future prices with AI">AI দিয়ে ভবিষ্যৎ দাম জানুন</h3>
                            <p style="color:var(--gray-500);font-size:0.95rem;margin-bottom:24px" data-bn="ঐতিহাসিক ডেটা বিশ্লেষণ করে আগামী ৭ দিনের দামের পূর্বাভাস দেখুন" data-en="Analyze historical data to see the 7-day future forecast">ঐতিহাসিক ডেটা বিশ্লেষণ করে আগামী ৭ দিনের দামের পূর্বাভাস দেখুন</p>
                            <a href="/prediction.html?id=${p.id}" class="btn btn-primary" style="background:#0ea5e9;width:100%" data-bn="<i data-lucide='sparkles'></i> পূর্বাভাস দেখুন" data-en="<i data-lucide='sparkles'></i> View Prediction"><i data-lucide="sparkles"></i> পূর্বাভাস দেখুন</a>
                        </div>
                    </div>

                    <div class="section-header">
                        <h2 class="section-title" data-bn="<i data-lucide='store'></i> বাজারভিত্তিক <span>দাম</span>" data-en="<i data-lucide='store'></i> Market <span>Prices</span>"><i data-lucide="store"></i> বাজারভিত্তিক <span>দাম</span></h2>
                        <a href="/submit.html?product=${p.id}" class="btn btn-outline" style="border:1px solid var(--border);color:var(--gray-700)"><i data-lucide="plus"></i> ${PWBD.LANG.get('নতুন দাম জমা দিন', 'Submit New Price')}</a>
                    </div>
                    
                    <div class="table-wrap">
                        <table>
                            <thead><tr><th>${PWBD.LANG.get('বাজার', 'Market')}</th><th>${PWBD.LANG.get('দাম', 'Price')}</th><th>${PWBD.LANG.get('তারিখ', 'Date')}</th><th>${PWBD.LANG.get('অবস্থা', 'Status')}</th></tr></thead>
                            <tbody>${prices.map(e => {
                                const market = e.market || {};
                                return `
                                    <tr>
                                        <td>
                                            <div style="display:flex;align-items:center;gap:12px">
                                                <div style="background:var(--gray-50);padding:10px;border-radius:10px"><i data-lucide="store" style="width:20px;height:20px;color:var(--gray-500)"></i></div>
                                                <div>
                                                    <strong style="color:var(--gray-900);font-size:1.05rem">${market.name || market.nameEn || 'Unknown Market'}</strong>
                                                    <div style="font-size:.85rem;color:var(--gray-500);font-weight:500;margin-top:2px"><i data-lucide="map-pin" style="width:12px;display:inline-block;margin-right:2px"></i> ${market.district || ''}, ${market.division || ''}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="font-weight:800;color:var(--gray-900);font-size:1.2rem">৳${e.price}</td>
                                        <td style="font-size:0.95rem;color:var(--gray-600);font-weight:500">${new Date(e.date).toLocaleDateString('en-GB', {day:'2-digit',month:'short',year:'numeric'})}</td>
                                        <td>${e.verified ? '<span class="market-badge wholesale" style="display:inline-flex;align-items:center;gap:4px;background:var(--green-50);color:var(--green-700)"><i data-lucide="check-circle" style="width:14px"></i> Verified</span>' : '<span class="market-badge retail" style="display:inline-flex;align-items:center;gap:4px"><i data-lucide="clock" style="width:14px"></i> Pending</span>'}</td>
                                    </tr>
                                `;
                            }).join('')}</tbody>
                        </table>
                    </div>`;

                lucide.createIcons();
                PWBD.LANG.init();
                
                requestAnimationFrame(() => {
                    if (p.history && p.history.length > 1) {
                        const ctx = document.getElementById('mainChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: { 
                                labels: p.history.map((_, i) => 'Day ' + (i + 1)), 
                                datasets: [{ label: '৳ Price', data: p.history, borderColor: p.trend >= 0 ? '#ef4444' : '#16a34a', backgroundColor: (p.trend >= 0 ? '#ef4444' : '#16a34a') + '15', fill: true, tension: 0.4, pointRadius: 5, pointBackgroundColor: 'white', pointBorderWidth: 2 }] 
                            },
                            options: { 
                                responsive: true, maintainAspectRatio: false, 
                                plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1e293b', padding: 12, titleFont: {family:'Outfit'}, bodyFont:{family:'Outfit'} } },
                                scales: {
                                    x: { grid: { display:false } },
                                    y: { grid: { color: '#f1f5f9' } }
                                }
                            }
                        });
                    }
                });
            } catch(error) {
                document.getElementById('pageContent').innerHTML = `<div style="padding:100px;text-align:center;color:red;font-size:24px;"><b>CRITICAL JS ERROR:</b> ${error.message}<br><small>${error.stack}</small></div>`;
                console.error("Load function error:", error);
            }
        }
        load();
    </script>
</body>
</html>
