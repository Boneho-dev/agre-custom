<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Configuration du site
$siteName = "AGRE Custom";
$siteTagline = "Vêtements de luxe pour enfants";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $siteName; ?> - <?php echo $siteTagline; ?></title>
  <link rel="shortcut icon" href="assets/img_2/Logo_png_fond.png" type="image/png" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'luxury-cream': '#FAF7F2',
            'luxury-beige': '#F5EDE0',
            'luxury-sand': '#E8DCC8',
            'luxury-blue': '#B8D4E3',
            'luxury-blue-light': '#D4E8F2',
            'luxury-gold': '#D4AF37',
            'luxury-gold-light': '#F4E4BC',
            'luxury-charcoal': '#4A4A4A',
            'luxury-rose': '#F5E6E0',
          },
          fontFamily: {
            'nunito': ['Nunito', 'sans-serif'],
            'roboto': ['Roboto', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <style>
    @font-face {
      font-family: 'Futura';
      src: url('/agre-custom/assets/font/Futura.ttf');
    }

    @font-face {
      font-family: 'dosis';
      src: url('/agre-custom/assets/font/dosis.ttf');
    }

    @font-face {
      font-family: 'nunito-local';
      src: url('/agre-custom/assets/font/nunito.ttf');
    }

    @font-face {
      font-family: 'open sans';
      src: url('/agre-custom/assets/font/opensans.ttf');
    }

    @font-face {
      font-family: 'roboto-local';
      src: url('/agre-custom/assets/font/roboto.ttf');
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Nunito', 'nunito-local', sans-serif;
    }

    .font-display {
      font-family: 'Futura', 'Nunito', sans-serif;
    }

    /* Product card hover effects */
    .product-card {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
    }

    .product-image-container {
      overflow: hidden;
    }

    .product-image-container img {
      transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover .product-image-container img {
      transform: scale(1.08);
    }

    /* Navigation hover effect */
    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0%;
      height: 2px;
      background: #D4AF37;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* Gradient background animation */
    .hero-gradient {
      background: linear-gradient(135deg, #FAF7F2 0%, #F5EDE0 50%, #E8DCC8 100%);
    }

    /* Soft shadow utility */
    .shadow-soft {
      box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.08);
    }

    .shadow-soft-lg {
      box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.12);
    }
  </style>
</head>

<body class="bg-luxury-cream text-luxury-charcoal antialiased">

  <!-- Navigation -->
  <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <a href="index.php" class="flex items-center space-x-2">
          <img src="assets/img_2/Logo_png_fond.png" alt="<?php echo $siteName; ?>" class="h-14 w-auto">
          <span class="font-display text-xl font-semibold text-luxury-charcoal hidden sm:block"><?php echo $siteName; ?></span>
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-8">
          <a href="index.php" class="nav-link text-luxury-charcoal hover:text-luxury-gold transition-colors font-medium">Accueil</a>
          <a href="index.php#products" class="nav-link text-luxury-charcoal hover:text-luxury-gold transition-colors font-medium">Collection</a>
          <a href="about.php" class="nav-link text-luxury-charcoal hover:text-luxury-gold transition-colors font-medium">À propos</a>
          <a href="contact.php" class="nav-link text-luxury-charcoal hover:text-luxury-gold transition-colors font-medium">Contact</a>
        </div>

        <!-- Cart Icon -->
        <div class="flex items-center space-x-4">
          <a href="cart.php" class="relative p-2 rounded-full hover:bg-luxury-beige transition-colors">
            <img src="assets/icon/icons8-shopping-cart.gif" alt="Panier" class="h-8 w-8">
            <span id="cart-counter" class="absolute -top-1 -right-1 bg-luxury-gold text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-semibold transition-transform duration-200">0</span>
          </a>

          <!-- Mobile menu button -->
          <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-luxury-beige transition-colors">
            <i class="fas fa-bars text-xl"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-luxury-beige">
      <div class="px-4 py-3 space-y-2">
        <a href="index.php" class="block py-2 px-3 rounded-lg hover:bg-luxury-beige transition-colors font-medium">Accueil</a>
        <a href="index.php#products" class="block py-2 px-3 rounded-lg hover:bg-luxury-beige transition-colors font-medium">Collection</a>
        <a href="about.php" class="block py-2 px-3 rounded-lg hover:bg-luxury-beige transition-colors font-medium">À propos</a>
        <a href="contact.php" class="block py-2 px-3 rounded-lg hover:bg-luxury-beige transition-colors font-medium">Contact</a>
      </div>
    </div>
  </nav>

  <main class="pt-20">