<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>লগইন / সাইন আপ — PriceWatch BD</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav class="navbar"><div class="nav-inner"><a href="/" class="nav-logo"><div class="logo-icon"><i data-lucide="shopping-cart"></i></div> Price<span class="accent">Watch</span> BD</a><nav class="nav-links" id="navLinks"><a href="/" data-bn="হোম" data-en="Home">হোম</a><a href="/products.html" data-bn="পণ্যসমূহ" data-en="Products">পণ্যসমূহ</a><a href="/markets.html" data-bn="বাজারসমূহ" data-en="Markets">বাজারসমূহ</a><a href="/trending.html" data-bn="ট্রেন্ডিং" data-en="Trending">ট্রেন্ডিং</a></nav><div class="nav-right" id="navRight"></div></div></nav>

    <div class="container" style="display:flex;align-items:center;justify-content:center;min-height:calc(100vh - var(--nav-h));padding:40px 24px">
        <div style="background:var(--surface);border-radius:var(--radius-xl);box-shadow:var(--shadow-lg);border:1px solid var(--border);display:flex;overflow:hidden;width:100%;max-width:1000px">
            
            <div style="flex:1;background:linear-gradient(135deg,var(--green-900),var(--green-800));color:white;padding:56px;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden">
                <i data-lucide="shopping-cart" style="width:120px;height:120px;color:rgba(255,255,255,.05);position:absolute;right:-20px;bottom:-20px"></i>
                <div style="position:relative;z-index:2">
                    <div style="background:white;color:var(--green-600);width:56px;height:56px;border-radius:16px;display:flex;align-items:center;justify-content:center;margin-bottom:24px"><i data-lucide="shield-check" style="width:32px;height:32px"></i></div>
                    <h2 style="font-size:2rem;font-weight:800;margin-bottom:12px">PriceWatch BD</h2>
                    <p style="font-size:1.05rem;color:rgba(255,255,255,.8);margin-bottom:40px;max-width:320px;line-height:1.5" data-bn="হাজারো কন্ট্রিবিউটরদের সাথে যুক্ত হয়ে বাংলাদেশের সঠিক বাজার দর ট্র্যাক করুন।" data-en="Join thousands of contributors tracking fair market prices across Bangladesh.">হাজারো কন্ট্রিবিউটরদের সাথে যুক্ত হয়ে বাংলাদেশের সঠিক বাজার দর ট্র্যাক করুন।</p>
                    <div style="display:flex;flex-direction:column;gap:20px">
                        <div style="display:flex;align-items:center;gap:16px"><div style="background:rgba(255,255,255,.1);padding:12px;border-radius:12px"><i data-lucide="map-pin"></i></div><div><div style="font-weight:700">64 Districts</div><div style="font-size:0.85rem;color:rgba(255,255,255,.7)">Track real markets</div></div></div>
                        <div style="display:flex;align-items:center;gap:16px"><div style="background:rgba(255,255,255,.1);padding:12px;border-radius:12px"><i data-lucide="sparkles"></i></div><div><div style="font-weight:700">AI Trends</div><div style="font-size:0.85rem;color:rgba(255,255,255,.7)">Predict next 7 days</div></div></div>
                        <div style="display:flex;align-items:center;gap:16px"><div style="background:rgba(255,255,255,.1);padding:12px;border-radius:12px"><i data-lucide="shopping-bag"></i></div><div><div style="font-weight:700">Smart Shopping</div><div style="font-size:0.85rem;color:rgba(255,255,255,.7)">Cheapest grocery list</div></div></div>
                    </div>
                </div>
            </div>

            <div style="flex:1;padding:56px;background:var(--gray-50);display:flex;flex-direction:column">
                <div style="display:flex;background:var(--gray-200);border-radius:99px;padding:4px;margin-bottom:32px;width:100%;max-width:320px;margin-inline:auto">
                    <button class="auth-tab active" id="tabLogin" onclick="switchTab('login')" style="flex:1;border:none;background:transparent;padding:12px;border-radius:99px;font-weight:700;color:var(--gray-600);transition:var(--transition)" data-bn="লগইন" data-en="Login">লগইন</button>
                    <button class="auth-tab" id="tabRegister" onclick="switchTab('register')" style="flex:1;border:none;background:transparent;padding:12px;border-radius:99px;font-weight:700;color:var(--gray-600);transition:var(--transition)" data-bn="নতুন অ্যাকাউন্ট" data-en="Sign Up">নতুন অ্যাকাউন্ট</button>
                </div>

                <div id="loginCard">
                    <h2 style="font-size:1.8rem;font-weight:800;color:var(--gray-900);margin-bottom:8px;text-align:center" data-bn="স্বাগতম!" data-en="Welcome back!">স্বাগতম!</h2>
                    <p style="color:var(--gray-500);text-align:center;margin-bottom:32px" data-bn="আপনার প্রাইসওয়াচ অ্যাকাউন্টে প্রবেশ করুন" data-en="Sign in to your PriceWatch account">আপনার প্রাইসওয়াচ অ্যাকাউন্টে প্রবেশ করুন</p>
                    <form id="loginForm">
                        <div class="form-group"><label data-bn="ইমেইল" data-en="Email">ইমেইল</label>
                            <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="mail" style="width:20px"></i></span><input type="email" id="loginEmail" style="padding-left:42px" placeholder="you@example.com" required></div>
                        </div>
                        <div class="form-group"><label data-bn="পাসওয়ার্ড" data-en="Password">পাসওয়ার্ড</label>
                            <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="lock" style="width:20px"></i></span><input type="password" id="loginPass" style="padding-left:42px;padding-right:42px" placeholder="Your password" required><button type="button" id="loginToggle" style="position:absolute;right:14px;top:14px;background:none;border:none;color:var(--gray-500)"><i data-lucide="eye" style="width:20px"></i></button></div>
                        </div>
                        <div id="loginErr" style="display:none;background:var(--red-100);color:var(--red-600);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.9rem;font-weight:600;margin-bottom:16px;display:flex;align-items:center;gap:8px" data-bn="<i data-lucide='alert-circle'></i> ইমেইল বা পাসওয়ার্ড ভুল" data-en="<i data-lucide='alert-circle'></i> Invalid credentials"></div>
                        <button type="submit" class="btn btn-primary btn-block" style="font-size:1.05rem;padding:16px;margin-top:8px" id="loginBtn" data-bn="লগইন" data-en="Login">লগইন</button>
                        
                        <!-- <div style="margin-top:24px;padding:16px;background:var(--green-50);border-radius:var(--radius-sm);border:1px dashed var(--green-300)">
                            <div style="font-size:0.85rem;color:var(--green-800);font-weight:700;margin-bottom:4px"><i data-lucide="key" style="width:14px"></i> Demo Admin Account:</div>
                            <div style="font-size:0.95rem;color:var(--gray-700)">Email: <strong>admin@pricewatch.bd</strong><br>Pass: <strong>admin123</strong></div>
                        </div> -->
                    </form>
                </div>

                <div id="registerCard" style="display:none">
                    <h2 style="font-size:1.8rem;font-weight:800;color:var(--gray-900);margin-bottom:8px;text-align:center" data-bn="অ্যাকাউন্ট তৈরি করুন" data-en="Create Account">অ্যাকাউন্ট তৈরি করুন</h2>
                    <p style="color:var(--gray-500);text-align:center;margin-bottom:32px" data-bn="কমিউনিটির অংশ হোন" data-en="Join the community">কমিউনিটির অংশ হোন</p>
                    <form id="registerForm">
                        <div class="form-group"><label data-bn="পুরো নাম" data-en="Full Name">পুরো নাম</label>
                            <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="user" style="width:20px"></i></span><input type="text" id="regName" style="padding-left:42px" placeholder="Your full name" required></div>
                        </div>
                        <div class="form-group"><label data-bn="ইমেইল" data-en="Email">ইমেইল</label>
                            <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="mail" style="width:20px"></i></span><input type="email" id="regEmail" style="padding-left:42px" placeholder="you@example.com" required></div>
                        </div>
                        <div class="form-group"><label data-bn="পাসওয়ার্ড" data-en="Password">পাসওয়ার্ড</label>
                            <div style="position:relative"><span style="position:absolute;left:14px;top:14px;color:var(--gray-400)"><i data-lucide="lock" style="width:20px"></i></span><input type="password" id="regPass" style="padding-left:42px;padding-right:42px" placeholder="Min 6 characters" required minlength="6"><button type="button" id="regToggle" style="position:absolute;right:14px;top:14px;background:none;border:none;color:var(--gray-500)"><i data-lucide="eye" style="width:20px"></i></button></div>
                        </div>
                        <div id="regErr" style="display:none;background:var(--red-100);color:var(--red-600);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.9rem;font-weight:600;margin-bottom:16px;align-items:center;gap:8px"></div>
                        <button type="submit" class="btn btn-primary btn-block" style="font-size:1.05rem;padding:16px;margin-top:8px" id="regBtn" data-bn="অ্যাকাউন্ট তৈরি করুন" data-en="Create Account">অ্যাকাউন্ট তৈরি করুন</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .auth-tab.active { background: white !important; color: var(--gray-900) !important; box-shadow: var(--shadow-sm); }
    </style>
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
        PWBD.initNav();
        function switchTab(tab) { 
            document.getElementById('tabLogin').classList.toggle('active',tab==='login'); 
            document.getElementById('tabRegister').classList.toggle('active',tab==='register'); 
            document.getElementById('loginCard').style.display=tab==='login'?'block':'none'; 
            document.getElementById('registerCard').style.display=tab==='register'?'block':'none'; 
        }
        ['loginToggle','regToggle'].forEach((id,i) => { 
            const btn=document.getElementById(id); const inp=document.getElementById(i===0?'loginPass':'regPass'); 
            if(btn&&inp)btn.addEventListener('click',()=>{
                inp.type=inp.type==='password'?'text':'password';
                btn.innerHTML=inp.type==='password'?'<i data-lucide="eye" style="width:20px"></i>':'<i data-lucide="eye-off" style="width:20px"></i>';
                lucide.createIcons();
            }); 
        });
        
        document.getElementById('loginForm').addEventListener('submit', async e => { 
            e.preventDefault(); const btn=document.getElementById('loginBtn'); btn.innerHTML='<div class="spinner" style="width:20px;height:20px;border-width:2px;border-top-color:white"></div>'; btn.disabled=true;
            const res=await PWBD.apiFetch('/auth/login',{method:'POST',body:JSON.stringify({email:document.getElementById('loginEmail').value,password:document.getElementById('loginPass').value})});
            if(res?.success){PWBD.saveUser(res.user);PWBD.showToast('Login successful!');window.location.replace('/');}
            else{const err = document.getElementById('loginErr'); err.style.display='flex'; PWBD.LANG.init(); lucide.createIcons(); btn.textContent=PWBD.LANG.get('লগইন','Login'); btn.disabled=false;}
        });
        
        document.getElementById('registerForm').addEventListener('submit', async e => { 
            e.preventDefault(); const btn=document.getElementById('regBtn'); btn.innerHTML='<div class="spinner" style="width:20px;height:20px;border-width:2px;border-top-color:white"></div>'; btn.disabled=true;
            const pass=document.getElementById('regPass').value;
            const res=await PWBD.apiFetch('/auth/register',{method:'POST',body:JSON.stringify({name:document.getElementById('regName').value,email:document.getElementById('regEmail').value,password:pass})});
            if(res?.success){PWBD.saveUser(res.user);PWBD.showToast('Account created!');setTimeout(()=>window.location='/',1300);}
            else{const e=document.getElementById('regErr');e.innerHTML='<i data-lucide="alert-circle" style="width:16px"></i> '+(res?.error||'Failed');e.style.display='flex';lucide.createIcons();btn.textContent=PWBD.LANG.get('অ্যাকাউন্ট তৈরি করুন','Create Account');btn.disabled=false;}
        });
    </script>
</body>
</html>
