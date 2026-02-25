<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>NexaVerse Dashboard</title>
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
            <div class="p-6 text-2xl font-bold"><img src="{{asset('images/EasyColoc.webp')}}" alt="logo says EasyColoc"></div>

            <nav class="flex-1 px-4 space-y-3">
                <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('dashboard') ? 'bg-secondary' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('Colocation') ? 'bg-secondary' : '' }}" href="{{ route('colocation') }}">Colocation</a>
                <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}" href="{{ route('admin.dashboard') }}">Admin</a>
            </nav>

            <div class="p-4 border-t border-blue-500">
                <a href="{{ route('logout') }}">Log out</a>
            </div>
        </aside>


        <!-- Main -->
        <main class="flex-1 p-8 overflow-y-auto">

            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Dashboard</h1>
                <div class="flex items-center gap-4">
                    <div class="backdrop-blur-sm px-4 py-2">
                        <span class="text-gray-700 font-medium text-sm">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</span>
                    </div>
                    <div class="w-10 h-10 bg-text text-white rounded-xl text-2xl flex items-center justify-center"><strong>{{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }} </strong></div>
                </div>
            </div>

            <!-- reputation -->

            <div class="grid grid-cols-2 gap-6 mb-6">

                <div class="bg-background text-text p-6 rounded-xl border border-gray-200">
                    <div class="w-8 h-8 text-green-600"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path d="M128 128C92.7 128 64 156.7 64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192C576 156.7 547.3 128 512 128L128 128zM320 224C373 224 416 267 416 320C416 373 373 416 320 416C267 416 224 373 224 320C224 267 267 224 320 224zM512 248C512 252.4 508.4 256.1 504 255.5C475 251.9 452.1 228.9 448.5 200C448 195.6 451.6 192 456 192L504 192C508.4 192 512 195.6 512 200L512 248zM128 392C128 387.6 131.6 383.9 136 384.5C165 388.1 187.9 411.1 191.5 440C192 444.4 188.4 448 184 448L136 448C131.6 448 128 444.4 128 440L128 392zM136 255.5C131.6 256 128 252.4 128 248L128 200C128 195.6 131.6 192 136 192L184 192C188.4 192 192.1 195.6 191.5 200C187.9 229 164.9 251.9 136 255.5zM504 384.5C508.4 384 512 387.6 512 392L512 440C512 444.4 508.4 448 504 448L456 448C451.6 448 447.9 444.4 448.5 440C452.1 411 475.1 388.1 504 384.5z" />
                        </svg>
                    </div>
                    <p class="text-sm opacity-80">Mon score reputation</p>
                    <p class="text-3xl font-bold">0</p>
                </div>

                <!-- depenses Global feb-->

                <div class="bg-background text-text p-6 rounded-xl border border-gray-200">
                    <div class="text-blue-600 h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path d="M0 72C0 58.7 10.7 48 24 48L69.3 48C96.4 48 119.6 67.4 124.4 94L124.8 96L312 96L312 198.1L281 167.1C271.6 157.7 256.4 157.7 247.1 167.1C237.8 176.5 237.7 191.7 247.1 201L319.1 273C328.5 282.4 343.7 282.4 353 273L425 201C434.4 191.6 434.4 176.4 425 167.1C415.6 157.8 400.4 157.7 391.1 167.1L360.1 198.1L360.1 96L537.5 96C557.5 96 572.6 114.2 568.9 133.9L537.8 299.8C532.1 330.1 505.7 352 474.9 352L171.3 352L176.4 380.3C178.5 391.7 188.4 400 200 400L456 400C469.3 400 480 410.7 480 424C480 437.3 469.3 448 456 448L200.1 448C165.3 448 135.5 423.1 129.3 388.9L77.2 102.6C76.5 98.8 73.2 96 69.3 96L24 96C10.7 96 0 85.3 0 72zM160 528C160 501.5 181.5 480 208 480C234.5 480 256 501.5 256 528C256 554.5 234.5 576 208 576C181.5 576 160 554.5 160 528zM384 528C384 501.5 405.5 480 432 480C458.5 480 480 501.5 480 528C480 554.5 458.5 576 432 576C405.5 576 384 554.5 384 528z" />
                        </svg>
                    </div>
                    <p class="text-sm opacity-80">Depenses Global (feb)</p>
                    <p class="text-3xl font-bold">0.00$</p>
                </div>
            </div>

            <!-- Depenses Recentes -->
            <div class="rounded-xl p-6">
                <h2 class="font-semibold text-lg mb-4 ml-3">Depenses Recentes</h2>
                <div class="bg-background overflow-hidden border border-gray-200 rounded-xl">
                    <table class="w-full">
                        <thead class="text-text">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Categorie</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Payeur</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Montant</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Coloc</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-sm text-gray-600">Maria Anders</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Maria Anders</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Maria Anders</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Maria Anders</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Membres de la coloc</h2>
                    <button class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Inviter un membre
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Example member cards - replace with actual data from your backend -->
                    <!-- <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                JD
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">John Doe</h3>
                                <p class="text-sm text-gray-500">Propriétaire</p>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">Actif</span>
                                <span class="text-xs text-gray-500 mt-1">Score: +5</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Balance:</span>
                                <span class="font-semibold text-green-600">+$125.50</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                SM
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">Sarah Martin</h3>
                                <p class="text-sm text-gray-500">Membre</p>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">Actif</span>
                                <span class="text-xs text-gray-500 mt-1">Score: +2</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Balance:</span>
                                <span class="font-semibold text-red-600">-$45.25</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                MB
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800">Mike Brown</h3>
                                <p class="text-sm text-gray-500">Membre</p>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full">Actif</span>
                                <span class="text-xs text-gray-500 mt-1">Score: 0</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Balance:</span>
                                <span class="font-semibold text-gray-600">$0.00</span>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- Empty state when no members -->

                <!-- @if(!isset($members) || $members->isEmpty())
                <div class="text-center py-12 bg-white rounded-xl border border-gray-200">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Aucun membre</h3>
                    <p class="text-gray-500 mb-4">Commencez par inviter des membres à votre coloc</p>
                    @if(auth()->user()->colocation && auth()->user()->colocation->owner_id === auth()->id())
                    <button class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg transition-colors duration-200">
                        Inviter le premier membre
                    </button>
                    @endif
                </div>
                @endif -->
            </div>
        </main>
    </div>
</body>

</html>