@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">You're Invited!</h1>
                <p class="text-gray-600">You've been invited to join a colocation</p>
            </div>
            
            <div class="bg-gray-50 rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Invitation Details</h2>
                
                <div class="space-y-3">
                    <div class="flex items-center">
                        <span class="font-medium text-gray-700 w-24">Colocation:</span>
                        <span class="text-gray-900 font-semibold">{{ $invitation->Colocation->name }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <span class="font-medium text-gray-700 w-24">Invited to:</span>
                        <span class="text-gray-900">{{ $invitation->email }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <span class="font-medium text-gray-700 w-24">Expires:</span>
                        <span class="text-gray-900">{{ $invitation->expires_at->format('F j, Y') }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Important Information -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4 mb-6">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Before You Accept</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>You can only have one active colocation at a time</li>
                                <li>You must be logged in with the same email address</li>
                                <li>As a member, you can add expenses and view balances</li>
                                <li>The owner can manage categories and remove members</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4">
                <form action="{{ route('invitations.process', $invitation->token) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors font-medium">
                        Accept Invitation
                    </button>
                </form>
                
                <a href="{{ route('invitations.reject', $invitation->token) }}" class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors font-medium">
                    Decline
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
