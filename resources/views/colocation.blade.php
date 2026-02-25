<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>EasyColoc - Gestion de Colocation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563EB',
                        secondary: '#1E40AF',
                        background: '#F8FAFC',
                        text: '#0F172A',
                        accent: '#22C55E'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">
                <img src="{{asset('images/EasyColoc.webp')}}" alt="logo says EasyColoc" class="h-10">
            </div>

            <nav class="flex-1 px-4 space-y-3">
                <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('dashboard') ? 'bg-secondary' : '' }}" href="{{ route('dashboard') }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </div>
                </a>
                <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('colocation') ? 'bg-secondary' : '' }}" href="{{ route('colocation') }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Colocation
                    </div>
                </a>
                <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Admin
                    </div>
                </a>
            </nav>

            <div class="p-4 border-t border-blue-500">
                <a href="{{ route('logout') }}" class="flex items-center gap-3 hover:text-blue-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Log out
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">

            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Gestion de Colocation</h1>
                    <p class="text-gray-600 mt-1">Gérez votre colocation et ses membres</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="backdrop-blur-sm px-4 py-2 bg-white rounded-lg border border-gray-200">
                        <span class="text-gray-700 font-medium text-sm">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</span>
                    </div>
                    <div class="w-10 h-10 bg-text text-white rounded-xl text-2xl flex items-center justify-center">
                        <strong>{{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}</strong>
                    </div>
                </div>
            </div>

            <!-- Colocation Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Colocation Status -->
                <div class="bg-background text-text p-6 rounded-xl border border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Active</span>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Ma Colocation</h3>
                    <p class="text-sm text-gray-600 mb-4">Appartement 3B, Casablanca</p>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Créée le:</span>
                            <span class="font-medium">15 Jan 2026</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Membres:</span>
                            <span class="font-medium">3 personnes</span>
                        </div>
                    </div>
                </div>

                <!-- Monthly Expenses -->
                <div class="bg-background text-text p-6 rounded-xl border border-gray-200">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Dépenses du mois</h3>
                    <p class="text-3xl font-bold text-green-600 mb-2">2,450.00 $</p>
                    <p class="text-sm text-gray-600">Total des dépenses Février 2026</p>
                </div>

                <!-- Balance Summary -->
                <div class="bg-background text-text p-6 rounded-xl border border-gray-200">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Balance Totale</h3>
                    <p class="text-3xl font-bold mb-2">816.67 $</p>
                    <p class="text-sm text-gray-600">Part par personne</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4 mb-8">
                <button class="bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajouter une dépense
                </button>
                <button class="bg-accent hover:bg-green-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Inviter un membre
                </button>
                <button class="bg-white hover:bg-gray-50 text-gray-700 px-6 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2 border border-gray-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Voir les statistiques
                </button>
            </div>

            <!-- Members Section -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Membres de la colocation</h2>
                    <span class="text-sm text-gray-500">3 membres actifs</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Member Card 1 - Owner -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                RA
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">Ridouane Alhabib</h3>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs px-2 py-1 bg-blue-100 text-blue-700 rounded-full">Propriétaire</span>
                                    <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">Actif</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Balance:</span>
                                <span class="font-semibold text-green-600">+125.50 $</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Réputation:</span>
                                <span class="font-semibold text-blue-600">+5</span>
                            </div>
                        </div>
                    </div>

                    <!-- Member Card 2 -->
                    <div class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                SM
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">Sarah Martin</h3>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs px-2 py-1 bg-gray-100 text-gray-700 rounded-full">Membre</span>
                                    <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">Actif</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Balance:</span>
                                <span class="font-semibold text-red-600">-45.25 $</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Réputation:</span>
                                <span class="font-semibold text-blue-600">+2</span>
                            </div>
                        </div>
                    </div>

                    <!-- Member Card 3 -->
                    <div class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                MB
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">Mike Brown</h3>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs px-2 py-1 bg-gray-100 text-gray-700 rounded-full">Membre</span>
                                    <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">Actif</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Balance:</span>
                                <span class="font-semibold text-gray-600">-80.25 $</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Réputation:</span>
                                <span class="font-semibold text-blue-600">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Expenses Table -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-800">Dépenses récentes</h2>
                        <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                            Voir tout →
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Payeur</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Montant</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">24 Fév 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Courses</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Courses hebdomadaires Carrefour</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Ridouane A.</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800">450.00 $</td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Détails</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">22 Fév 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Services</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Facture électricité - Février</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Sarah M.</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800">180.00 $</td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Détails</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">20 Fév 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Loyer</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Loyer mensuel appartement</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Mike B.</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800">1,800.00 $</td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Détails</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">18 Fév 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Internet</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Abonnement Internet + TV</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Ridouane A.</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800">120.00 $</td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Détails</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Settlement Summary -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Résumé des remboursements</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white rounded-lg p-4">
                        <h4 class="font-semibold text-gray-700 mb-2">Sarah doit à Ridouane:</h4>
                        <p class="text-2xl font-bold text-red-600">45.25 $</p>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <h4 class="font-semibold text-gray-700 mb-2">Mike doit à Ridouane:</h4>
                        <p class="text-2xl font-bold text-red-600">80.25 $</p>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg transition-colors duration-200">
                        Marquer comme payé
                    </button>
                </div>
            </div>

        </main>
    </div>
</body>

</html>