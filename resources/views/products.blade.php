<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পণ্যসমূহ — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" class="active" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a><a href="/prediction.html" data-bn="পূর্বাভাস" data-en="Prediction">পূর্বাভাস</a><a href="/submit.html" data-bn="দাম জমা দিন" data-en="Submit Price">দাম জমা দিন</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner">
        <div class="container">
            <h1 data-bn="<i data-lucide='package'></i> সকল পণ্য" data-en="<i data-lucide='package'></i> All Products"><i data-lucide="package"></i> সকল পণ্য</h1>
            <p data-bn="বাংলাদেশের বাজারের দৈনন্দিন খাদ্যপণ্যের রিয়েল টাইম দাম জানুন" data-en="Track real-time prices of daily essentials in Bangladesh">বাংলাদেশের বাজারের দৈনন্দিন খাদ্যপণ্যের রিয়েল টাইম দাম জানুন</p>
        </div>
    </div>

    <main class="page"><div class="container">
        <div class="filters-bar">
            <div class="filter-group" style="flex:2">
                <label data-bn="পণ্য খুঁজুন" data-en="Search Product">পণ্য খুঁজুন</label>
                <div style="position:relative;display:flex;align-items:center">
                    <span style="position:absolute;left:14px;color:var(--gray-400)"><i data-lucide="search" style="width:20px"></i></span>
                    <input type="text" id="searchInput" style="padding-left:42px" data-bn-placeholder="চাল, ডাল, তেল..." data-en-placeholder="Rice, Dal, Oil...">
                    <button class="voice-btn" id="searchInputVoice" style="position:absolute;right:8px"><i data-lucide="mic"></i></button>
                </div>
            </div>
            <div class="filter-group">
                <label data-bn="ক্যাটাগরি" data-en="Category">ক্যাটাগরি</label>
                <select id="categorySelect">
                    <option value="" data-bn="সব ক্যাটাগরি" data-en="All Categories">সব ক্যাটাগরি</option>
                    <option value="rice" data-bn="চাল" data-en="Rice">চাল</option>
                    <option value="lentils" data-bn="ডাল" data-en="Lentils">ডাল</option>
                    <option value="vegetables" data-bn="শাকসবজি" data-en="Vegetables">শাকসবজি</option>
                    <option value="fish" data-bn="মাছ" data-en="Fish">মাছ</option>
                    <option value="meat" data-bn="মাংস" data-en="Meat">মাংস</option>
                    <option value="oil" data-bn="তেল" data-en="Oil">তেল</option>
                    <option value="dairy" data-bn="দুধ ও ডিম" data-en="Dairy">দুধ ও ডিম</option>
                </select>
            </div>
        </div>

        <div class="cards-grid" id="productsGrid"><div class="loading"><div class="spinner"></div></div></div>
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
        PWBD.initVoiceSearch('searchInput');
        let allProducts = [];

        async function loadProducts() {
            allProducts = await PWBD.apiFetch('/products') || [];
            filterProducts();
        }

        function filterProducts() {
            const q = document.getElementById('searchInput').value.toLowerCase();
            const c = document.getElementById('categorySelect').value;
            const filtered = allProducts.filter(p => {
                const matchQ = p.name.toLowerCase().includes(q) || (p.nameEn && p.nameEn.toLowerCase().includes(q));
                const matchC = c ? p.category === c : true;
                return matchQ && matchC;
            });
            
            const grid = document.getElementById('productsGrid');
            if (filtered.length === 0) {
                grid.innerHTML = '<div style="text-align:center;grid-column:1/-1;padding:40px;color:var(--text-muted)">কোন পণ্য পাওয়া যায়নি।</div>';
                return;
            }
            grid.innerHTML = filtered.map(p => `
                <div class="product-card" onclick="window.location='/product.html?id=${p.id}'">
                    <div class="card-icon"><i data-lucide="${p.icon || 'box'}" style="width:28px;height:28px"></i></div>
                    <div class="card-name">${PWBD.LANG.name(p)}</div>
                    <div class="card-name-sub">${PWBD.LANG.current === 'bn' ? p.nameEn : p.name}</div>
                    <div class="card-price-row"><span class="card-price">৳${p.avgPrice ?? '—'}</span><span class="card-unit">/ ${p.unit}</span></div>
                </div>`).join('');
            lucide.createIcons();
        }

        document.getElementById('searchInput').addEventListener('input', filterProducts);
        document.getElementById('categorySelect').addEventListener('change', filterProducts);

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('q')) { document.getElementById('searchInput').value = urlParams.get('q'); }
        if (urlParams.has('category')) { document.getElementById('categorySelect').value = urlParams.get('category'); }

        loadProducts();
    </script>
</body>
</html>
