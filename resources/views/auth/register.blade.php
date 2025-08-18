<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/" />
    <title>Sign In - Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            --primary-green: #0f4a2a;
            --secondary-green: #166534;
            --accent-green: #22c55e;
            --light-green: #dcfce7;
            --gold: #f59e0b;
            --gold-light: #fef3c7;
        }

        * {
            scroll-behavior: smooth;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        .font-arabic {
            font-family: 'Noto Naskh Arabic', serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--accent-green) 100%);
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-container {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-input:focus {
            border-color: var(--accent-green);
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
            background: white;
            transform: translateY(-1px);
        }

        .form-input:hover {
            border-color: var(--accent-green);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-green), var(--accent-green));
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent-green), #10b981);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            transform: none;
            cursor: not-allowed;
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-ring {
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        .slide-in {
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .tab-button {
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .tab-button.active {
            color: var(--accent-green);
            border-bottom-color: var(--accent-green);
        }

        .tab-button:hover {
            color: var(--accent-green);
        }

        .form-page {
            display: none;
            transition: all 0.3s ease;
        }

        .form-page.active {
            display: block;
        }

        .social-btn {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }

        .social-btn:hover {
            border-color: var(--accent-green);
            background: var(--light-green);
        }

        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .focused {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="font-inter bg-gray-50 min-h-screen">
    <!-- Background -->
    <div class="hero-gradient islamic-pattern min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="floating-element absolute top-20 left-10 w-20 h-20 bg-white rounded-full"></div>
            <div class="floating-element absolute top-40 right-20 w-16 h-16 bg-yellow-300 rounded-full"
                style="animation-delay: -2s;"></div>
            <div class="floating-element absolute bottom-32 left-20 w-12 h-12 bg-green-300 rounded-full"
                style="animation-delay: -4s;"></div>
            <div class="floating-element absolute bottom-20 right-32 w-24 h-24 bg-emerald-300 rounded-full"
                style="animation-delay: -1s;"></div>

            <!-- Islamic Pattern Elements -->
            <div class="absolute top-32 left-1/4 text-white opacity-5 text-6xl font-arabic">ﷲ</div>
            <div class="absolute bottom-40 right-1/4 text-white opacity-5 text-4xl font-arabic transform rotate-45">☪
            </div>
        </div>

        <div class="w-full max-w-2xl mx-auto px-6 relative z-10">
            <!-- Logo and Header -->
            <div class="text-center mb-8" data-aos="fade-down">
                <div class="flex items-center justify-center mb-6">
                    <div
                        class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white border-opacity-30">
                        <svg class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-green-600 mb-2">Yahaya Bawa Islamic Library</h1>
                <p class="text-green-600 text-sm">Access thousands of authentic Islamic texts</p>
            </div>

            <!-- Auth Form Container -->
            <div class="glass-morphism rounded-2xl p-8 shadow-2xl" data-aos="fade-up">
                <!-- Tab Navigation -->
                <div class="flex mb-8 border-b border-gray-200">
                    <button id="registerTab"
                        class="tab-button active flex-1 py-3 text-center font-semibold text-gray-600">
                        Sign Up
                    </button>
                    <button id="loginTab" class="tab-button flex-1 py-3 text-center font-semibold text-gray-600">
                        Sign In
                    </button>
                </div>

                <!-- Register Form -->
                <div id="registerForm" class="form-page active">
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Create Account</h2>
                            <p class="text-gray-600">Join our community of Islamic knowledge seekers</p>
                        </div>

                        <form action="{{ route('register') }}" class="space-y-6"
                            id="registerFormElement" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="firstName"
                                    class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" name="name"
                                    placeholder="First name">
                                @if ($errors->has('email'))
                                    <span class="text-red-500 text-sm mt-2 block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" name="email"
                                    class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" name="email"
                                    placeholder="Enter your email address">
                                @if ($errors->has('email'))
                                    <span class="text-red-500 text-sm mt-2 block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="registerPassword" name="password"
                                        class="form-input w-full px-4 py-3 pr-12 rounded-xl focus:outline-none"
                                        placeholder="Create a strong password">
                                    @if ($errors->has('email'))
                                        <span
                                            class="text-red-500 text-sm mt-2 block">{{ $errors->first('email') }}</span>
                                    @endif
                                    <button type="button"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                        onclick="togglePassword('registerPassword')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                <div class="relative">
                                    <input type="password" id="confirmPassword" name="confirmPassword"
                                        class="form-input w-full px-4 py-3 pr-12 rounded-xl focus:outline-none"
                                        placeholder="Confirm your password">
                                    @if ($errors->has('email'))
                                        <span
                                            class="text-red-500 text-sm mt-2 block">{{ $errors->first('email') }}</span>
                                    @endif
                                    <button type="button"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                        onclick="togglePassword('confirmPassword')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label class="flex items-start">
                                    <input type="checkbox" name="terms"
                                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500 mt-1">
                                    <span class="ml-3 text-sm text-gray-600">
                                        I agree to the <a href="#"
                                            class="text-green-600 hover:text-green-700 font-medium">Terms of
                                            Service</a> and <a href="#"
                                            class="text-green-600 hover:text-green-700 font-medium">Privacy Policy</a>
                                    </span>
                                </label>
                            </div>

                            <button type="submit"
                                class="btn-primary w-full py-4 text-white font-semibold rounded-xl">
                                Create Account
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Login Form -->
                <div id="loginForm" class="form-page ">
                    <div class="space-y-6">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back</h2>
                            <p class="text-gray-600">Sign in to continue your Islamic learning journey</p>
                        </div>

                        <form action="{{ route('login') }}" method="POST" class="space-y-6" id="loginFormElement"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" name="email"
                                    class="form-input w-full px-4 py-3 rounded-xl focus:outline-none"
                                    placeholder="Enter your email address">
                                @if ($errors->has('email'))
                                    <span class="text-red-500 text-sm mt-2 block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="loginPassword" name="password"
                                        class="form-input w-full px-4 py-3 pr-12 rounded-xl focus:outline-none"
                                        placeholder="Enter your password">
                                    @if ($errors->has('email'))
                                        <span
                                            class="text-red-500 text-sm mt-2 block">{{ $errors->first('email') }}</span>
                                    @endif
                                    <button type="button"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                        onclick="togglePassword('loginPassword')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            {{-- <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" name="remember"
                                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                                <a href="#"
                                    class="text-sm text-green-600 hover:text-green-700 font-medium">Forgot
                                    password?</a>
                            </div> --}}

                            <button type="submit"
                                class="btn-primary w-full py-4 text-white font-semibold rounded-xl">
                                Sign In
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        Need help? <a href="#" class="text-green-600 hover:text-green-700 font-medium">Contact
                            Support</a>
                    </p>
                    <p class="text-sm text-gray-500 mt-2">
                        <a href="index.html" class="hover:text-green-600 transition-colors">← Back to Library</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
        });

        // Tab switching functionality
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        // Enhanced tab switching with animations
        function switchForm(showForm, hideForm, activeTab, inactiveTab) {
            // Update tab states
            activeTab.classList.add('active');
            inactiveTab.classList.remove('active');

            // Smooth form transition
            hideForm.style.opacity = '0';
            hideForm.style.transform = 'translateX(-20px)';

            setTimeout(() => {
                hideForm.classList.remove('active');
                showForm.classList.add('active');
                showForm.style.opacity = '0';
                showForm.style.transform = 'translateX(20px)';

                setTimeout(() => {
                    showForm.style.opacity = '1';
                    showForm.style.transform = 'translateX(0)';
                }, 50);
            }, 200);
        }

        loginTab.addEventListener('click', function() {
            if (!this.classList.contains('active')) {
                switchForm(loginForm, registerForm, loginTab, registerTab);
                document.title = 'Sign In - Yahaya Bawa Islamic Library';
            }
        });

        registerTab.addEventListener('click', function() {
            if (!this.classList.contains('active')) {
                switchForm(registerForm, loginForm, registerTab, loginTab);
                document.title = 'Sign Up - Yahaya Bawa Islamic Library';
            }
        });

        // Password visibility toggle
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const button = input.nextElementSibling;
            const icon = button.querySelector('svg');

            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L5.636 5.636m4.242 4.242L15.12 15.12M15.12 15.12l4.242 4.242"/>
                `;
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            }
        }

        // Enhanced form input interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add floating animation delay to background elements
            const floatingElements = document.querySelectorAll('.floating-element');
            floatingElements.forEach((element, index) => {
                element.style.animationDelay = `${index * -1.5}s`;
            });

            // Add focus effects to form inputs
            const formInputs = document.querySelectorAll('.form-input');
            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });

                // Add input validation styling (visual only)
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = 'var(--accent-green)';
                    } else {
                        this.style.borderColor = '#e5e7eb';
                    }
                });
            });

            // Add hover effects to buttons
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    if (!this.disabled) {
                        this.style.transform = 'translateY(-2px)';
                    }
                });

                button.addEventListener('mouseleave', function() {
                    if (!this.disabled) {
                        this.style.transform = 'translateY(0)';
                    }
                });
            });

            // Add checkbox styling
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        this.parentElement.style.color = 'var(--accent-green)';
                    } else {
                        this.parentElement.style.color = '';
                    }
                });
            });

            // Add select styling
            const selects = document.querySelectorAll('select');
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    if (this.value) {
                        this.style.borderColor = 'var(--accent-green)';
                        this.style.color = 'var(--secondary-green)';
                    } else {
                        this.style.borderColor = '#e5e7eb';
                        this.style.color = '';
                    }
                });
            });
        });

        // Add keyboard navigation support
        document.addEventListener('keydown', function(e) {
            // Tab navigation between forms
            if (e.key === 'Tab' && e.altKey) {
                e.preventDefault();
                if (loginForm.classList.contains('active')) {
                    registerTab.click();
                } else {
                    loginTab.click();
                }
            }

            // Enter to submit forms
            if (e.key === 'Enter' && e.target.tagName === 'INPUT') {
                const form = e.target.closest('form');
                if (form) {
                    form.dispatchEvent(new Event('submit'));
                }
            }
        });

        // Add form validation styling (visual feedback only)
        function addValidationStyling() {
            const inputs = document.querySelectorAll('input[required], input[type="email"]');

            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    const isValid = this.checkValidity();

                    if (this.value.length > 0) {
                        if (isValid) {
                            this.style.borderColor = 'var(--accent-green)';
                            this.style.boxShadow = '0 0 0 2px rgba(34, 197, 94, 0.1)';
                        } else {
                            this.style.borderColor = '#ef4444';
                            this.style.boxShadow = '0 0 0 2px rgba(239, 68, 68, 0.1)';
                        }
                    }
                });

                input.addEventListener('input', function() {
                    if (this.style.borderColor === 'rgb(239, 68, 68)') {
                        this.style.borderColor = '#e5e7eb';
                        this.style.boxShadow = '';
                    }
                });
            });
        }

        // Initialize validation styling
        addValidationStyling();

        // Add smooth scroll for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation for social buttons
        document.querySelectorAll('.social-btn').forEach(button => {
            button.addEventListener('click', function() {
                const originalContent = this.innerHTML;
                this.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Connecting...
                `;
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = originalContent;
                    this.disabled = false;
                }, 2000);
            });
        });
    </script>
</body>

</html>
