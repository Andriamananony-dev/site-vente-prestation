<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer un utilisateur admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@prestaservices.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Créer un utilisateur normal
        $user = User::create([
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        // Services Web
        $services = [
            [
                'name' => 'Site Web Vitrine',
                'slug' => 'site-web-vitrine',
                'description' => 'Créez une présence en ligne professionnelle avec un site web vitrine élégant et responsive. Parfait pour présenter votre entreprise, vos services et votre équipe.',
                'features' => json_encode([
                    'Design moderne et responsive',
                    'Jusqu\'à 5 pages personnalisées',
                    'Formulaire de contact intégré',
                    'Optimisation SEO de base',
                    'Hébergement 1 an inclus',
                    'Formation à la gestion du site',
                ]),
                'price' => 899.00,
                'icon' => '🌐',
                'category' => 'Web',
                'duration' => 14,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'E-commerce Complet',
                'slug' => 'e-commerce-complet',
                'description' => 'Lancez votre boutique en ligne avec une solution e-commerce complète et performante. Vendez vos produits facilement avec un système de paiement sécurisé.',
                'features' => json_encode([
                    'Boutique en ligne professionnelle',
                    'Gestion des produits et stocks',
                    'Paiement sécurisé (Stripe, PayPal)',
                    'Système de panier avancé',
                    'Tableau de bord administrateur',
                    'Support technique 6 mois',
                ]),
                'price' => 2499.00,
                'icon' => '🛒',
                'category' => 'Web',
                'duration' => 30,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Application Web Sur Mesure',
                'slug' => 'application-web-sur-mesure',
                'description' => 'Développement d\'une application web personnalisée selon vos besoins spécifiques. Technologies modernes et architecture robuste pour des performances optimales.',
                'features' => json_encode([
                    'Développement sur mesure',
                    'Technologies modernes (Laravel, React)',
                    'Base de données optimisée',
                    'API REST intégrée',
                    'Tests et déploiement',
                    'Maintenance 3 mois incluse',
                ]),
                'price' => 4999.00,
                'icon' => '💻',
                'category' => 'Web',
                'duration' => 45,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Logo Professionnel',
                'slug' => 'logo-professionnel',
                'description' => 'Création d\'un logo unique et mémorable qui représente parfaitement votre marque. Plusieurs propositions et révisions illimitées jusqu\'à satisfaction.',
                'features' => json_encode([
                    '3 propositions de design',
                    'Révisions illimitées',
                    'Fichiers vectoriels (AI, SVG)',
                    'Fichiers PNG et JPG HD',
                    'Guide d\'utilisation',
                    'Propriété complète du design',
                ]),
                'price' => 299.00,
                'icon' => '🎨',
                'category' => 'Design',
                'duration' => 7,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Identité Visuelle Complète',
                'slug' => 'identite-visuelle-complete',
                'description' => 'Package complet d\'identité visuelle incluant logo, charte graphique, cartes de visite et tous les supports de communication nécessaires.',
                'features' => json_encode([
                    'Logo professionnel',
                    'Charte graphique détaillée',
                    'Carte de visite design',
                    'Papier à en-tête',
                    'Signature email',
                    'Supports réseaux sociaux',
                ]),
                'price' => 799.00,
                'icon' => '🎭',
                'category' => 'Design',
                'duration' => 14,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Stratégie SEO',
                'slug' => 'strategie-seo',
                'description' => 'Améliorez votre visibilité sur Google avec une stratégie SEO complète. Audit, optimisation et suivi de vos positions pour générer plus de trafic qualifié.',
                'features' => json_encode([
                    'Audit SEO complet',
                    'Recherche de mots-clés',
                    'Optimisation on-page',
                    'Netlinking stratégique',
                    'Rapports mensuels détaillés',
                    'Suivi des positions Google',
                ]),
                'price' => 699.00,
                'icon' => '🔍',
                'category' => 'SEO',
                'duration' => 30,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Gestion Réseaux Sociaux',
                'slug' => 'gestion-reseaux-sociaux',
                'description' => 'Confiez-nous la gestion de vos réseaux sociaux. Création de contenu, publication régulière et engagement avec votre communauté.',
                'features' => json_encode([
                    'Gestion de 3 réseaux sociaux',
                    '20 publications par mois',
                    'Création de visuels',
                    'Engagement communautaire',
                    'Rapports de performance',
                    'Stratégie de contenu',
                ]),
                'price' => 499.00,
                'icon' => '📱',
                'category' => 'Marketing',
                'duration' => 30,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Rédaction Articles de Blog',
                'slug' => 'redaction-articles-blog',
                'description' => 'Articles de blog optimisés SEO pour attirer et engager votre audience. Contenu de qualité rédigé par des professionnels.',
                'features' => json_encode([
                    '5 articles de 800 mots',
                    'Optimisation SEO',
                    'Images libres de droits',
                    'Relecture professionnelle',
                    'Livraison programmée',
                    'Révisions incluses',
                ]),
                'price' => 399.00,
                'icon' => '✍️',
                'category' => 'Rédaction',
                'duration' => 14,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Page de Vente Persuasive',
                'slug' => 'page-vente-persuasive',
                'description' => 'Rédaction d\'une page de vente qui convertit vos visiteurs en clients. Copywriting professionnel avec techniques de persuasion éprouvées.',
                'features' => json_encode([
                    'Analyse de votre offre',
                    'Structure optimisée',
                    'Copywriting persuasif',
                    'Appels à l\'action efficaces',
                    '2 révisions incluses',
                    'Garantie satisfaction',
                ]),
                'price' => 599.00,
                'icon' => '📝',
                'category' => 'Rédaction',
                'duration' => 7,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Consultation Stratégique',
                'slug' => 'consultation-strategique',
                'description' => 'Session de consultation personnalisée pour définir votre stratégie digitale et identifier les opportunités de croissance.',
                'features' => json_encode([
                    '2 heures de consultation',
                    'Analyse de votre situation',
                    'Recommandations personnalisées',
                    'Plan d\'action détaillé',
                    'Support email 1 mois',
                    'Enregistrement de la session',
                ]),
                'price' => 299.00,
                'icon' => '💡',
                'category' => 'Consulting',
                'duration' => 3,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }

        // Créer quelques commandes de démonstration
        $allServices = Service::all();

        if ($allServices->count() >= 6) {
            // Commande 1 - Confirmée
            $order1 = Order::create([
                'user_id' => $user->id,
                'customer_name' => 'Jean Dupont',
                'customer_email' => 'jean@example.com',
                'customer_phone' => '+33 6 12 34 56 78',
                'customer_address' => '123 Rue de la Paix, 75001 Paris',
                'total_amount' => 1198.00,
                'status' => 'confirmed',
                'notes' => 'Projet urgent, merci de commencer rapidement.',
            ]);

            OrderItem::create([
                'order_id' => $order1->id,
                'service_id' => $allServices[0]->id,
                'service_name' => $allServices[0]->name,
                'price' => $allServices[0]->price,
                'quantity' => 1,
                'subtotal' => $allServices[0]->price,
            ]);

            OrderItem::create([
                'order_id' => $order1->id,
                'service_id' => $allServices[3]->id,
                'service_name' => $allServices[3]->name,
                'price' => $allServices[3]->price,
                'quantity' => 1,
                'subtotal' => $allServices[3]->price,
            ]);

            // Commande 2 - En cours
            $order2 = Order::create([
                'user_id' => null,
                'customer_name' => 'Marie Martin',
                'customer_email' => 'marie@example.com',
                'customer_phone' => '+33 6 98 76 54 32',
                'total_amount' => 2499.00,
                'status' => 'in_progress',
            ]);

            OrderItem::create([
                'order_id' => $order2->id,
                'service_id' => $allServices[1]->id,
                'service_name' => $allServices[1]->name,
                'price' => $allServices[1]->price,
                'quantity' => 1,
                'subtotal' => $allServices[1]->price,
            ]);

            // Commande 3 - Terminée
            $order3 = Order::create([
                'user_id' => $user->id,
                'customer_name' => 'Pierre Dubois',
                'customer_email' => 'pierre@example.com',
                'total_amount' => 699.00,
                'status' => 'completed',
                'notes' => 'Très satisfait du service!',
            ]);

            OrderItem::create([
                'order_id' => $order3->id,
                'service_id' => $allServices[5]->id,
                'service_name' => $allServices[5]->name,
                'price' => $allServices[5]->price,
                'quantity' => 1,
                'subtotal' => $allServices[5]->price,
            ]);
        }
    }
}
