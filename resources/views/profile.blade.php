<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রোফাইল — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><div class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a></div><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner" style="background:var(--gray-900)"><div class="container"><h1 data-bn="<i data-lucide='user'></i> ব্যবহারকারীর প্রোফাইল" data-en="<i data-lucide='user'></i> User Profile"><i data-lucide="user"></i> ব্যবহারকারীর প্রোফাইল</h1><p data-bn="আপনার কন্ট্রিবিউশন এবং অ্যাকাউন্টের সারাংশ" data-en="Your contributions and account summary">আপনার কন্ট্রিবিউশন এবং অ্যাকাউন্টের সারাংশ</p></div></div>

    <main class="page"><div class="container">
        <div style="background:white;border-radius:var(--radius-xl);padding:48px;box-shadow:var(--shadow-sm);border:1px solid var(--border);margin-bottom:40px;display:flex;align-items:center;gap:32px">
            <div style="width:100px;height:100px;background:linear-gradient(135deg,var(--green-500),var(--green-700));color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:3rem;font-weight:800;flex-shrink:0;box-shadow:0 8px 24px rgba(22,163,74,.3)" id="profileAvatar">A</div>
            <div>
                <h1 id="profileName" style="font-size:2rem;font-weight:800;color:var(--gray-900);line-height:1">Loading...</h1>
                <h2 id="profileEmail" style="font-size:1.1rem;color:var(--gray-500);font-weight:500;margin-top:8px">...</h2>
                <div style="margin-top:16px"><span class="market-badge wholesale" id="profileRole" style="font-size:0.85rem">User</span></div>
            </div>
        </div>
        
        <div class="stats-grid" style="margin-bottom:40px">
            <div class="stat-card" style="box-shadow:var(--shadow-sm)"><span class="ico"><i data-lucide="upload-cloud"></i></span><span class="val" id="statsSubmissions">0</span><span class="lbl" data-bn="দাম জমা দেওয়া" data-en="Submissions">দাম জমা দেওয়া</span></div>
            <div class="stat-card" style="box-shadow:var(--shadow-sm)"><span class="ico"><i data-lucide="check-circle" style="color:var(--green-600)"></i></span><span class="val" id="statsVerified">0</span><span class="lbl" data-bn="যাচাইকৃত" data-en="Verified">যাচাইকৃত</span></div>
            <div class="stat-card" style="box-shadow:var(--shadow-sm)"><span class="ico"><i data-lucide="map" style="color:#d97706"></i></span><span class="val">640+</span><span class="lbl" data-bn="ম্যাপে বাজার" data-en="Markets on Map">ম্যাপে বাজার</span></div>
        </div>
        
        <div class="table-wrap">
            <h3 style="padding:24px;border-bottom:1px solid var(--border);font-size:1.2rem;font-weight:800;display:flex;align-items:center;gap:10px" data-bn="<i data-lucide='file-text'></i> অ্যাকাউন্টের তথ্য" data-en="<i data-lucide='file-text'></i> Account Information"><i data-lucide="file-text" style="color:var(--gray-400)"></i> অ্যাকাউন্টের তথ্য</h3>
            <table><tbody>
                <tr><td style="font-weight:700;width:240px;color:var(--gray-600)" data-bn="সদস্য হওয়ার তারিখ" data-en="Member Since">সদস্য হওয়ার তারিখ</td><td id="joinDate" style="font-weight:600">—</td></tr>
                <tr><td style="font-weight:700;color:var(--gray-600)" data-bn="অবস্থান" data-en="Location">অবস্থান</td><td style="font-weight:600">Dhaka, Bangladesh</td></tr>
                <tr><td style="font-weight:700;color:var(--gray-600)" data-bn="যাচাইকরণের অবস্থা" data-en="Status">যাচাইকরণের অবস্থা</td><td><span class="market-badge wholesale" style="background:var(--green-100);color:var(--green-800)" data-bn="<i data-lucide='shield-check' style='width:14px;vertical-align:text-bottom'></i> সক্রিয়" data-en="<i data-lucide='shield-check' style='width:14px;vertical-align:text-bottom'></i> Active"><i data-lucide="shield-check" style="width:14px;vertical-align:text-bottom"></i> সক্রিয়</span></td></tr>
            </tbody></table>
        </div>
    </div></main>

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
            let user = PWBD.currentUser;
            if (!user) { window.location.replace('/auth.html'); return; }
            document.getElementById('profileAvatar').textContent = user.avatar || (user.name ? user.name.charAt(0) : 'U');
            document.getElementById('profileName').textContent = user.name || 'Anonymous';
            document.getElementById('profileEmail').textContent = user.email || '—';
            document.getElementById('profileRole').textContent = (user.role || 'user').charAt(0).toUpperCase() + (user.role || 'user').slice(1);
            if (user.joinDate) document.getElementById('joinDate').textContent = new Date(user.joinDate).toLocaleDateString('en-GB', { month: 'long', year: 'numeric' });
            if (user.stats) { document.getElementById('statsSubmissions').textContent = user.stats.submissions || 0; document.getElementById('statsVerified').textContent = user.stats.verified || 0; }
            PWBD.LANG.init();
            lucide.createIcons();
        });
    </script>
</body>
</html>
