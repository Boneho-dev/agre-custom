<?php
// Démarrer la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Connexion base de données
require_once 'includes/db.php';

// Récupérer toutes les commandes
$orders = [];
try {
    $stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des commandes: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Commandes | AGRE Custom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'luxury-gold': '#D4AF37',
                        'luxury-gold-light': '#E5C158',
                        'luxury-charcoal': '#1A1A1A',
                        'luxury-cream': '#F9F7F2',
                        'luxury-beige': '#E8E0D5',
                        'luxury-sand': '#D4C4B0',
                    },
                    fontFamily: {
                        'display': ['Playfair Display', 'Georgia', 'serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-luxury-charcoal text-white min-h-screen">
    
    <!-- Header Admin -->
    <header class="bg-luxury-charcoal border-b border-luxury-gold/30 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-luxury-gold rounded-full flex items-center justify-center">
                        <i class="fas fa-crown text-luxury-charcoal text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold font-display text-luxury-gold">AGRE Custom</h1>
                        <p class="text-xs text-white/60">Dashboard Admin</p>
                    </div>
                </div>
                <a href="index.php" class="flex items-center space-x-2 text-white/70 hover:text-luxury-gold transition-colors">
                    <i class="fas fa-external-link-alt"></i>
                    <span class="hidden md:inline">Voir le site</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white/5 backdrop-blur rounded-2xl p-6 border border-luxury-gold/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/60 text-sm">Total Commandes</p>
                        <p class="text-2xl md:text-3xl font-bold text-luxury-gold"><?php echo count($orders); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-luxury-gold/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-shopping-bag text-luxury-gold text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/5 backdrop-blur rounded-2xl p-6 border border-luxury-gold/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/60 text-sm">En attente</p>
                        <p class="text-2xl md:text-3xl font-bold text-yellow-400">
                            <?php echo count(array_filter($orders, fn($o) => $o['status'] === 'pending')); ?>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-400/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-400 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/5 backdrop-blur rounded-2xl p-6 border border-luxury-gold/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/60 text-sm">Validées</p>
                        <p class="text-2xl md:text-3xl font-bold text-green-400">
                            <?php echo count(array_filter($orders, fn($o) => $o['status'] === 'confirmed')); ?>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-400/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-400 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/5 backdrop-blur rounded-2xl p-6 border border-luxury-gold/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/60 text-sm">Chiffre d'affaires</p>
                        <p class="text-2xl md:text-3xl font-bold text-luxury-gold">
                            <?php 
                            $total = array_sum(array_column($orders, 'total_amount'));
                            echo number_format($total, 0, ',', ' ') . ' €';
                            ?>
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-luxury-gold/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-euro-sign text-luxury-gold text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="bg-white/5 backdrop-blur rounded-3xl border border-luxury-gold/20 overflow-hidden">
            <div class="p-6 border-b border-luxury-gold/20 flex items-center justify-between">
                <h2 class="text-xl font-bold font-display text-luxury-gold">
                    <i class="fas fa-list mr-2"></i>
                    Liste des commandes
                </h2>
                <button onclick="location.reload()" class="px-4 py-2 bg-luxury-gold/20 hover:bg-luxury-gold/30 text-luxury-gold rounded-xl transition-colors">
                    <i class="fas fa-sync-alt mr-1"></i>
                    Actualiser
                </button>
            </div>
            
            <?php if (isset($error)): ?>
            <div class="p-6">
                <div class="bg-red-500/20 border border-red-500/50 text-red-300 p-4 rounded-xl">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <?php echo $error; ?>
                </div>
            </div>
            <?php elseif (empty($orders)): ?>
            <div class="p-12 text-center">
                <div class="w-20 h-20 mx-auto mb-4 bg-luxury-gold/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-inbox text-luxury-gold text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Aucune commande</h3>
                <p class="text-white/60">Les commandes apparaîtront ici une fois que des clients auront passé commande.</p>
            </div>
            <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-luxury-gold/10 text-left">
                            <th class="px-6 py-4 text-luxury-gold font-semibold">N° Commande</th>
                            <th class="px-6 py-4 text-luxury-gold font-semibold">Client</th>
                            <th class="px-6 py-4 text-luxury-gold font-semibold">Email</th>
                            <th class="px-6 py-4 text-luxury-gold font-semibold">Date</th>
                            <th class="px-6 py-4 text-luxury-gold font-semibold text-right">Total</th>
                            <th class="px-6 py-4 text-luxury-gold font-semibold text-center">Statut</th>
                            <th class="px-6 py-4 text-luxury-gold font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <?php foreach ($orders as $order): ?>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-luxury-gold font-semibold"><?php echo htmlspecialchars($order['order_number']); ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold"><?php echo htmlspecialchars($order['customer_name']); ?></div>
                                <div class="text-sm text-white/60"><?php echo htmlspecialchars($order['city']); ?></div>
                            </td>
                            <td class="px-6 py-4 text-white/80">
                                <?php echo htmlspecialchars($order['email']); ?>
                            </td>
                            <td class="px-6 py-4 text-white/80">
                                <?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-luxury-gold">
                                <?php echo number_format($order['total_amount'], 2, ',', ' '); ?> €
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php 
                                $statusColors = [
                                    'pending' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/50',
                                    'confirmed' => 'bg-green-500/20 text-green-400 border-green-500/50',
                                    'shipped' => 'bg-blue-500/20 text-blue-400 border-blue-500/50',
                                    'delivered' => 'bg-purple-500/20 text-purple-400 border-purple-500/50',
                                    'cancelled' => 'bg-red-500/20 text-red-400 border-red-500/50'
                                ];
                                $statusLabels = [
                                    'pending' => 'En attente',
                                    'confirmed' => 'Validée',
                                    'shipped' => 'Expédiée',
                                    'delivered' => 'Livrée',
                                    'cancelled' => 'Annulée'
                                ];
                                $statusClass = $statusColors[$order['status']] ?? 'bg-gray-500/20 text-gray-400';
                                $statusLabel = $statusLabels[$order['status']] ?? $order['status'];
                                ?>
                                <span class="px-3 py-1 rounded-full text-xs font-semibold border <?php echo $statusClass; ?>">
                                    <?php echo $statusLabel; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button onclick="showOrderDetails(<?php echo $order['id']; ?>)" 
                                        class="px-4 py-2 bg-luxury-gold/20 hover:bg-luxury-gold hover:text-luxury-charcoal text-luxury-gold rounded-xl transition-all text-sm font-semibold">
                                    <i class="fas fa-eye mr-1"></i>
                                    Détails
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Order Details Modal -->
    <div id="order-modal" class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4">
        <div class="bg-luxury-charcoal border border-luxury-gold/30 rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-luxury-gold/30 flex items-center justify-between">
                <h3 class="text-xl font-bold text-luxury-gold font-display">Détails de la commande</h3>
                <button onclick="closeOrderModal()" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors">
                    <i class="fas fa-times text-white"></i>
                </button>
            </div>
            <div id="order-modal-content" class="p-6">
                <!-- Content loaded via AJAX -->
            </div>
        </div>
    </div>

    <script>
    function showOrderDetails(orderId) {
        // Pour l'instant, affichage simple
        const modal = document.getElementById('order-modal');
        const content = document.getElementById('order-modal-content');
        
        content.innerHTML = `
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-luxury-gold/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-box text-luxury-gold text-2xl"></i>
                </div>
                <p class="text-white/80">Détails de la commande #${orderId}</p>
                <p class="text-sm text-white/60 mt-2">Fonctionnalité de détails complète à implémenter</p>
            </div>
        `;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    
    function closeOrderModal() {
        const modal = document.getElementById('order-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
    
    // Close modal on outside click
    document.getElementById('order-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeOrderModal();
        }
    });
    </script>
</body>
</html>
