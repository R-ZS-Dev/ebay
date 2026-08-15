<template>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Section -->
        <div class="hidden lg:flex items-center justify-center bg-gradient-to-br from-blue-700 to-indigo-900 text-white p-10">
            <div class="text-center">
                <!-- Logo -->
                <img src="/upload/images/logo.png" alt="Ebay Logo" class="w-40 mx-auto mb-6" />
                <h1 class="text-5xl font-bold mb-4"> Ebay </h1>
                <p class="text-lg text-blue-100 max-w-md">
                    Welcome to the Ebay Management System.
                    Manage your business efficiently from one place.
                </p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex items-center justify-center bg-gray-100 px-6 py-10">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-2"> Welcome Back </h2>
                <p class="text-center text-gray-500 mb-8"> Login to your account </p>
                <form>
                    <!-- Email -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2"> Email </label>
                        <input
                            type="email"
                            placeholder="Enter your email"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none"
                        />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2"> Password </label>
                        <input
                            type="password"
                            placeholder="Enter your password"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none"
                        />
                    </div>

                    <button type="submit" class="w-full rounded-lg bg-blue-600 py-3 font-semibold text-white hover:bg-blue-700" >
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
