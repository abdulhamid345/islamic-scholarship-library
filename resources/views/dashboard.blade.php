@extends('layouts.dashboard')

@section('content')
    <main class="p-6">
        <!-- Welcome Card -->
        <div
            class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl shadow-2xl p-8 text-white mb-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white bg-opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white bg-opacity-5 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-2">Welcome back, John! 👋</h1>
                <p class="text-green-100 text-lg mb-6">Here's what's happening with your business today.</p>
                <div class="flex items-center space-x-4">
                    <button
                        class="bg-white text-green-600 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-colors shadow-lg">
                        View Reports
                    </button>
                    <button
                        class="border border-white text-white px-6 py-3 rounded-xl font-semibold hover:bg-white hover:text-green-600 transition-colors">
                        Quick Actions
                    </button>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Stats Cards -->
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900">2,847</p>
                            <p class="text-sm text-green-600 mt-1">↗ +12% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Revenue</p>
                            <p class="text-3xl font-bold text-gray-900">$48,294</p>
                            <p class="text-sm text-green-600 mt-1">↗ +8.2% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button class="w-full flex items-center p-3 text-left hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-green-600"></i>
                        </div>
                        <span class="text-gray-700">Add New User</span>
                    </button>
                    <button class="w-full flex items-center p-3 text-left hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-file-alt text-blue-600"></i>
                        </div>
                        <span class="text-gray-700">Generate Report</span>
                    </button>
                    <button class="w-full flex items-center p-3 text-left hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-cog text-purple-600"></i>
                        </div>
                        <span class="text-gray-700">System Settings</span>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
