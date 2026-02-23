<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Play2Learn</title>
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

<body class="bg-background min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Logo/Brand Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center self-left w-1/4">
                <img class="w-full h-full object-contain" src="{{ asset('images/EasyColoc.webp') }}" alt="Play2Learn Logo">
            </div>
            <h1 class="text-3xl font-bold text-text mb-2">Welcome Back</h1>
            <p class="text-gray-600">Sign in to continue your learning journey</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form action="{{ route('login') }}" method="post" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-text mb-2">
                        Email Address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 bg-background text-text placeholder-gray-500"
                        required>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-text mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200 bg-background text-text placeholder-gray-500"
                        required>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Remember me
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm text-primary hover:text-secondary transition duration-200">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-secondary text-white font-semibold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    Sign In
                </button>
            </form>
            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">New to Play2Learn?</span>
                </div>
            </div>

            <!-- Register Link -->
            <div class="text-center">
                <a
                    href="{{ route('register') }}"
                    class="text-primary hover:text-secondary font-medium transition duration-200">
                    Create an account
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
        <div class="mt-4 bg-accent/10 border border-accent/20 text-accent px-4 py-3 rounded-lg text-center">
            {{ session('success') }}
        </div>
        @endif
    </div>
</body>

</html>