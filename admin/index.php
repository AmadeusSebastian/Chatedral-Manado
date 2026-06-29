<?php
// Katedral/admin/index.php
session_start();
require_once 'includes/db_connect.php';

// Fitur Developer: Otomatis buat akun admin default jika tabel kosong
$check_admin = $conn->query("SELECT * FROM tbl_admin");
if ($check_admin->num_rows == 0) {
    $default_user = "admin";
    $default_pass = password_hash("admin123", PASSWORD_BCRYPT);
    $conn->query("INSERT INTO tbl_admin (username, password) VALUES ('$default_user', '$default_pass')");
}

$error = "";

// Logika Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM tbl_admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../user/images/logo_katedral.jpg" type="image/x-icon">
    <title>Admin - Paroki Katedral Manado</title>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&display=swap" rel="stylesheet">
    
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
</head>
<body class="min-h-screen font-sans antialiased bg-gray-900 relative flex items-center justify-center p-4">
    
    <!-- Full Color Background Image with Subtle Dark Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="../user/images/foto_gereja.jpg" alt="Background Gereja" class="w-full h-full object-cover">
        <!-- Dark overlay to ensure the bright white card pops -->
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    <!-- Centered Login Card -->
    <div class="relative z-10 w-full max-w-4xl bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- Left Side: Logo Area -->
        <div class="w-full md:w-1/2 p-10 flex flex-col items-center justify-center border-b-2 md:border-b-0 md:border-r-2 border-gray-100">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm border border-gray-100 overflow-hidden">
                <img src="../user/images/logo_katedral.jpg" alt="Logo Katedral" class="w-full h-full object-cover">
            </div>
            <h2 class="font-serif font-bold text-2xl text-center text-katedral-charcoal mb-1">Paroki Hati Tersuci Maria</h2>
            <p class="text-center text-gray-500 font-bold tracking-widest text-sm">KATEDRAL MANADO</p>
        </div>

        <!-- Right Side: Login Form Area -->
        <div class="w-full md:w-1/2 p-10 lg:p-14 bg-white flex flex-col justify-center">
            
            <div class="mb-8">
                <h3 class="text-sm font-bold text-gray-800 tracking-wider border-b-2 border-katedral-gold inline-block pb-1">SIGN IN (Admin)</h3>
            </div>
            
            <?php if ($error != ""): ?>
                <div class="mb-6 p-3 rounded-md bg-red-50 border-l-4 border-red-500 text-red-700 text-xs font-bold">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST" class="space-y-5">
                <div>
                    <label for="username" class="block text-xs font-bold text-gray-700 mb-1.5">Username :</label>
                    <input type="text" id="username" name="username" required 
                        class="w-full px-4 py-2.5 text-sm rounded-md border border-gray-300 focus:outline-none focus:border-katedral-gold focus:ring-1 focus:ring-katedral-gold transition-colors bg-gray-50 focus:bg-white" 
                        placeholder="enter your username">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-gray-700 mb-1.5">Password :</label>
                    <input type="password" id="password" name="password" required 
                        class="w-full px-4 py-2.5 text-sm rounded-md border border-gray-300 focus:outline-none focus:border-katedral-gold focus:ring-1 focus:ring-katedral-gold transition-colors bg-gray-50 focus:bg-white pr-10" 
                        placeholder="enter your password">
                </div>

                <button type="submit" name="login" 
                    class="w-full py-2.5 px-4 rounded-md text-sm font-bold text-white bg-katedral-gold hover:bg-yellow-600 focus:outline-none transition-colors duration-300 mt-4">
                    LOGIN
                </button>
                
                <div class="text-center mt-4">
                    <p class="text-[10px] text-gray-400 font-medium">*Default: admin / admin123</p>
                </div>
            </form>

        </div>
    </div>

</body>
</html>