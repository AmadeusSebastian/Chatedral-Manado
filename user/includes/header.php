<?php
// Katedral/user/includes/header.php
// Memanggil koneksi database dari folder admin
require_once '../admin/includes/db_connect.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paroki Katedral Manado</title>
    <link rel="shortcut icon" href="../user/images/logo_katedral.jpg" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        katedral: {
                            cream: '#faf7f0',
                            white: '#ffffff',
                            gold: '#b8965a',
                            charcoal: '#3a3530'
                        }
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif !important; }
        .font-latin { font-family: 'Lora', serif !important; font-style: italic; letter-spacing: 0.02em; }
        body { font-family: 'Inter', system-ui, sans-serif; }
        [x-cloak] { display: none !important; }
        
        /* Heavenly Light Animation */
        @keyframes heavenly-rays {
            0% { transform: scale(1) rotate(0deg); opacity: 0.3; }
            50% { transform: scale(1.05) rotate(3deg); opacity: 0.6; }
            100% { transform: scale(1) rotate(0deg); opacity: 0.3; }
        }
        
        /* Custom Scrollbar for sidebar */
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #b8965a; border-radius: 4px; opacity: 0.5; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #9a7b48; opacity: 1; }
        
        .bg-heavenly-light {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            pointer-events: none;
            z-index: -1;
            background: radial-gradient(circle at 50% -20%, rgba(255,255,255,0.9) 0%, rgba(250,247,240,0.1) 60%),
                        linear-gradient(180deg, rgba(184,150,90,0.08) 0%, rgba(250,247,240,0) 100%);
            animation: heavenly-rays 20s ease-in-out infinite;
        }

        @media (prefers-reduced-motion: reduce) {
            .bg-heavenly-light {
                animation: none;
            }
        }
    </style>
</head>
<body class="bg-[#FDFBF7] text-gray-800 font-sans overflow-x-hidden antialiased">
    <div class="bg-heavenly-light"></div>