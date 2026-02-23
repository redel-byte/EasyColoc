<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Play2Learn</title>
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
            <h1 class="text-3xl font-bold text-text mb-2">Forgot Password</h1>
            <p class="text-gray-600">Enter your email to receive a reset link</p>
        </div>

        <!-- Forgot Password Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form action="{{ route('password.email') }}" method="post" class="space-y-6">
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

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-secondary text-white font-semibold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    Send Reset Link
                </button>
            </form>

            <!-- Back to Login -->
            <div class="text-center mt-6">
                <a
                    href="{{ route('login') }}"
                    class="text-primary hover:text-secondary font-medium transition duration-200">
                    Back to login
                </a>
            </div>
        </div>

        <!-- Status Message -->
        @if (session('status'))
        <div class="mt-4 bg-accent/10 border border-accent/20 text-accent px-4 py-3 rounded-lg text-center">
            {{ session('status') }}
        </div>
        @endif
    </div>
</body>

</html>
