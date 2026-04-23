<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>দাম জমা দিন — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a><a href="/submit.html" class="active" data-bn="দাম জমা দিন" data-en="Submit Price">দাম জমা দিন</a></nav><div class="nav-right" id="navRight"></div><button class="hamburger" id="hamburger"><span></span><span></span><span></span></button></div></nav>

    <div class="page-banner" style="background:linear-gradient(135deg,var(--green-900),var(--green-800))"><div class="container"><h1 data-bn="<i data-lucide='send'></i> দাম জমা দিন" data-en="<i data-lucide='send'></i> Submit a Price Update"><i data-lucide="send"></i> দাম জমা দিন</h1><p data-bn="আজকের বাজার দর জানিয়ে কমিউনিটিকে সাহায্য করুন" data-en="Help your community by reporting today's market prices">আজকের বাজার দর জানিয়ে কমিউনিটিকে সাহায্য করুন</p></div></div>

    <main class="page" style="padding-top:40px"><div class="container"><div style="display:grid;grid-template-columns:1fr 380px;gap:40px;align-items:start;max-width:1100px;margin:0 auto">
        <div class="form-card">
            <h2 class="form-title" data-bn="<i data-lucide='edit-3'></i> দাম সাবমিশন" data-en="<i data-lucide='edit-3'></i> Price Submission"><i data-lucide="edit-3"></i> দাম সাবমিশন</h2>
            <div style="background:var(--yellow-50);border:1px solid var(--yellow-200);border-radius:var(--radius-sm);padding:16px 20px;margin-bottom:24px;display:flex;gap:16px;align-items:start"><span style="color:var(--yellow-600);margin-top:2px"><i data-lucide="info"></i></span><div style="font-size:0.95rem;color:var(--yellow-800)" data-bn="<strong>যাচাই প্রয়োজন:</strong> আপনার সাবমিশন অ্যাডমিনের অনুমোদনের পর প্রকাশিত হবে।" data-en="<strong>Verification Required:</strong> Your submission will be reviewed before appearing on the dashboard."><strong>যাচাই প্রয়োজন:</strong> আপনার সাবমিশন অ্যাডমিনের অনুমোদনের পর প্রকাশিত হবে।</div></div>
            <form id="submitForm">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px">
                    <div class="form-group" style="margin:0"><label data-bn="পণ্য *" data-en="Product *">পণ্য *</label>
                        <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="package" style="width:20px"></i></span><select id="productSelect" style="padding-left:42px" required><option value="">পণ্য নির্বাচন করুন...</option></select></div>
                    </div>
                    <div class="form-group" style="margin:0"><label data-bn="বাজার *" data-en="Market *">বাজার *</label>
                        <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="store" style="width:20px"></i></span><select id="marketSelect" style="padding-left:42px" required><option value="">বাজার নির্বাচন করুন...</option></select></div>
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px">
                    <div class="form-group" style="margin:0"><label data-bn="দাম (৳) *" data-en="Price (৳) *">দাম (৳) *</label>
                        <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400);font-weight:bold;font-size:1.1rem">৳</span><input type="number" id="priceInput" style="padding-left:36px" placeholder="e.g. 68" min="1" step="0.5" required></div>
                    </div>
                    <div class="form-group" style="margin:0"><label data-bn="একক" data-en="Unit">একক</label><input type="text" id="unitDisplay" disabled placeholder="Auto" style="background:var(--gray-100)"></div>
                </div>
                <div class="form-group"><label data-bn="তারিখ *" data-en="Date *">তারিখ *</label><input type="date" id="dateInput" required></div>
                
                <div id="preview" style="display:none;background:var(--green-50);border:2px solid var(--green-200);border-radius:var(--radius-sm);padding:20px;margin-bottom:24px">
                    <p style="font-size:0.85rem;font-weight:700;color:var(--green-700);text-transform:uppercase;margin-bottom:8px;display:flex;align-items:center;gap:6px"><i data-lucide="eye" style="width:16px"></i> Preview</p>
                    <div id="previewContent" style="font-size:1rem;color:var(--gray-800)"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="font-size:1.05rem;padding:16px" id="submitBtn" data-bn="<i data-lucide='check-circle'></i> দাম জমা দিন" data-en="<i data-lucide='check-circle'></i> Submit Price Update"><i data-lucide="check-circle"></i> দাম জমা দিন</button>
            </form>
            
            <div id="successMsg" style="display:none;text-align:center;padding:40px 0">
                <div style="color:var(--green-500);margin-bottom:16px"><i data-lucide="check-circle" style="width:64px;height:64px;margin:0 auto"></i></div>
                <h3 style="color:var(--gray-900);font-size:1.5rem;font-weight:800;margin-bottom:8px" data-bn="দাম সফলভাবে জমা দেওয়া হয়েছে!" data-en="Price Submitted!">দাম সফলভাবে জমা দেওয়া হয়েছে!</h3>
                <p style="color:var(--gray-500);font-size:1.05rem;margin-bottom:32px" data-bn="ধন্যবাদ! আপনার তথ্য যাচাই করা হচ্ছে।" data-en="Thank you! Your submission is under review.">ধন্যবাদ!</p>
                <div style="display:flex;gap:12px;justify-content:center"><button onclick="resetForm()" class="btn btn-outline" data-bn="আরেকটি জমা দিন" data-en="Submit Another">আরেকটি জমা দিন</button><a href="/" class="btn btn-primary" data-bn="হোমে যান" data-en="Go Home">হোমে যান</a></div>
            </div>
        </div>
        
        <div style="display:flex;flex-direction:column;gap:20px">
            <div style="background:white;border-radius:var(--radius-xl);padding:24px;border:1px solid var(--border);box-shadow:var(--shadow-sm)">
                <h3 style="font-size:1.1rem;font-weight:800;margin-bottom:16px;color:var(--gray-900);display:flex;align-items:center;gap:8px" data-bn="<i data-lucide='lightbulb'></i> সাবমিশনের টিপস" data-en="<i data-lucide='lightbulb'></i> Submission Tips"><i data-lucide="lightbulb" style="color:var(--yellow-500)"></i> সাবমিশনের টিপস</h3>
                <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:12px">
                    <li style="display:flex;gap:10px;font-size:0.95rem;color:var(--gray-600);font-weight:500"><i data-lucide="check" style="color:var(--green-500);width:20px;flex-shrink:0"></i> নিজে দেখেছেন এমন দাম প্রদান করুন</li>
                    <li style="display:flex;gap:10px;font-size:0.95rem;color:var(--gray-600);font-weight:500"><i data-lucide="check" style="color:var(--green-500);width:20px;flex-shrink:0"></i> আজকের সঠিক দাম দিন</li>
                    <li style="display:flex;gap:10px;font-size:0.95rem;color:var(--gray-600);font-weight:500"><i data-lucide="check" style="color:var(--green-500);width:20px;flex-shrink:0"></i> সম্পূর্ণ সঠিক বাজার নির্বাচন করুন</li>
                    <li style="display:flex;gap:10px;font-size:0.95rem;color:var(--gray-600);font-weight:500"><i data-lucide="check" style="color:var(--green-500);width:20px;flex-shrink:0"></i> উল্লেখিত একক (প্রতি কেজি/লিটার) অনুযায়ী দাম দিন</li>
                </ul>
            </div>
            <div style="background:linear-gradient(135deg,var(--green-600),var(--green-800));border-radius:var(--radius-xl);padding:32px;box-shadow:var(--shadow-lg);text-align:center;color:white">
                <i data-lucide="users" style="width:48px;height:48px;margin-bottom:16px;color:var(--green-300)"></i>
                <h3 style="font-size:1.2rem;font-weight:800;margin-bottom:8px">Join the Community</h3>
                <p style="font-size:0.95rem;color:rgba(255,255,255,.8);margin-bottom:24px;line-height:1.5" data-bn="অ্যাকাউন্ট তৈরি করে আপনার কন্ট্রিবিউশন ট্র্যাক করুন!" data-en="Create an account to track your contributions!">অ্যাকাউন্ট তৈরি করে আপনার কন্ট্রিবিউশন ট্র্যাক করুন!</p>
                <a href="/auth.html" class="btn btn-yellow btn-block" style="font-size:1rem" data-bn="ফ্রি সাইন আপ <i data-lucide='arrow-right' style='width:18px'></i>" data-en="Sign Up Free <i data-lucide='arrow-right' style='width:18px'></i>">ফ্রি সাইন আপ <i data-lucide="arrow-right" style="width:18px"></i></a>
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
    <script src="/app.js"></script>
    <script>
        lucide.createIcons();
        PWBD.initNav();
        let products = [], markets = [];
        async function initForm() {
            [products, markets] = await Promise.all([PWBD.apiFetch('/products'), PWBD.apiFetch('/markets')]);
            const pSel = document.getElementById('productSelect');
            const mSel = document.getElementById('marketSelect');
            products.forEach(p => pSel.innerHTML += `<option value="${p.id}" data-unit="${p.unit}">${PWBD.LANG.name(p)} (${p.unit})</option>`);
            
            let lastDist = '';
            markets.sort((a,b) => a.district.localeCompare(b.district)).forEach(m => {
                if (m.district !== lastDist) { mSel.innerHTML += `<optgroup label="── ${m.district} ──"></optgroup>`; lastDist = m.district; }
                mSel.innerHTML += `<option value="${m.id}">${m.name} (${m.nameEn})</option>`;
            });
            const pid = new URLSearchParams(window.location.search).get('product');
            if (pid) pSel.value = pid;
            pSel.addEventListener('change', () => { const opt = pSel.options[pSel.selectedIndex]; document.getElementById('unitDisplay').placeholder = opt?.dataset.unit ? 'Per ' + opt.dataset.unit : 'Auto'; });
            document.getElementById('dateInput').value = new Date().toISOString().split('T')[0];
            ['productSelect','marketSelect','priceInput'].forEach(id => { document.getElementById(id).addEventListener('input', updatePreview); document.getElementById(id).addEventListener('change', updatePreview); });
        }
        function updatePreview() {
            const pId = document.getElementById('productSelect').value, mId = document.getElementById('marketSelect').value, price = document.getElementById('priceInput').value;
            if (!pId || !mId || !price) { document.getElementById('preview').style.display = 'none'; return; }
            const p = products.find(x => x.id == pId), m = markets.find(x => x.id == mId);
            if (!p || !m) return;
            document.getElementById('preview').style.display = 'block';
            document.getElementById('previewContent').innerHTML = `<div style="display:inline-flex;align-items:center;gap:6px"><i data-lucide="${p.icon || 'box'}" style="width:20px"></i> <strong>${PWBD.LANG.name(p)}</strong></div> at <strong>${m.nameEn}</strong><br><div style="margin-top:8px">Price: <strong style="color:var(--green-700);font-size:1.4rem;font-weight:800">৳${price}</strong> per ${p.unit}</div>`;
            lucide.createIcons();
        }
        document.getElementById('submitForm').addEventListener('submit', async e => {
            e.preventDefault(); const btn = document.getElementById('submitBtn'); btn.innerHTML = '<div class="spinner" style="width:20px;height:20px;border-width:2px;border-top-color:white"></div>'; btn.disabled = true;
            const data = { productId: document.getElementById('productSelect').value, marketId: document.getElementById('marketSelect').value, price: document.getElementById('priceInput').value, submittedBy: PWBD.currentUser?.name ?? 'anonymous' };
            const res = await PWBD.apiFetch('/prices', { method: 'POST', body: JSON.stringify(data) });
            if (res?.success) { document.getElementById('submitForm').style.display='none'; document.getElementById('successMsg').style.display='block'; PWBD.LANG.init(); }
            else { PWBD.showToast('Failed', 'error'); btn.innerHTML = PWBD.LANG.get('<i data-lucide="check-circle"></i> দাম জমা দিন', '<i data-lucide="check-circle"></i> Submit Price Update'); lucide.createIcons(); btn.disabled = false; }
        });
        function resetForm() { document.getElementById('submitForm').reset(); document.getElementById('submitForm').style.display='block'; document.getElementById('successMsg').style.display='none'; document.getElementById('preview').style.display='none'; document.getElementById('dateInput').value = new Date().toISOString().split('T')[0]; }
        initForm();
    </script>
</body>
</html>
