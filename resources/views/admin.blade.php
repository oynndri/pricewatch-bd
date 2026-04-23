<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>অ্যাডমিন ড্যাশবোর্ড — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><div class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a></div><div class="nav-right" id="navRight"></div></div></nav>

    <div class="page-banner" style="background:linear-gradient(135deg,var(--gray-900),var(--gray-800))"><div class="container"><h1 data-bn="<i data-lucide='shield-check'></i> অ্যাডমিন ড্যাশবোর্ড" data-en="<i data-lucide='shield-check'></i> Admin Dashboard"><i data-lucide="shield-check"></i> অ্যাডমিন ড্যাশবোর্ড</h1><p data-bn="দাম যাচাই করুন, ডেটা রিফ্রেশ করুন এবং সিস্টেম পরিচালনা করুন" data-en="Verify prices, refresh data, and manage the system">দাম যাচাই করুন, ডেটা রিফ্রেশ করুন এবং সিস্টেম পরিচালনা করুন</p></div></div>

    <main class="container">
        <!-- Auto Price Refresh -->
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-top:40px;margin-bottom:48px">
            <div style="background:linear-gradient(135deg,var(--green-50),white);border:1px solid var(--green-300);border-radius:var(--radius-xl);padding:36px;box-shadow:var(--shadow-sm)">
                <h3 style="color:var(--green-800);margin-bottom:8px;font-size:1.3rem;font-weight:800;display:flex;align-items:center;gap:8px" data-bn="<i data-lucide='refresh-cw'></i> স্বয়ংক্রিয় দাম আপডেট" data-en="<i data-lucide='refresh-cw'></i> Auto Price Refresh"><i data-lucide="refresh-cw"></i> স্বয়ংক্রিয় দাম আপডেট</h3>
                <p style="font-size:0.95rem;color:var(--green-700);margin-bottom:24px;font-weight:500" data-bn="ইন্টারনেট থেকে লাইভ বাজার দর কালেক্ট করে ডেটাবেস আপডেট করুন" data-en="Collect live market prices from internet and update database">ইন্টারনেট থেকে লাইভ বাজার দর কালেক্ট করে ডেটাবেস আপডেট করুন</p>
                <button id="refreshBtn" class="btn btn-primary" onclick="refreshPrices()" style="font-size:1.05rem" data-bn="<i data-lucide='download-cloud'></i> এখনই দাম আপডেট করুন" data-en="<i data-lucide='download-cloud'></i> Refresh Prices Now"><i data-lucide="download-cloud"></i> এখনই দাম আপডেট করুন</button>
                <div id="refreshResult" style="margin-top:16px;font-size:0.9rem;font-weight:600;color:var(--green-700);display:none;background:white;padding:12px;border-radius:12px;border:1px dashed var(--green-300)"></div>
            </div>
            <div style="background:linear-gradient(135deg,#f0f9ff,white);border:1px solid #bae6fd;border-radius:var(--radius-xl);padding:36px;box-shadow:var(--shadow-sm)">
                <h3 style="color:#0369a1;margin-bottom:16px;font-size:1.3rem;font-weight:800;display:flex;align-items:center;gap:8px" data-bn="<i data-lucide='bar-chart'></i> সিস্টেম সারাংশ" data-en="<i data-lucide='bar-chart'></i> System Summary"><i data-lucide="bar-chart"></i> সিস্টেম সারাংশ</h3>
                <div id="adminStats"><div class="loading"><div class="spinner" style="border-color:#e0f2fe;border-top-color:#0284c7"></div></div></div>
            </div>
        </div>

        <div class="section-header">
            <h2 class="section-title" data-bn="<i data-lucide='check-square'></i> পেন্ডিং <span>সাবমিশন</span>" data-en="<i data-lucide='check-square'></i> Pending <span>Submissions</span>"><i data-lucide="check-square"></i> পেন্ডিং <span>সাবমিশন</span></h2>
            <div id="pendingCount" class="trend-badge flat" style="font-size:1rem;padding:6px 16px">0 pending</div>
        </div>
        
        <div class="table-wrap">
            <table style="min-width:100%">
                <thead><tr><th>Product</th><th>Market</th><th>Price</th><th>User</th><th>Date</th><th>Actions</th></tr></thead>
                <tbody id="pendingTableBody"><tr><td colspan="6" style="text-align:center;padding:60px;color:var(--gray-500)"><div class="loading"><div class="spinner"></div></div></td></tr></tbody>
            </table>
        </div>
    </main>

    <div class="toast-container" id="toastContainer"></div>

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

    <script src="/app.js"></script>
    <script>
        lucide.createIcons();
        document.addEventListener('DOMContentLoaded', async () => {
            await PWBD.initNav();
            const user = PWBD.currentUser;
            if (!user || user.role !== 'admin') { window.location = '/'; return; }
            loadPending();
            loadAdminStats();
        });

        async function loadAdminStats() {
            const stats = await PWBD.apiFetch('/stats') || {};
            document.getElementById('adminStats').innerHTML = `
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
                    <div style="text-align:center;padding:16px;background:white;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.03);border:1px solid #e0f2fe">
                        <div style="font-size:1.8rem;font-weight:800;color:#0369a1;line-height:1">${stats.totalProducts || 0}</div>
                        <div style="font-size:0.85rem;color:#0ea5e9;font-weight:700;margin-top:4px;text-transform:uppercase">Products</div>
                    </div>
                    <div style="text-align:center;padding:16px;background:white;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.03);border:1px solid #e0f2fe">
                        <div style="font-size:1.8rem;font-weight:800;color:#0369a1;line-height:1">${stats.totalMarkets || 0}</div>
                        <div style="font-size:0.85rem;color:#0ea5e9;font-weight:700;margin-top:4px;text-transform:uppercase">Markets</div>
                    </div>
                    <div style="text-align:center;padding:16px;background:white;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.03);border:1px solid #e0f2fe">
                        <div style="font-size:1.8rem;font-weight:800;color:#0369a1;line-height:1">${stats.totalPriceUpdates || 0}</div>
                        <div style="font-size:0.85rem;color:#0ea5e9;font-weight:700;margin-top:4px;text-transform:uppercase">Prices</div>
                    </div>
                    <div style="text-align:center;padding:16px;background:white;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.03);border:1px solid #e0f2fe">
                        <div style="font-size:1.8rem;font-weight:800;color:#0369a1;line-height:1">${stats.totalUsers || 0}</div>
                        <div style="font-size:0.85rem;color:#0ea5e9;font-weight:700;margin-top:4px;text-transform:uppercase">Users</div>
                    </div>
                </div>`;
            PWBD.LANG.init();
        }

        async function refreshPrices() {
            const btn = document.getElementById('refreshBtn');
            btn.innerHTML = '<div class="spinner" style="width:20px;height:20px;border-width:2px;border-top-color:white;display:inline-block"></div> Updating...'; 
            btn.disabled = true;
            const res = await PWBD.apiFetch('/admin/refresh-prices', { method: 'POST' });
            btn.innerHTML = PWBD.LANG.get('<i data-lucide="download-cloud"></i> এখনই দাম আপডেট করুন', '<i data-lucide="download-cloud"></i> Refresh Prices Now'); 
            lucide.createIcons();
            btn.disabled = false;
            const resultEl = document.getElementById('refreshResult');
            if (res && res.success) {
                resultEl.style.display = 'block';
                resultEl.innerHTML = `<i data-lucide="check-circle" style="width:16px;color:var(--green-600);vertical-align:middle"></i> ${res.message}<br><i data-lucide="clock" style="width:14px;color:var(--gray-500);vertical-align:middle;margin-top:4px"></i> ${res.timestamp}`;
                lucide.createIcons();
                PWBD.showToast(PWBD.LANG.get('দাম সফলভাবে আপডেট হয়েছে!', 'Prices updated successfully!'));
                loadAdminStats();
            } else {
                PWBD.showToast('Failed to refresh', 'error');
            }
        }

        async function loadPending() {
            const res = await PWBD.apiFetch('/admin/pending-prices');
            const body = document.getElementById('pendingTableBody');
            const count = document.getElementById('pendingCount');
            
            if (!res || res.error || !Array.isArray(res)) {
                const errorMsg = res?.error || 'Failed to load data';
                body.innerHTML = `<tr><td colspan="6" style="text-align:center;padding:60px;color:var(--red-600)">
                    <i data-lucide="alert-circle" style="width:48px;height:48px;margin-bottom:16px"></i>
                    <h3>${errorMsg}</h3>
                    <p>${errorMsg === 'Admin access required' ? 'Your session may have expired. Please login again.' : ''}</p></td></tr>`;
                lucide.createIcons();
                count.innerHTML = '<span style="color:var(--red-500)">Error loading</span>';
                return;
            }

            if (res.length === 0) { 
                body.innerHTML = `<tr><td colspan="6" style="text-align:center;padding:60px"><i data-lucide="check-circle" style="width:48px;height:48px;color:var(--green-400);margin-bottom:16px"></i><h3 style="color:var(--gray-600)">No pending submissions!</h3></td></tr>`;
                lucide.createIcons();
                count.innerHTML = '<i data-lucide="check"></i> 0 pending'; 
                return; 
            }
            count.textContent = `${res.length} pending`;
            body.innerHTML = res.map(item => `
                <tr>
                    <td><strong>${item.productName}</strong></td>
                    <td>${item.marketName}</td>
                    <td style="color:var(--green-700);font-weight:800;font-size:1.1rem">৳${item.price}</td>
                    <td><div style="display:flex;align-items:center;gap:6px"><i data-lucide="user" style="width:14px;color:var(--gray-400)"></i> ${item.submittedBy}</div></td>
                    <td style="font-size:0.9rem;color:var(--gray-600);font-weight:500">${new Date(item.date).toLocaleDateString('en-GB')}</td>
                    <td>
                        <div style="display:flex;gap:8px">
                            <button onclick="verify(${item.id},'approve')" class="btn btn-primary" style="padding:6px 12px;font-size:0.85rem"><i data-lucide="check"></i> Verify</button>
                            <button onclick="verify(${item.id},'reject')" class="btn btn-outline" style="padding:6px 12px;font-size:0.85rem;color:var(--red-600);border-color:var(--red-200)"><i data-lucide="x"></i> Reject</button>
                        </div>
                    </td>
                </tr>`).join('');
            lucide.createIcons();
        }

        async function verify(id, action) {
            const res = await PWBD.apiFetch('/admin/verify-price/' + id, { method: 'POST', body: JSON.stringify({ action }) });
            if (res && res.success) { PWBD.showToast(res.message, action === 'approve' ? 'success' : 'info'); loadPending(); }
        }
    </script>
</body>
</html>
