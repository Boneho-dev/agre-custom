<?php
include 'includes/header.php';

// Récupérer le nom du client depuis la session (s'il existe)
$customerName = $_SESSION['customer_name'] ?? 'cher client';
$orderNumber = $_SESSION['order_number'] ?? 'AG-' . date('Ymd') . '-' . rand(1000, 9999);
?>

<!-- Success Section -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-luxury-cream via-white to-luxury-beige py-12 px-4">
  <div class="max-w-2xl w-full">
    <!-- Success Card -->
    <div class="bg-white rounded-3xl shadow-soft-lg border border-luxury-sand/30 p-8 md:p-12 text-center">
      
      <!-- Animated Check Icon -->
      <div class="mb-8">
        <div class="w-24 h-24 md:w-32 md:h-32 mx-auto bg-green-100 rounded-full flex items-center justify-center animate-bounce">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-green-500 rounded-full flex items-center justify-center shadow-lg shadow-green-500/30">
            <i class="fas fa-check text-white text-3xl md:text-4xl animate-pulse"></i>
          </div>
        </div>
      </div>

      <!-- Success Message -->
      <h1 class="text-3xl md:text-4xl font-bold text-luxury-charcoal font-display mb-4">
        Commande confirmée !
      </h1>
      
      <p class="text-xl text-luxury-charcoal/80 mb-2">
        Merci <span class="text-luxury-gold font-bold"><?php echo htmlspecialchars($customerName); ?></span> !
      </p>
      
      <p class="text-luxury-charcoal/60 mb-8 max-w-md mx-auto">
        Votre commande a été enregistrée avec succès. Vous recevrez un email de confirmation dans quelques instants.
      </p>

      <!-- Order Number -->
      <div class="bg-luxury-cream rounded-2xl p-6 mb-8 inline-block">
        <p class="text-sm text-luxury-charcoal/60 mb-1">Numéro de commande</p>
        <p class="text-xl font-bold text-luxury-gold font-mono"><?php echo $orderNumber; ?></p>
      </div>

      <!-- Order Details -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-luxury-cream/50 rounded-2xl p-4">
          <div class="w-12 h-12 mx-auto mb-2 bg-luxury-gold/20 rounded-full flex items-center justify-center">
            <i class="fas fa-envelope text-luxury-gold text-xl"></i>
          </div>
          <p class="text-sm text-luxury-charcoal/70">Email de confirmation envoyé</p>
        </div>
        <div class="bg-luxury-cream/50 rounded-2xl p-4">
          <div class="w-12 h-12 mx-auto mb-2 bg-luxury-gold/20 rounded-full flex items-center justify-center">
            <i class="fas fa-truck text-luxury-gold text-xl"></i>
          </div>
          <p class="text-sm text-luxury-charcoal/70">Livraison sous 2-4 jours</p>
        </div>
        <div class="bg-luxury-cream/50 rounded-2xl p-4">
          <div class="w-12 h-12 mx-auto mb-2 bg-luxury-gold/20 rounded-full flex items-center justify-center">
            <i class="fas fa-headset text-luxury-gold text-xl"></i>
          </div>
          <p class="text-sm text-luxury-charcoal/70">Support disponible 24/7</p>
        </div>
      </div>

      <!-- CTA Button -->
      <a href="index.php" 
         class="inline-flex items-center px-8 py-4 bg-luxury-gold hover:bg-[#C4A030] text-luxury-charcoal font-bold text-lg rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-luxury-gold/30 active:scale-[0.98]">
        <i class="fas fa-home mr-2"></i>
        Retour à l'accueil
      </a>

      <!-- Contact Info -->
      <p class="mt-8 text-sm text-luxury-charcoal/50">
        Une question ? Contactez-nous à 
        <a href="mailto:agrekevin09@gmail.com" class="text-luxury-gold hover:underline">agrekevin09@gmail.com</a>
      </p>
    </div>
  </div>
</section>

<!-- Confetti Animation Script -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Launch confetti
  var duration = 3000;
  var animationEnd = Date.now() + duration;
  var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

  var random = function(min, max) {
    return Math.random() * (max - min) + min;
  }

  var interval = setInterval(function() {
    var timeLeft = animationEnd - Date.now();

    if (timeLeft <= 0) {
      return clearInterval(interval);
    }

    var particleCount = 50 * (timeLeft / duration);
    confetti(Object.assign({}, defaults, { 
      particleCount, 
      origin: { x: random(0.1, 0.3), y: Math.random() - 0.2 },
      colors: ['#D4AF37', '#FAF7F2', '#B8D4E3', '#FFD700']
    }));
    confetti(Object.assign({}, defaults, { 
      particleCount, 
      origin: { x: random(0.7, 0.9), y: Math.random() - 0.2 },
      colors: ['#D4AF37', '#FAF7F2', '#B8D4E3', '#FFD700']
    }));
  }, 250);
});
</script>

<style>
/* Custom animation for the checkmark */
@keyframes checkmark {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.animate-checkmark {
  animation: checkmark 0.6s ease-out forwards;
}
</style>

<?php 
// Clear the cart after successful order
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
include 'includes/footer.php'; 
?>
