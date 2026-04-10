<?php
include 'includes/header.php';
include 'includes/cart_logic.php';

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart'];
$total = getCartTotal();
$count = getCartCount();
?>

<!-- Breadcrumb -->
<nav class="bg-luxury-cream py-4 border-b border-luxury-sand/30">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center space-x-2 text-sm">
      <a href="index.php" class="text-luxury-charcoal/60 hover:text-luxury-gold transition-colors">Accueil</a>
      <i class="fas fa-chevron-right text-luxury-charcoal/40 text-xs"></i>
      <span class="text-luxury-gold font-semibold">Panier</span>
    </div>
  </div>
</nav>

<!-- Cart Section -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-luxury-charcoal font-display mb-4">Votre Panier</h1>
      <p class="text-luxury-charcoal/60"><?php echo $count; ?> article<?php echo $count > 1 ? 's' : ''; ?> dans votre panier</p>
    </div>

    <?php if (empty($cart)): ?>
      <!-- Empty Cart -->
      <div class="text-center py-20 bg-luxury-cream rounded-3xl border border-luxury-sand/30">
        <div class="w-24 h-24 mx-auto mb-6 bg-luxury-gold/20 rounded-full flex items-center justify-center">
          <i class="fas fa-shopping-bag text-4xl text-luxury-gold"></i>
        </div>
        <h2 class="text-2xl font-bold text-luxury-charcoal mb-3 font-display">Votre panier est vide</h2>
        <p class="text-luxury-charcoal/60 mb-8 max-w-md mx-auto">
          Découvrez notre collection de vêtements de luxe pour enfants et ajoutez vos articles préférés.
        </p>
        <a href="index.php#products"
          class="inline-flex items-center px-8 py-4 bg-luxury-gold hover:bg-luxury-gold-light text-luxury-charcoal font-semibold rounded-2xl transition-all transform hover:scale-[1.02]">
          <i class="fas fa-shopping-bag mr-2"></i>
          Découvrir la collection
        </a>
      </div>
    <?php else: ?>
      <!-- Cart Items -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items List -->
        <div class="lg:col-span-2 space-y-6">
          <?php foreach ($cart as $productId => $item): ?>
            <div class="bg-luxury-cream rounded-3xl p-6 shadow-soft border border-luxury-sand/30 flex items-center space-x-6">
              <!-- Product Image -->
              <div class="flex-shrink-0 w-24 h-24 rounded-2xl overflow-hidden border-2 border-luxury-gold/20">
                <img src="<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>"
                  class="w-full h-full object-cover">
              </div>

              <!-- Product Info -->
              <div class="flex-grow">
                <h3 class="text-lg font-bold text-luxury-charcoal font-display mb-1"><?php echo htmlspecialchars($item['name']); ?></h3>
                <p class="text-sm text-luxury-charcoal/60 mb-2"><?php echo htmlspecialchars($item['description']); ?></p>
                <p class="text-xl font-bold text-luxury-gold"><?php echo number_format($item['price'], 2, ',', ' '); ?> €</p>
              </div>

              <!-- Quantity Controls -->
              <div class="flex items-center space-x-3">
                <button onclick="updateCart('<?php echo $productId; ?>', <?php echo $item['quantity'] - 1; ?>)"
                  class="w-10 h-10 rounded-xl bg-white border border-luxury-gold/30 flex items-center justify-center hover:bg-luxury-gold hover:text-white transition-colors text-luxury-gold">
                  <i class="fas fa-minus"></i>
                </button>
                <span class="w-12 text-center font-bold text-luxury-char"><?php echo $item['quantity']; ?></span>
                <button onclick="updateCart('<?php echo $productId; ?>', <?php echo $item['quantity'] + 1; ?>)"
                  class="w-10 h-10 rounded-xl bg-white border border-luxury-gold/30 flex items-center justify-center hover:bg-luxury-gold hover:text-white transition-colors text-luxury-gold">
                  <i class="fas fa-plus"></i>
                </button>
              </div>

              <!-- Remove Button -->
              <button onclick="removeFromCart('<?php echo $productId; ?>')"
                class="flex-shrink-0 w-10 h-10 rounded-xl bg-red-50 border border-red-200 flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-red-500 transition-colors text-red-500">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Cart Summary -->
        <div class="lg:col-span-1">
          <div class="bg-luxury-charcoal text-white rounded-3xl p-8 shadow-soft-lg sticky top-8">
            <h2 class="text-2xl font-bold font-display mb-6">Récapitulatif</h2>

            <div class="space-y-4 mb-6">
              <div class="flex justify-between items-center">
                <span class="text-white/70">Sous-total</span>
                <span class="font-semibold"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-white/70">Livraison</span>
                <span class="font-semibold text-luxury-gold">Gratuite</span>
              </div>
              <div class="border-t border-white/20 pt-4">
                <div class="flex justify-between items-center">
                  <span class="text-lg font-bold">Total</span>
                  <span class="text-2xl font-bold text-luxury-gold"><?php echo number_format($total, 2, ',', ' '); ?> €</span>
                </div>
              </div>
            </div>

            <a href="checkout.php"
              class="block w-full py-4 px-6 bg-luxury-gold hover:bg-[#C4A030] text-luxury-charcoal font-semibold rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-luxury-gold/30 active:scale-[0.98] text-center mb-4">
              <i class="fas fa-lock mr-2"></i>
              Passer commande
            </a>

            <a href="index.php#products"
              class="block w-full py-3 px-6 border border-white/30 hover:bg-white/10 text-white font-semibold rounded-2xl transition-colors text-center">
              <i class="fas fa-arrow-left mr-2"></i>
              Continuer mes achats
            </a>

            <p class="text-center text-white/50 text-sm mt-6">
              <i class="fas fa-shield-alt mr-1"></i>
              Paiement sécurisé
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Cart JavaScript -->
<script>
  function updateCart(productId, quantity) {
    if (quantity < 1) {
      removeFromCart(productId);
      return;
    }

    const formData = new FormData();
    formData.append('action', 'update');
    formData.append('product_id', productId);
    formData.append('quantity', quantity);

    fetch('includes/cart_logic.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          location.reload();
        }
      });
  }

  function removeFromCart(productId) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
      return;
    }

    const formData = new FormData();
    formData.append('action', 'remove');
    formData.append('product_id', productId);

    fetch('includes/cart_logic.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          location.reload();
        }
      });
  }
</script>

<?php include 'includes/footer.php'; ?>