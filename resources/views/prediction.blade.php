<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পূর্বাভাস — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a><a href="/prediction.html" class="active" data-bn="পূর্বাভাস" data-en="Prediction">পূর্বাভাস</a><a href="/submit.html" data-bn="দাম জমা দিন" data-en="Submit Price">দাম জমা দিন</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner" style="background:linear-gradient(135deg,var(--gray-900),var(--gray-800))">
        <div class="container">
            <h1 data-bn="<i data-lucide='sparkles'></i> AI দাম পূর্বাভাস" data-en="<i data-lucide='sparkles'></i> AI Price Prediction"><i data-lucide="sparkles"></i> AI দাম পূর্বাভাস</h1>
            <p data-bn="ঐতিহাসিক ডেটার উপর ভিত্তি করে আগামী ৭ দিনের বাজার দর জানুন" data-en="Next 7 days market price forecast based on historical data">ঐতিহাসিক ডেটার উপর ভিত্তি করে আগামী ৭ দিনের বাজার দর জানুন</p>
        </div>
    </div>

    <main class="page"><div class="container">
        <div class="filters-bar" style="max-width:600px;margin:0 auto 40px">
            <div class="filter-group">
                <label data-bn="পণ্য নির্বাচন করুন" data-en="Select Product">পণ্য নির্বাচন করুন</label>
                <select id="productSelect"><option value="">Loading...</option></select>
            </div>
            <button class="btn btn-primary" onclick="loadPrediction()"><i data-lucide="search"></i> <span data-bn="পূর্বাভাস দেখুন" data-en="View Forecast">পূর্বাভাস দেখুন</span></button>
        </div>

        <div id="predictionContent" style="display:none">
            <div style="display:grid;grid-template-columns:1fr 340px;gap:32px;align-items:start">
                <div class="prediction-card">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
                        <div style="display:flex;align-items:center;gap:16px">
                            <div style="font-size:2.5rem;color:var(--green-600)" id="predIcon"><i data-lucide="box"></i></div>
                            <div><h2 style="font-size:1.8rem;font-weight:800;color:var(--gray-900)" id="predName">...</h2><div id="predCategory" style="color:var(--gray-500);font-weight:600;text-transform:uppercase;font-size:0.85rem">...</div></div>
                        </div>
                        <div id="predTrendBadge"></div>
                    </div>
                    <div style="height:350px"><canvas id="predChart"></canvas></div>
                </div>

                <div style="display:flex;flex-direction:column;gap:20px">
                    <div class="prediction-card">
                        <h3 style="font-size:1.1rem;margin-bottom:16px;display:flex;align-items:center;gap:8px" data-bn="<i data-lucide='activity'></i> AI বিশ্লেষণ" data-en="<i data-lucide='activity'></i> AI Analysis"><i data-lucide="activity"></i> AI বিশ্লেষণ</h3>
                        <div style="font-size:2.5rem;font-weight:800;color:var(--gray-900);line-height:1">৳<span id="predCurrent">0</span></div>
                        <div style="color:var(--gray-500);font-size:0.9rem;font-weight:600;margin-bottom:20px" data-bn="বর্তমান গড় দাম" data-en="Current Avg Price">বর্তমান গড় দাম</div>
                        
                        <div style="margin-bottom:8px;display:flex;justify-content:space-between;font-size:0.85rem;font-weight:700">
                            <span data-bn="নির্ভুলতার হার" data-en="Confidence Score">নির্ভুলতার হার</span>
                            <span id="predConfidence" style="color:var(--green-700)">0%</span>
                        </div>
                        <div class="confidence-bar"><div class="confidence-fill" id="predConfidenceBar"></div></div>
                        <p id="predAdvice" style="margin-top:20px;padding:16px;background:var(--green-50);border:1px solid var(--green-200);border-radius:var(--radius-sm);font-weight:600;font-size:0.95rem;color:var(--green-800);display:flex;align-items:start;gap:12px"></p>
                    </div>

                    <div class="table-wrap">
                        <table style="min-width:100%">
                            <thead><tr><th data-bn="তারিখ" data-en="Date">তারিখ</th><th style="text-align:right" data-bn="আনুমানিক দাম" data-en="Predicted Price">আনুমানিক দাম</th></tr></thead>
                            <tbody id="predDaysBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="loadingState" style="display:none;text-align:center;padding:100px 0"><div class="spinner" style="margin:0 auto"></div><p style="margin-top:16px;color:var(--gray-500);font-weight:600">Analyzing market data...</p></div>
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
        let chartInstance = null;

        async function init() {
            const products = await PWBD.apiFetch('/products') || [];
            const select = document.getElementById('productSelect');
            select.innerHTML = '<option value="">পণ্য নির্বাচন করুন...</option>' + products.map(p => `<option value="${p.id}">${p.name} (${p.nameEn})</option>`).join('');
            
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('id')) { select.value = urlParams.get('id'); loadPrediction(); }
        }

        async function loadPrediction() {
            const pid = document.getElementById('productSelect').value;
            if(!pid) return;
            document.getElementById('predictionContent').style.display='none';
            document.getElementById('loadingState').style.display='block';
            
            history.pushState(null, '', '?id=' + pid);
            const res = await PWBD.apiFetch('/predictions/' + pid);
            document.getElementById('loadingState').style.display='none';
            
            if(!res || !res.product) return PWBD.showToast('Failed to load data', 'error');
            document.getElementById('predictionContent').style.display='block';
            
            const p = res.product;
            document.getElementById('predIcon').innerHTML = `<i data-lucide="${p.icon || 'box'}"></i>`;
            document.getElementById('predName').textContent = PWBD.LANG.name(p);
            document.getElementById('predCategory').textContent = p.category;
            
            let badgeHtml = '';
            let advice = {};
            if(res.trend === 'rising') {
                badgeHtml = `<span class="trend-badge up"><i data-lucide="trending-up"></i> ${PWBD.LANG.get('দাম বাড়ছে','Rising')}</span>`;
                advice = { bn: '<i data-lucide="alert-triangle"></i> দাম দ্রুত বাড়ছে। আজই কিনে রাখা ভালো হতে পারে।', en: '<i data-lucide="alert-triangle"></i> Prices are rising. You should buy now.'};
            } else if(res.trend === 'falling') {
                badgeHtml = `<span class="trend-badge down"><i data-lucide="trending-down"></i> ${PWBD.LANG.get('দাম কমছে','Falling')}</span>`;
                advice = { bn: '<i data-lucide="thumbs-up"></i> দাম কমছে। কয়েকদিন অপেক্ষা করলে আরও কমে পেতে পারেন।', en: '<i data-lucide="thumbs-up"></i> Prices are falling. Waiting might save you money.'};
            } else {
                badgeHtml = `<span class="trend-badge flat"><i data-lucide="minus"></i> ${PWBD.LANG.get('স্থিতিশীল','Stable')}</span>`;
                advice = { bn: '<i data-lucide="check-circle"></i> দাম স্থিতিশীল আছে। স্বাভাবিক কেনাকাটা করতে পারেন।', en: '<i data-lucide="check-circle"></i> Prices are stable. Normal buying is fine.'};
            }
            document.getElementById('predTrendBadge').innerHTML = badgeHtml;
            document.getElementById('predCurrent').textContent = res.currentAvg;
            
            const confPct = Math.round(res.confidence * 100);
            document.getElementById('predConfidence').textContent = confPct + '%';
            document.getElementById('predConfidenceBar').style.width = confPct + '%';
            
            const adviceEl = document.getElementById('predAdvice');
            adviceEl.innerHTML = PWBD.LANG.current === 'bn' ? advice.bn : advice.en;
            adviceEl.dataset.bn = advice.bn; adviceEl.dataset.en = advice.en;

            document.getElementById('predDaysBody').innerHTML = res.predictions.map((prd, i) => `
                <tr>
                    <td style="font-size:0.85rem;color:var(--gray-600)">${new Date(prd.date).toLocaleDateString('en-GB',{weekday:'short', month:'short', day:'numeric'})}</td>
                    <td style="text-align:right;font-weight:800;color:var(--gray-900)">৳${prd.predicted}</td>
                </tr>
            `).join('');

            updateChart(res.historyDates, res.history, res.predictions);
            lucide.createIcons();
            PWBD.LANG.init();
        }

        function updateChart(hDates, hVals, preds) {
            const ctx = document.getElementById('predChart').getContext('2d');
            if(chartInstance) chartInstance.destroy();
            
            const labels = [...hDates.map(d=>d.split('-').slice(1).join('/')), ...preds.map(p=>p.date.split('-').slice(1).join('/'))];
            const dataH = [...hVals, ...Array(preds.length).fill(null)];
            const dataP = [...Array(hVals.length-1).fill(null), hVals[hVals.length-1], ...preds.map(p=>p.predicted)];
            
            chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        { label: 'Historical (৳)', data: dataH, borderColor: '#475569', backgroundColor: '#47556920', tension: 0.3, fill: true, pointRadius: 4, pointBackgroundColor: '#475569' },
                        { label: 'Predicted (৳)', data: dataP, borderColor: '#3b82f6', borderDash: [5,5], backgroundColor: '#3b82f620', tension: 0.3, fill: true, pointRadius: 4, pointBackgroundColor: '#3b82f6' }
                    ]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: { tooltip: { backgroundColor: '#1e293b', titleFont: {family:'Outfit'}, bodyFont: {family:'Outfit'}, padding: 12 } },
                    scales: {
                        x: { grid: { display: false } },
                        y: { grid: { color: '#f1f5f9' }, min: Math.floor(Math.min(...hVals, ...preds.map(p=>p.predicted)) * 0.95) }
                    }
                }
            });
        }

        init();
    </script>
</body>
</html>
