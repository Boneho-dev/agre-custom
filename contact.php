<?php include 'includes/header.php'; ?>

<?php
// Traitement du formulaire (simulation)
$formSubmitted = false;
$formError = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ici tu pourrais ajouter la logique d'envoi d'email
    $formSubmitted = true;
}
?>

<!-- Hero Section Contact -->
<section class="bg-gradient-to-br from-luxury-cream via-luxury-beige to-luxury-sand py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <span class="inline-flex items-center px-4 py-2 bg-luxury-gold/20 rounded-full text-luxury-gold text-sm font-semibold mb-4">
        <i class="fas fa-envelope mr-2"></i>
        Parlons de votre projet
      </span>
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-luxury-charcoal font-display mb-6">
        Contactez-nous
      </h1>
      <p class="text-xl text-luxury-charcoal/70 max-w-3xl mx-auto">
        Une question ? Un projet personnalisé pour votre enfant ? 
        Notre équipe basée à Angers est là pour vous accompagner avec soin et attention.
      </p>
    </div>

    <!-- Contact Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
      <div class="bg-white rounded-3xl p-8 shadow-soft border border-luxury-sand/30 text-center transform hover:-translate-y-2 transition-all duration-300">
        <div class="w-16 h-16 mx-auto mb-4 bg-luxury-gold/20 rounded-2xl flex items-center justify-center">
          <i class="fas fa-map-marker-alt text-2xl text-luxury-gold"></i>
        </div>
        <h3 class="text-lg font-semibold text-luxury-charcoal mb-2">Notre Adresse</h3>
        <p class="text-luxury-charcoal/60">
          8 Boulevard Victor Beaussier<br>
          49000 Angers, France
        </p>
      </div>

      <div class="bg-white rounded-3xl p-8 shadow-soft border border-luxury-sand/30 text-center transform hover:-translate-y-2 transition-all duration-300">
        <div class="w-16 h-16 mx-auto mb-4 bg-luxury-blue/20 rounded-2xl flex items-center justify-center">
          <i class="fas fa-phone-alt text-2xl text-luxury-gold"></i>
        </div>
        <h3 class="text-lg font-semibold text-luxury-charcoal mb-2">Téléphone</h3>
        <p class="text-luxury-charcoal/60">
          +33 7 84 80 73 04<br>
          Lun-Ven : 9h-18h
        </p>
      </div>

      <div class="bg-white rounded-3xl p-8 shadow-soft border border-luxury-sand/30 text-center transform hover:-translate-y-2 transition-all duration-300">
        <div class="w-16 h-16 mx-auto mb-4 bg-luxury-rose/30 rounded-2xl flex items-center justify-center">
          <i class="fas fa-envelope text-2xl text-luxury-gold"></i>
        </div>
        <h3 class="text-lg font-semibold text-luxury-charcoal mb-2">Email</h3>
        <p class="text-luxury-charcoal/60">
          agrekevin09@gmail.com
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
      
      <!-- Formulaire -->
      <div class="bg-luxury-cream rounded-3xl p-8 md:p-12 shadow-soft-lg border border-luxury-sand/30">
        <h2 class="text-3xl font-bold text-luxury-charcoal font-display mb-2">Envoyez-nous un message</h2>
        <p class="text-luxury-charcoal/60 mb-8">Remplissez le formulaire ci-dessous, nous vous répondrons sous 24h.</p>

        <?php if ($formSubmitted): ?>
        <div class="bg-green-50 border border-green-200 rounded-2xl p-6 mb-6">
          <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
            <div>
              <h4 class="font-semibold text-green-800">Message envoyé !</h4>
              <p class="text-green-700 text-sm">Merci de nous avoir contacté. Nous vous répondrons très rapidement.</p>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-6">
          <!-- Nom et Prénom -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-luxury-charcoal mb-2">Prénom</label>
              <input type="text" name="prenom" required
                class="w-full px-4 py-3 rounded-xl bg-white border border-luxury-sand/50 text-luxury-charcoal placeholder-luxury-charcoal/40 focus:outline-none focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all"
                placeholder="Votre prénom">
            </div>
            <div>
              <label class="block text-sm font-medium text-luxury-charcoal mb-2">Nom</label>
              <input type="text" name="nom" required
                class="w-full px-4 py-3 rounded-xl bg-white border border-luxury-sand/50 text-luxury-charcoal placeholder-luxury-charcoal/40 focus:outline-none focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all"
                placeholder="Votre nom">
            </div>
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-luxury-charcoal mb-2">Email</label>
            <input type="email" name="email" required
              class="w-full px-4 py-3 rounded-xl bg-white border border-luxury-sand/50 text-luxury-charcoal placeholder-luxury-charcoal/40 focus:outline-none focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all"
              placeholder="votre@email.com">
          </div>

          <!-- Téléphone -->
          <div>
            <label class="block text-sm font-medium text-luxury-charcoal mb-2">Téléphone (optionnel)</label>
            <input type="tel" name="telephone"
              class="w-full px-4 py-3 rounded-xl bg-white border border-luxury-sand/50 text-luxury-charcoal placeholder-luxury-charcoal/40 focus:outline-none focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all"
              placeholder="+33 6 12 34 56 78">
          </div>

          <!-- Sujet -->
          <div>
            <label class="block text-sm font-medium text-luxury-charcoal mb-2">Sujet</label>
            <select name="sujet" required
              class="w-full px-4 py-3 rounded-xl bg-white border border-luxury-sand/50 text-luxury-charcoal focus:outline-none focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all">
              <option value="">Choisissez un sujet</option>
              <option value="commande">Question sur ma commande</option>
              <option value="produit">Renseignement produit</option>
              <option value="personnalisation">Projet personnalisé</option>
              <option value="partenariat">Partenariat</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <!-- Message -->
          <div>
            <label class="block text-sm font-medium text-luxury-charcoal mb-2">Votre message</label>
            <textarea name="message" rows="5" required
              class="w-full px-4 py-3 rounded-xl bg-white border border-luxury-sand/50 text-luxury-charcoal placeholder-luxury-charcoal/40 focus:outline-none focus:border-luxury-gold focus:ring-2 focus:ring-luxury-gold/20 transition-all resize-none"
              placeholder="Décrivez votre demande en détail..."></textarea>
          </div>

          <!-- Bouton envoyer -->
          <button type="submit" 
            class="w-full py-4 px-8 bg-luxury-gold hover:bg-luxury-gold-light text-luxury-charcoal font-semibold rounded-xl transition-all transform hover:scale-[1.02] shadow-lg shadow-luxury-gold/25 flex items-center justify-center">
            <i class="fas fa-paper-plane mr-2"></i>
            Envoyer le message
          </button>
        </form>
      </div>

      <!-- Info & Map -->
      <div class="space-y-8">
        <!-- Carte stylisée -->
        <div class="bg-luxury-beige rounded-3xl p-8 shadow-soft border border-luxury-sand/30">
          <h3 class="text-2xl font-bold text-luxury-charcoal font-display mb-4">
            <i class="fas fa-map-marked-alt text-luxury-gold mr-2"></i>
            Où nous trouver
          </h3>
          <p class="text-luxury-charcoal/70 mb-6">
            Nous sommes au cœur d'Angers, dans le quartier de Belle-Beille. 
            Facilement accessible en bus (ligne 1, arrêt Beaussier) ou à 15 min à pied de la gare.
          </p>
          
          <!-- Mock Map -->
          <div class="bg-luxury-sand/30 rounded-2xl h-64 flex items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-luxury-beige to-luxury-sand"></div>
            <div class="relative z-10 text-center">
              <div class="w-16 h-16 mx-auto mb-4 bg-luxury-gold rounded-full flex items-center justify-center shadow-lg animate-bounce">
                <i class="fas fa-map-marker-alt text-white text-2xl"></i>
              </div>
              <p class="text-luxury-charcoal font-semibold">8 Bd Victor Beaussier</p>
              <p class="text-luxury-charcoal/60 text-sm">49000 Angers, France</p>
              <a href="https://maps.google.com/?q=8+Boulevard+Victor+Beaussier+Angers" target="_blank" 
                class="inline-flex items-center mt-4 text-luxury-gold hover:text-luxury-charcoal transition-colors font-medium">
                <i class="fas fa-external-link-alt mr-2"></i>
                Voir sur Google Maps
              </a>
            </div>
          </div>
        </div>

        <!-- Horaires -->
        <div class="bg-white rounded-3xl p-8 shadow-soft border border-luxury-sand/30">
          <h3 class="text-xl font-bold text-luxury-charcoal font-display mb-6">
            <i class="fas fa-clock text-luxury-gold mr-2"></i>
            Nos horaires
          </h3>
          <div class="space-y-3">
            <div class="flex justify-between items-center py-2 border-b border-luxury-sand/30">
              <span class="text-luxury-charcoal/70">Lundi - Vendredi</span>
              <span class="font-semibold text-luxury-charcoal">9h00 - 18h00</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-luxury-sand/30">
              <span class="text-luxury-charcoal/70">Samedi</span>
              <span class="font-semibold text-luxury-charcoal">10h00 - 17h00</span>
            </div>
            <div class="flex justify-between items-center py-2">
              <span class="text-luxury-charcoal/70">Dimanche</span>
              <span class="font-semibold text-red-400">Fermé</span>
            </div>
          </div>
        </div>

        <!-- Réseaux sociaux -->
        <div class="bg-luxury-charcoal rounded-3xl p-8 text-white">
          <h3 class="text-xl font-bold font-display mb-4">
            <i class="fas fa-share-alt text-luxury-gold mr-2"></i>
            Suivez-nous
          </h3>
          <p class="text-white/70 mb-6">Restez connectés pour découvrir nos nouveautés et offres exclusives.</p>
          <div class="flex space-x-4">
            <a href="https://www.linkedin.com/in/ange-kevin-agre-a03b3a386/" target="_blank" class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-luxury-gold transition-colors">
              <i class="fab fa-linkedin-in text-xl"></i>
            </a>
            <a href="https://www.instagram.com/angekevin09/" target="_blank" class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-luxury-gold transition-colors">
              <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="mailto:agrekevin09@gmail.com" class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-luxury-gold transition-colors">
              <i class="fas fa-envelope text-xl"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-luxury-cream">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-luxury-charcoal font-display mb-4">Questions fréquentes</h2>
      <p class="text-luxury-charcoal/70">Trouvez rapidement une réponse à vos questions</p>
    </div>

    <div class="space-y-4">
      <details class="bg-white rounded-2xl shadow-soft border border-luxury-sand/30 overflow-hidden group">
        <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-luxury-cream/50 transition-colors">
          <span class="font-semibold text-luxury-charcoal">Quels sont les délais de livraison à Angers ?</span>
          <i class="fas fa-chevron-down text-luxury-gold transform group-open:rotate-180 transition-transform"></i>
        </summary>
        <div class="px-6 pb-6 text-luxury-charcoal/70">
          Nous livrons gratuitement à Angers en 24 à 48h ouvrées. Pour les commandes passées avant 14h, 
          la livraison est souvent possible le lendemain ! Pour la France métropolitaine, comptez 2-4 jours ouvrés.
        </div>
      </details>

      <details class="bg-white rounded-2xl shadow-soft border border-luxury-sand/30 overflow-hidden group">
        <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-luxury-cream/50 transition-colors">
          <span class="font-semibold text-luxury-charcoal">Proposez-vous des personnalisations sur les vêtements ?</span>
          <i class="fas fa-chevron-down text-luxury-gold transform group-open:rotate-180 transition-transform"></i>
        </summary>
        <div class="px-6 pb-6 text-luxury-charcoal/70">
          Oui ! Nous proposons la broderie personnalisée (prénom, initiales) sur la plupart de nos articles. 
          Contactez-nous pour discuter de votre projet personnalisé pour votre enfant.
        </div>
      </details>

      <details class="bg-white rounded-2xl shadow-soft border border-luxury-sand/30 overflow-hidden group">
        <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-luxury-cream/50 transition-colors">
          <span class="font-semibold text-luxury-charcoal">Puis-je retirer ma commande sur place à Angers ?</span>
          <i class="fas fa-chevron-down text-luxury-gold transform group-open:rotate-180 transition-transform"></i>
        </summary>
        <div class="px-6 pb-6 text-luxury-charcoal/70">
          Absolument ! Choisissez l'option "Retrait en boutique" au moment de la commande. 
          Vous pourrez récupérer votre commande à notre atelier du Boulevard Victor Beaussier sur rendez-vous.
        </div>
      </details>

      <details class="bg-white rounded-2xl shadow-soft border border-luxury-sand/30 overflow-hidden group">
        <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-luxury-cream/50 transition-colors">
          <span class="font-semibold text-luxury-charcoal">Quelle est votre politique de retour ?</span>
          <i class="fas fa-chevron-down text-luxury-gold transform group-open:rotate-180 transition-transform"></i>
        </summary>
        <div class="px-6 pb-6 text-luxury-charcoal/70">
          Vous disposez de 30 jours pour retourner un article non porté, avec étiquettes attachées. 
          Les retours sont gratuits en point relais ou à notre atelier à Angers. Le remboursement est 
          effectué sous 5 jours ouvrés après réception.
        </div>
      </details>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
