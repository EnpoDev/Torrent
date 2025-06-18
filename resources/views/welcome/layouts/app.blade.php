<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameTorrent - Yeni Nesil Torrent Oyun Platformu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('head')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        *{
            font-family: "Lexend", sans-serif;
        }

        .glass-dark {
            background: rgba(17, 25, 40, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .light .glass-dark {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .light .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .morphing-gradient {
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            animation: morphing 4s ease-in-out infinite;
        }

        @keyframes morphing {
            0%, 100% { background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); }
            50% { background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); }
        }

        .neon-text {
            text-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff, 0 0 30px #00ffff;
        }

        .neon-glow {
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .hero-text {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        .floating-delay {
            animation: float 6s ease-in-out infinite;
            animation-delay: -2s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .stats-counter {
            animation: countUp 2s ease-out;
        }

        @keyframes countUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Smooth transitions */
        * {
            transition: all 0.3s ease;
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap');

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--dark-gradient);
            overflow-x: hidden;
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-dark {
            backdrop-filter: blur(20px);
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .neon-glow {
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.5), 0 0 40px rgba(102, 126, 234, 0.3);
        }

        .neon-text {
            text-shadow: 0 0 10px rgba(102, 126, 234, 0.8), 0 0 20px rgba(118, 75, 162, 0.6);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        .floating-delay {
            animation: float 6s ease-in-out infinite;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(1deg);
            }
            66% {
                transform: translateY(-10px) rotate(-1deg);
            }
        }

        .pulse-glow {
            animation: pulseGlow 3s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(102, 126, 234, 0.8), 0 0 60px rgba(118, 75, 162, 0.4);
            }
        }

        .hover-lift {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .hover-lift:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
        }

        .morphing-gradient {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c, #4facfe, #00f2fe);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(102, 126, 234, 0.6);
            border-radius: 50%;
            animation: particleMove 20s linear infinite;
        }

        @keyframes particleMove {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        .game-card {
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .game-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .game-card:hover::before {
            left: 100%;
        }

        .game-card:hover {
            transform: translateY(-20px) rotateY(5deg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
        }

        .category-pill {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .category-pill::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: all 0.4s ease;
            transform: translate(-50%, -50%);
        }

        .category-pill:hover::before {
            width: 300px;
            height: 300px;
        }

        .parallax-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.1;
        }

        .stats-counter {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 500;
        }

        .hero-text {
            background: linear-gradient(45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 300% 300%;
            animation: gradientShift 6s ease infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @media (max-width: 768px) {
            .game-card:hover {
                transform: translateY(-10px) rotateY(0deg);
            }
        }

        .category-opt1 {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .category-opt2 {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        .category-opt3 {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .category-opt4 {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .category-opt5 {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .category-opt6 {
            background: linear-gradient(135deg, #ec4899, #db2777);
        }

        .category-opt7 {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        .category-opt8 {
            background: linear-gradient(135deg, #f97316, #ea580c);
        }

        .category-opt9 {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
        }
    </style>
</head>

@yield("content")

@yield("script")
</body>
</html>
