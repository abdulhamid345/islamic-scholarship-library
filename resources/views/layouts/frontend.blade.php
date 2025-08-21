<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Islamic Digital Library' }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #22c55e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 0.9rem;
            color: #374151;
        }

        .logo-text-ar {
            font-weight: 600;
            color: #1f2937;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #22c55e;
        }

        .nav-links-ar {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-outline {
            color: #374151;
            border: 1px solid #d1d5db;
            background: white;
        }

        .btn-outline:hover {
            background: #f9fafb;
        }

        .btn-primary {
            background: #22c55e;
            color: white;
        }

        .btn-primary:hover {
            background: #16a34a;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            min-height: 80vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 50px 50px, 30px 30px, 70px 70px;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M30 30c0-16.569 13.431-30 30-30v60c-16.569 0-30-13.431-30-30zM0 30c0 16.569 13.431 30 30 30V0C13.431 0 0 13.431 0 30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            backdrop-filter: blur(10px);
        }

        .hero-icon i {
            font-size: 2rem;
            color: white;
        }

        .hero-title-ar {
            font-size: 3rem;
            color: white;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-title-ar .highlight {
            color: #fbbf24;
        }

        .hero-title-en {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 2rem;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-description {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 1rem 2rem;
            font-size: 1rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-hero-primary {
            background: white;
            color: #065f46;
        }

        .btn-hero-primary:hover {
            background: #f9fafb;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .hero-title-ar {
                font-size: 2rem;
            }

            .hero-title-en {
                font-size: 1.8rem;
            }

            .hero-description {
                font-size: 1rem;
                padding: 0 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-hero {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #065f46 0%, #064e3b 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M30 30c0-16.569 13.431-30 30-30v60c-16.569 0-30-13.431-30-30zM0 30c0 16.569 13.431 30 30 30V0C13.431 0 0 13.431 0 30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .footer-main {
            padding: 4rem 0 2rem;
            position: relative;
            z-index: 2;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
        }

        .footer-section {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        .footer-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .footer-section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .footer-section:nth-child(3) {
            animation-delay: 0.3s;
        }

        .footer-section:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer Logo */
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .footer-logo-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .footer-logo-text-ar {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
        }

        .footer-logo-text {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Footer Descriptions */
        .footer-description,
        .footer-description-ar {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .footer-description-ar {
            text-align: right;
            direction: rtl;
        }

        /* Social Links */
        .footer-social {
            display: flex;
            gap: 0.8rem;
            margin-top: 1.5rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Footer Titles */
        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            margin-bottom: 0.5rem;
        }

        .footer-title-ar {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.5rem;
            text-align: right;
            direction: rtl;
        }

        /* Footer Links */
        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            display: block;
        }

        .footer-links a:hover {
            color: #22c55e;
        }

        /* Newsletter Section */
        .newsletter-description,
        .newsletter-description-ar {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .newsletter-description-ar {
            text-align: right;
            direction: rtl;
        }

        .newsletter-form {
            margin-bottom: 2rem;
        }

        .newsletter-input-group {
            display: flex;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .newsletter-input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            background: transparent;
            color: white;
            font-size: 0.95rem;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-input:focus {
            outline: none;
        }

        .newsletter-btn {
            padding: 0.8rem 1rem;
            background: #22c55e;
            border: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .newsletter-btn:hover {
            background: #16a34a;
        }

        /* Contact Information */
        .footer-contact {
            margin-top: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
        }

        .contact-item i {
            width: 20px;
            color: #22c55e;
        }

        /* Footer Bottom */
        .footer-bottom {
            background: rgba(0, 0, 0, 0.2);
            padding: 1.5rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-copyright p {
            margin: 0;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .copyright-ar {
            text-align: right;
            direction: rtl;
            margin-top: 0.3rem !important;
        }

        .footer-legal {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-legal a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-legal a:hover {
            color: #22c55e;
        }

        .separator {
            color: rgba(255, 255, 255, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 0 1rem;
            }

            .footer-main {
                padding: 3rem 0 1.5rem;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .footer-legal {
                justify-content: center;
            }

            .newsletter-input-group {
                flex-direction: column;
            }

            .newsletter-btn {
                border-radius: 0 0 8px 8px;
            }

            .footer-social {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .footer-legal {
                flex-direction: column;
                gap: 0.5rem;
            }

            .separator {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <div class="logo-text logo-text-ar">مكتبة يحيى باوا الإسلامية</div>
                    <div class="logo-text">Yahaya Bawa Islamic Library</div>
                </div>
            </div>

            <nav>
                <ul class="nav-links">
                    <li>
                        <a href="{{ route('welcome') }}">Home</a>
                        <div class="nav-links-ar">الرئيسية</div>
                    </li>
                    <li>
                        <a href="{{ route('books') }}">Books</a>
                        <div class="nav-links-ar">الكتب</div>
                    </li>
                    <li>
                        <a href="{{ route('scholars') }}">Scholars</a>
                        <div class="nav-links-ar">العلماء</div>
                    </li>
                </ul>
            </nav>

            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-outline">
                    Sign In
                    <div style="font-size: 0.8rem; color: #6b7280;">تسجيل الدخول</div>
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary">
                    Join Now
                    <div style="font-size: 0.8rem;">انضم الآن</div>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <!-- Main Footer Content -->
        <div class="footer-main">
            <div class="footer-container">
                <!-- Logo and Description Section -->
                <div class="footer-section footer-about">
                    <div class="footer-logo">
                        <div class="footer-logo-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <div class="footer-logo-text-ar">المكتبة الإسلامية</div>
                            <div class="footer-logo-text">Islamic Digital Library</div>
                        </div>
                    </div>
                    <p class="footer-description">
                        Access authentic Islamic knowledge through curated works from distinguished scholars and
                        researchers worldwide.
                    </p>
                    <p class="footer-description-ar">
                        الوصول إلى المعرفة الإسلامية الأصيلة من خلال الأعمال المنسقة من علماء وباحثين متميزين في جميع
                        أنحاء العالم.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Telegram">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="footer-section">
                    <h3 class="footer-title">Quick Links</h3>
                    <h4 class="footer-title-ar">روابط سريعة</h4>
                    <ul class="footer-links">
                        <li><a href="#">Home / الرئيسية</a></li>
                        <li><a href="#">Books / الكتب</a></li>
                        <li><a href="#">Scholars / العلماء</a></li>
                        <li><a href="#">Categories / التصنيفات</a></li>
                        <li><a href="#">Research / البحوث</a></li>
                        <li><a href="#">Articles / المقالات</a></li>
                    </ul>
                </div>

                <!-- Resources Section -->
                <div class="footer-section">
                    <h3 class="footer-title">Resources</h3>
                    <h4 class="footer-title-ar">الموارد</h4>
                    <ul class="footer-links">
                        <li><a href="#">Help Center / مركز المساعدة</a></li>
                        <li><a href="#">FAQ / الأسئلة الشائعة</a></li>
                        <li><a href="#">Downloads / التحميلات</a></li>
                        <li><a href="#">API Documentation</a></li>
                        <li><a href="#">Guidelines / الإرشادات</a></li>
                        <li><a href="#">Contact / اتصل بنا</a></li>
                    </ul>
                </div>

                <!-- Newsletter Section -->
                <div class="footer-section footer-newsletter">
                    <h3 class="footer-title">Stay Updated</h3>
                    <h4 class="footer-title-ar">ابق على اطلاع</h4>
                    <p class="newsletter-description">
                        Subscribe to receive updates about new publications and scholarly works.
                    </p>
                    <p class="newsletter-description-ar">
                        اشترك لتلقي التحديثات حول المنشورات الجديدة والأعمال العلمية.
                    </p>
                    <form class="newsletter-form" method="POST">
                        @csrf
                        <div class="newsletter-input-group">
                            <input type="email" name="email"
                                placeholder="Enter your email / أدخل بريدك الإلكتروني" class="newsletter-input"
                                required>
                            <button type="submit" class="newsletter-btn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@islamiclibrary.org</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+1 (555) 123-4567</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-container">
                <div class="footer-bottom-content">
                    <div class="footer-copyright">
                        <p>&copy; {{ date('Y') }} Islamic Digital Library. All rights reserved.</p>
                        <p class="copyright-ar">جميع الحقوق محفوظة © {{ date('Y') }} المكتبة الإسلامية الرقمية</p>
                    </div>
                    <div class="footer-legal">
                        <a href="#">Privacy Policy / سياسة الخصوصية</a>
                        <span class="separator">|</span>
                        <a href="#">Terms of Service / شروط الخدمة</a>
                        <span class="separator">|</span>
                        <a href="#">Cookies / ملفات تعريف الارتباط</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Add any JavaScript functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>

</html>
