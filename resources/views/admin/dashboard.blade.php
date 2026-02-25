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
        <a class="block p-3 rounded hover:bg-blue-500 {{ request()->routeIs('Colocation') ? 'bg-secondary' : '' }}" href="">Colocation</a>
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

      <!-- Stats -->

      <div class="grid grid-cols-2 gap-6 mb-6">

        <div class="bg-blue-700 text-white p-6 rounded-xl">
          <p class="text-sm opacity-80">Current MRR</p>
          <p class="text-3xl font-bold">$12.4k</p>
        </div>

        <div class="bg-blue-400 text-white p-6 rounded-xl">
          <p class="text-sm opacity-80">Churn Rate</p>
          <p class="text-3xl font-bold">2%</p>
        </div>

      </div>


      <!-- Charts Row -->
      <div class="grid grid-cols-3 gap-6 mb-6">

        <!-- Trend -->
        <div class="bg-white p-6 rounded-xl shadow col-span-2">
          <h2 class="font-semibold mb-4">Trend</h2>
          <div class="h-48 flex items-end gap-4">
            <div class="bg-green-500 w-6 h-32"></div>
            <div class="bg-blue-400 w-6 h-20"></div>
            <div class="bg-blue-800 w-6 h-16"></div>
            <div class="bg-green-500 w-6 h-40"></div>
            <div class="bg-blue-400 w-6 h-28"></div>
            <div class="bg-blue-800 w-6 h-12"></div>
          </div>
        </div>

        <!-- Sales -->
        <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center justify-center">
          <h2 class="font-semibold mb-4">Sales</h2>
          <div class="w-40 h-40 rounded-full border-8 border-blue-600 flex items-center justify-center">
            <div class="text-center">
              <p class="text-2xl font-bold">342</p>
              <p class="text-gray-500 text-sm">Sales</p>
            </div>
          </div>
        </div>

      </div>


      <!-- Bottom Row -->
      <div class="grid grid-cols-3 gap-6">

        <!-- Support -->
        <div class="bg-white p-6 rounded-xl shadow col-span-2">
          <h2 class="font-semibold mb-4">Support Tickets</h2>

          <div class="space-y-3">
            <div class="flex justify-between">
              <span>Login Issue</span>
              <span class="text-blue-600 text-sm">Open</span>
            </div>

            <div class="flex justify-between">
              <span>Billing Inquiry</span>
              <span class="text-yellow-600 text-sm">Pending</span>
            </div>

            <div class="flex justify-between">
              <span>Product Malfunction</span>
              <span class="text-green-600 text-sm">Closed</span>
            </div>
          </div>
        </div>

        <!-- Map -->
        <div class="bg-white p-6 rounded-xl shadow">
          <h2 class="font-semibold mb-4">Customer Demographic</h2>
          <div class="h-40 bg-green-500 rounded"></div>
        </div>

      </div>

    </main>

  </div>

</body>

</html>